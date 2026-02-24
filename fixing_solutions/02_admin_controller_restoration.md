# Solution: Restoration of AdminController

## Issue Analysis
Accessing any `/admin/` route results in an **Internal Server Error (500)** because the class `DGLab\Controllers\AdminController` is missing from the `app/Controllers/` directory, despite being referenced in `app/Config/routes.php`.

## Step-by-Step Fix

### 1. Create AdminController.php
Create the file `app/Controllers/AdminController.php` with implementation for cache clearing and system information.

```php
<?php
namespace DGLab\Controllers;

use DGLab\Core\Controller;
use DGLab\Core\AssetBundler;

class AdminController extends Controller
{
    public function clearCache(): void
    {
        // 1. Clear Asset Cache
        $bundler = AssetBundler::getInstance();
        $bundler->clearCache();

        // 2. Clear application logs or temp files if necessary

        $this->success([], 'System cache cleared successfully');
    }

    public function systemInfo(): void
    {
        $info = [
            'php_version' => PHP_VERSION,
            'server' => $_SERVER['SERVER_SOFTWARE'],
            'upload_max' => ini_get('upload_max_filesize'),
            'post_max' => ini_get('post_max_size'),
            'memory_limit' => ini_get('memory_limit'),
            'app_version' => APP_VERSION
        ];

        $this->render('admin/system_info', [
            'title' => 'System Information',
            'info' => $info
        ]);
    }
}
```

### 2. Verify Helper Methods
Ensure the `Controller` base class has the `success()` and `render()` methods (which it does in this framework).

### 3. Missing View
If `admin/system_info` view is also missing, create `app/Views/admin/system_info.php`.
