from playwright.sync_api import sync_playwright, expect
import time
import re

BASE_URL = "https://dglab.42web.io"

def run_tests():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        context = browser.new_context(
            user_agent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36"
        )
        page = context.new_page()

        print(f"Navigating to {BASE_URL}...")
        page.goto(BASE_URL)
        page.wait_for_load_state("networkidle")
        print(f"Current Title: {page.title()}")
        page.screenshot(path="tests/debug.png")

        # 1. Check basic UI
        print("Checking basic UI...")
        expect(page).to_have_title(re.compile("DGLab PWA"))
        # Using text from the hero section
        heading = page.get_by_text("Powerful Web Tools", exact=False)
        expect(heading.first).to_be_visible()
        print("Basic UI OK.")

        # 2. Check Manifest
        print("Checking manifest...")
        manifest_link = page.locator('link[rel="manifest"]')
        expect(manifest_link).to_have_attribute("href", "/manifest.json")
        print("Manifest link found.")

        # 3. Check Service Worker registration
        print("Checking service worker registration...")
        # We check the console or use evaluate to see if SW is registered
        # Note: In a headless environment without a real domain, SW might have issues,
        # but here we are testing the LIVE site.
        sw_registered = page.evaluate("""
            async () => {
                const registrations = await navigator.serviceWorker.getRegistrations();
                return registrations.length > 0;
            }
        """)
        # Give it a moment to register if it's the first visit
        if not sw_registered:
            time.sleep(2)
            sw_registered = page.evaluate("""
                async () => {
                    const registrations = await navigator.serviceWorker.getRegistrations();
                    return registrations.length > 0;
                }
            """)

        print(f"Service Worker registered: {sw_registered}")

        # 4. Check navigation to /tools
        print("Checking navigation to /tools...")
        page.get_by_role("link", name="Tools", exact=True).first.click()
        expect(page).to_have_url(f"{BASE_URL}/tools")
        print("Tools page OK.")

        # 5. Check /offline page
        print("Checking /offline page...")
        page.goto(f"{BASE_URL}/offline")
        page.wait_for_load_state("networkidle")
        print(f"Offline Title: {page.title()}")
        page.screenshot(path="tests/debug_offline.png")
        expect(page.get_by_text("Offline", exact=False).first).to_be_visible()
        print("Offline page OK.")

        # Take screenshots
        page.goto(BASE_URL)
        page.screenshot(path="tests/homepage.png")
        page.goto(f"{BASE_URL}/tools")
        page.screenshot(path="tests/tools.png")
        page.goto(f"{BASE_URL}/offline")
        page.screenshot(path="tests/offline.png")

        browser.close()

if __name__ == "__main__":
    try:
        run_tests()
        print("\nPlaywright tests finished.")
    except Exception as e:
        print(f"\nPlaywright tests failed: {e}")
