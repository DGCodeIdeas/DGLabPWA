# Solution: Asset Routing and Runtime Compilation

## Issue Analysis
Requests to `/assets/css/app.css` and `/assets/js/app.js` return **404 Not Found** because:
1. **Routing Regex Constraint**: The default `string` pattern in `app/Core/Router.php` is `([a-zA-Z0-9_-]+)`, which does not include the dot (`.`) character. This prevents filenames like `app.css` from matching routes like `/assets/css/{file}`.
2. **Missing Source Files**: The repository contains SCSS (`assets/scss/app.scss`) but lacks the compiled CSS (`assets/css/app.css`).
3. **Controller/Bundler Disconnect**: `AssetController` merely attempts to serve existing files from the cache or assets folder; it does not trigger the `AssetBundler` to perform runtime compilation when a source file exists but the target does not.

## Step-by-Step Fix

### 1. Update Route Definitions
Modify `app/Config/routes.php` to allow dots in the filename parameters by using the `any` pattern.

```php
// app/Config/routes.php

// Change from:
$router->get('/assets/css/{file}', 'AssetController@css', 'assets.css');
$router->get('/assets/js/{file}', 'AssetController@js', 'assets.js');

// To:
$router->get('/assets/css/{file:any}', 'AssetController@css', 'assets.css');
$router->get('/assets/js/{file:any}', 'AssetController@js', 'assets.js');
```

### 2. Integrate AssetBundler into AssetController
Update `app/Controllers/AssetController.php` to use the `AssetBundler` when a requested CSS or JS file is missing but its source exists.

```php
// app/Controllers/AssetController.php

public function css(string $file): void
{
    $cachePath = CACHE_PATH . '/assets/' . $file;

    // If missing, try to compile from SCSS
    if (!file_exists($cachePath)) {
        $sourceFile = str_replace('.css', '.scss', $file);
        if (file_exists(ASSETS_PATH . '/scss/' . $sourceFile)) {
            AssetBundler::css($sourceFile, $file);
        }
    }

    if (file_exists($cachePath)) {
        $this->serveFile($cachePath);
        return;
    }

    $this->serve('css/' . $file);
}
```

### 3. Ensure Cache Directory Permissions
The `cache/assets` directory must be writable by the web server (especially on InfinityFree).
```bash
mkdir -p cache/assets
chmod 775 cache/assets
```
