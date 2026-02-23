# Bolt's Journal - Performance Optimization

## 2025-02-23 - Lazy Database Connections & Asset Bundling
**Learning:** In a front-controller architecture (MVC) where every request (including static assets served via PHP) passes through a common Controller constructor, immediate database connection establishment is a major bottleneck. Even with fast drivers like SQLite, the overhead is measurable; with remote MySQL, it can be catastrophic for asset serving.

**Learning:** Simple regex-based JS minification `/\/\/.*$/m` is dangerous as it breaks URLs (e.g., `https://`). Using a negative lookbehind `(?<!:)\/\/.*$/m` provides a simple yet effective safeguard while maintaining high performance.

**Learning:** Sequential `preg_replace` calls on the same string are slightly slower than a single call with an array of patterns, as the engine can optimize the multiple patterns in a single pass.

**Action:** Always defer resource-heavy initializations (DB, external APIs) until they are actually needed. Combine regex patterns in `AssetBundler` and use runtime static caching for components instantiated multiple times per request.
