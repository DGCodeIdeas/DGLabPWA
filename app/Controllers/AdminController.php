<?php
namespace DGLab\Controllers;

use DGLab\Core\Controller;
use DGLab\Core\AssetBundler;

/**
 * AdminController Class
 *
 * Handles administrative tasks like cache management and system info.
 */
class AdminController extends Controller
{
    /**
     * Clear application cache
     *
     * @return void
     */
    public function clearCache(): void
    {
        // 1. Clear Asset Cache
        $bundler = AssetBundler::getInstance();
        $bundler->clearCache();

        // 2. Clear View Cache
        $this->view->clearCache();

        $this->success([], 'System cache cleared successfully');
    }

    /**
     * Show system information
     *
     * @return void
     */
    public function systemInfo(): void
    {
        $info = [
            'php_version' => PHP_VERSION,
            'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'upload_max' => ini_get('upload_max_filesize'),
            'post_max' => ini_get('post_max_size'),
            'memory_limit' => ini_get('memory_limit'),
            'app_version' => APP_VERSION,
            'app_name' => APP_NAME
        ];

        $this->render('admin/system_info', [
            'title' => 'System Information',
            'info' => $info
        ]);
    }
}
