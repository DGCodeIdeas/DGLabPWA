import { test, expect } from '@playwright/test';

test.use({ viewport: { width: 1440, height: 900 } });

test('homepage visual check', async ({ page }) => {
  await page.goto('http://localhost:8080/');
  await page.screenshot({ path: 'screenshots/home.png', fullPage: true });
});

test('navigation to tools', async ({ page }) => {
  await page.goto('http://localhost:8080/');
  const toolsLink = page.getByRole('link', { name: 'Tools' }).first();
  await expect(toolsLink).toBeVisible();
  await toolsLink.click();
  await expect(page).toHaveURL(/.*\/tools/);
  await page.screenshot({ path: 'screenshots/tools.png', fullPage: true });
});

test('navigation to about', async ({ page }) => {
  await page.goto('http://localhost:8080/');
  const aboutLink = page.getByRole('link', { name: 'About' }).first();
  await expect(aboutLink).toBeVisible();
  await aboutLink.click();
  await expect(page).toHaveURL(/.*\/about/);
  await page.screenshot({ path: 'screenshots/about.png', fullPage: true });
});

test('navigation to docs', async ({ page }) => {
  await page.goto('http://localhost:8080/');
  const docsLink = page.getByRole('link', { name: 'Docs' }).first();
  await expect(docsLink).toBeVisible();
  await docsLink.click();
  await expect(page).toHaveURL(/.*\/docs/);
  await page.screenshot({ path: 'screenshots/docs.png', fullPage: true });
});

test('tool show page', async ({ page }) => {
  await page.goto('http://localhost:8080/tools/epub-font-changer');
  await page.screenshot({ path: 'screenshots/tool_epub.png', fullPage: true });
});

test('novel to manga tool page', async ({ page }) => {
  await page.goto('http://localhost:8080/tools/novel-to-manga');
  await page.screenshot({ path: 'screenshots/tool_novel.png', fullPage: true });
});
