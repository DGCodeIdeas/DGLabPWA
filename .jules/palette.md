## 2026-02-23 - Accessibility Enhancements for Tool Interface

**Learning:** Form toggles using `display: none` on the input element are inaccessible to keyboard users and screen readers. Using a visually hidden but accessible pattern (absolute positioning, 1px size, clip) allows the element to receive focus while remaining hidden.
**Action:** Always use a visually hidden pattern for custom form controls instead of `display: none`. Ensure a visible focus state is applied to the associated decorative element (e.g., a slider) using `:focus-visible` or `:focus-within`.

**Learning:** Icon-only buttons (like "Remove file" or "Show/Hide password") require explicit `aria-label` attributes to be accessible to screen reader users, even if they have a `title` attribute.
**Action:** Always include `aria-label` on interactive elements that do not have visible text labels.
