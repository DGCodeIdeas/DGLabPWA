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

    /**
     * Serve JS file (legacy support)
     * 
     * @param string $file Filename
     * @return void
     */
    public function js(string $file): void
    {
        $cachePath = CACHE_PATH . '/assets/' . $file;

        // If missing, try to bundle from source
        if (!file_exists($cachePath)) {
            if (file_exists(ASSETS_PATH . '/js/' . $file)) {
                AssetBundler::js($file, $file);
            }
        }

        if (file_exists($cachePath)) {
            $this->serveFile($cachePath);
            return;
        }
        
        $this->serve('js/' . $file);
    }

    /**
     * Serve cached asset file
     *
     * @param string $file Filename
     * @return void
     */
    public function serveCache(string $file): void
    {
        $cachePath = CACHE_PATH . '/assets/' . $file;
        if (file_exists($cachePath)) {
            $this->serveFile($cachePath);
            return;
        }
        $this->handleNotFound($file);
    }

    /**
     * Generic asset serving
     *
     * @param string $path Relative path to asset
     * @return void
     */
    public function serve(string $path): void
    {
        // 1. Basic sanitization and normalization
        $path = str_replace(["\0", "\r", "\n"], '', $path);
        $path = ltrim($path, '/\\');

        // 2. Prevent directory traversal early (Defense in depth)
        if (strpos($path, '..') !== false) {
            $this->handleNotFound($path);
            return;
        }

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

            // 3. Robust security checks:
            // - File must exist and be a physical file
            // - Must be within the allowed root (prevents traversal and sibling dir access)
            if ($realPath && is_file($realPath)) {

                // Ensure the real path starts with the root path followed by a directory separator
                // This prevents matching sibling directories (e.g., /assets_secret matching /assets)
                $rootWithSeparator = rtrim($root, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

                if (strpos($realPath, $rootWithSeparator) !== 0) {
                    continue;
                }

                $filename = basename($realPath);
                $extension = strtolower(pathinfo($realPath, PATHINFO_EXTENSION));

                // 4. Block sensitive files and hidden files
                $blockedExtensions = ['php', 'php3', 'php4', 'php5', 'phtml', 'phps', 'htaccess', 'htpasswd', 'env', 'config', 'log', 'sql'];
                if (in_array($extension, $blockedExtensions) || strpos($filename, '.') === 0 || $filename === 'config.php') {
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
