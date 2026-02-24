# Solution: PWA and Root Asset Routing

## Issue Analysis
Requests to `/manifest.json` and `/sw.js` are returning **404 Not Found**. Since these are defined in the router, the failure suggests either:
1. **Router Matching Failure**: The router fails to match the exact string due to hidden characters or environment-specific `REQUEST_URI` variations.
2. **Missing Controller Methods**: The `PwaController` might be missing the expected methods (verified: they exist).
3. **Mimetype Issues**: While not causing a 404, incorrect mimetypes can cause PWA installation to fail.

## Step-by-Step Fix

### 1. Robust Route Matching
Update `app/Core/Router.php` to be more resilient to trailing slashes or varying base paths. However, for a quick fix in `routes.php`, we can use a more permissive pattern if the static match fails.

Verify that `public/index.php` correctly initializes the router with the base path if the app is not in the root.

### 2. PWA Controller Verification
Ensure `app/Controllers/PwaController.php` is correctly namespaced and the methods are public.

```php
// Ensure this header is present in serviceWorker() method
header('Content-Type: application/javascript; charset=utf-8');
header('Service-Worker-Allowed: /');
```

### 3. Physical File Fallback (Optional but Recommended)
For high-traffic root assets like `favicon.ico`, `manifest.json`, and `sw.js`, it is often safer on shared hosting to have physical files in the `public/` directory, as Apache will serve them directly before hitting `index.php`.

1. Move/Create `manifest.json` and `sw.js` in `public/`.
2. Update them to be static or use placeholders that the deployment script replaces.

### 4. Fix for AssetBundler URL Generation
The `AssetBundler::getCacheUrl` method has a bug where it assumes the cache is inside the public folder.

```php
// app/Core/AssetBundler.php - getCacheUrl fix

private function getCacheUrl(string $filename): string
{
    global $config;
    $baseUrl = $config['app']['base_url'] ?? '';

    // Instead of str_replace which fails if cache is outside public:
    // Route cached assets through the AssetController
    return rtrim($baseUrl, '/') . '/assets/cache/' . $filename;
}
```
And add a corresponding route:
```php
$router->get('/assets/cache/{file:any}', 'AssetController@serveCache', 'assets.cache');
```
