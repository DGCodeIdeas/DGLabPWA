<?php
/**
 * DGLab PWA - Asset Controller
 * 
 * Handles asset serving and compilation.
 * 
 * @package DGLab\Controllers
 * @author DGLab Team
 * @version 1.0.0
 */

namespace DGLab\Controllers;

use DGLab\Core\Controller;
use DGLab\Core\AssetBundler;

/**
 * AssetController Class
 * 
 * Controller for serving compiled assets.
 */
class AssetController extends Controller
{
    /**
     * Serve CSS file (legacy support)
     * 
     * @param string $file Filename
     * @return void
     */
    public function css(string $file): void
    {
        // Bundled CSS files are often in the root of cache/assets
        $cachePath = CACHE_PATH . '/assets/' . $file;
        if (file_exists($cachePath)) {
            $this->serveFile($cachePath);
            return;
        }
        
        $this->serve('css/' . $file);
    }

    /**
     * Serve JS file (legacy support)
     * 
     * @param string $file Filename
     * @return void
     */
    public function js(string $file): void
    {
        // Bundled JS files are often in the root of cache/assets
        $cachePath = CACHE_PATH . '/assets/' . $file;
        if (file_exists($cachePath)) {
            $this->serveFile($cachePath);
            return;
        }
        
        $this->serve('js/' . $file);
    }

    /**
     * Generic asset serving
     *
     * @param string $path Relative path to asset
     * @return void
     */
    public function serve(string $path): void
    {
        // Basic sanitization
        $path = ltrim(str_replace(['../', '..\\'], '', $path), '/');

        // Define allowed roots and their absolute paths
        $allowedRoots = [
            'cache'  => realpath(CACHE_PATH . '/assets'),
            'assets' => realpath(ASSETS_PATH),
            'public' => realpath(PUBLIC_PATH),
        ];
        
        foreach ($allowedRoots as $root) {
            if (!$root) continue;

            // Build full path and resolve it
            $fullPath = $root . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
            $realPath = realpath($fullPath);

            // Security checks:
            // 1. File must exist
            // 2. Must be a file, not a directory
            // 3. Must be within the allowed root (prevents traversal)
            if ($realPath && is_file($realPath) && strpos($realPath, $root) === 0) {

                $filename = basename($realPath);
                $extension = strtolower(pathinfo($realPath, PATHINFO_EXTENSION));

                // 4. Block sensitive files and hidden files
                if ($extension === 'php' || strpos($filename, '.') === 0 || $filename === 'config.php') {
                    continue;
                }

                $this->serveFile($realPath);
                return;
            }
        }

        // Special case for favicon if not found in allowed roots
        if ($path === 'favicon.ico') {
            $faviconLocations = [
                ASSETS_PATH . '/icons/favicon.ico',
                ASSETS_PATH . '/favicon.ico',
            ];
            foreach ($faviconLocations as $loc) {
                if (file_exists($loc)) {
                    $this->serveFile($loc);
                    return;
                }
            }
        }

        $this->handleNotFound($path);
    }

    /**
     * Serve favicon.ico
     *
     * @return void
     */
    public function favicon(): void
    {
        $this->serve('favicon.ico');
    }

    /**
     * Serve a file with appropriate headers
     *
     * @param string $fullPath Absolute path to file
     * @return void
     */
    private function serveFile(string $fullPath): void
    {
        $mimeType = $this->getMimeType($fullPath);

        // Cache headers (1 year for assets)
        $maxAge = 31536000;
        $expires = gmdate('D, d M Y H:i:s', time() + $maxAge) . ' GMT';

        header("Content-Type: {$mimeType}");
        header("Cache-Control: public, max-age={$maxAge}");
        header("Expires: {$expires}");
        header("Last-Modified: " . gmdate('D, d M Y H:i:s', filemtime($fullPath)) . ' GMT');
        header("Pragma: cache");

        // Content Length
        header("Content-Length: " . filesize($fullPath));

        // Disable execution of PHP in assets for security
        if ($mimeType === 'text/html' || $mimeType === 'application/x-httpd-php') {
            header("Content-Type: text/plain");
        }

        readfile($fullPath);
        exit;
    }

    /**
     * Get MIME type for a file
     *
     * @param string $file Filename
     * @return string MIME type
     */
    private function getMimeType(string $file): string
    {
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        $mimes = [
            'css'   => 'text/css',
            'js'    => 'application/javascript',
            'png'   => 'image/png',
            'jpg'   => 'image/jpeg',
            'jpeg'  => 'image/jpeg',
            'gif'   => 'image/gif',
            'svg'   => 'image/svg+xml',
            'ico'   => 'image/x-icon',
            'woff'  => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf'   => 'font/ttf',
            'otf'   => 'font/otf',
            'eot'   => 'application/vnd.ms-fontobject',
            'json'  => 'application/json',
            'pdf'   => 'application/pdf',
            'txt'   => 'text/plain',
            'xml'   => 'application/xml',
        ];

        return $mimes[$extension] ?? 'application/octet-stream';
    }

    /**
     * Handle asset not found
     *
     * @param string $path Requested path
     * @return void
     */
    private function handleNotFound(string $path): void
    {
        http_response_code(404);
        $extension = pathinfo($path, PATHINFO_EXTENSION);

        if ($extension === 'css') {
            header('Content-Type: text/css');
            echo "/* CSS file not found: {$path} */";
        } elseif ($extension === 'js') {
            header('Content-Type: application/javascript');
            echo "// JS file not found: {$path}";
        } else {
            header('Content-Type: text/plain');
            echo "File not found: {$path}";
        }
        exit;
    }
}
