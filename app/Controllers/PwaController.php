<?php
/**
 * DGLab PWA - PWA Controller
 * 
 * Handles PWA manifest and service worker.
 * 
 * @package DGLab\Controllers
 * @author DGLab Team
 * @version 1.0.0
 */

namespace DGLab\Controllers;

use DGLab\Core\Controller;

/**
 * PwaController Class
 * 
 * Controller for PWA resources.
 */
class PwaController extends Controller
{
    /**
     * Generate and serve manifest.json
     * 
     * @return void
     */
    public function manifest(): void
    {
        $pwaConfig = $this->config['pwa'] ?? [];
        
        $manifest = [
            'id'               => $pwaConfig['id'] ?? 'com.dgcodeideas.dglab.pwa',
            'name'             => $pwaConfig['name'] ?? APP_NAME,
            'short_name'       => $pwaConfig['short_name'] ?? 'DGLab',
            'description'      => $pwaConfig['description'] ?? 'Digital Lab - Web Tools Platform',
            'lang'             => $pwaConfig['lang'] ?? 'en-US',
            'dir'              => $pwaConfig['dir'] ?? 'ltr',
            'categories'       => $pwaConfig['categories'] ?? [],
            'start_url'        => $pwaConfig['start_url'] ?? '/',
            'display'          => $pwaConfig['display'] ?? 'standalone',
            'background_color' => $pwaConfig['background_color'] ?? '#ffffff',
            'theme_color'      => $pwaConfig['theme_color'] ?? '#4f46e5',
            'orientation'      => $pwaConfig['orientation'] ?? 'any',
            'scope'            => $pwaConfig['scope'] ?? '/',
            'icons'            => $pwaConfig['icons'] ?? [],
            'screenshots'      => $pwaConfig['screenshots'] ?? [],
            'shortcuts'        => $pwaConfig['shortcuts'] ?? [],
        ];
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($manifest, JSON_PRETTY_PRINT);
    }

    /**
     * Generate and serve service worker
     * 
     * @return void
     */
    public function serviceWorker(): void
    {
        header('Content-Type: application/javascript; charset=utf-8');
        header('Service-Worker-Allowed: /');
        
        $cacheVersion = APP_VERSION;
        $cacheName = 'dglab-cache-v' . $cacheVersion;
        $baseUrl = rtrim($this->config['app']['base_url'] ?? '', '/');
        
        echo <<<JS
/**
 * DGLab PWA - Optimized Service Worker
 * @version {$cacheVersion}
 */

const CACHE_NAME = '{$cacheName}';
const ASSETS_CACHE = 'dglab-assets-v1';
const IMAGE_CACHE = 'dglab-images-v1';

const STATIC_ASSETS = [
    '{$baseUrl}/',
    '{$baseUrl}/offline',
    '{$baseUrl}/assets/css/app.css',
    '{$baseUrl}/assets/css/tailwind.css',
    '{$baseUrl}/assets/js/app.js',
    '{$baseUrl}/assets/js/vendor/jquery.min.js',
    '{$baseUrl}/assets/vendor/bootstrap/css/bootstrap.min.css',
    '{$baseUrl}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
    '{$baseUrl}/assets/vendor/fontawesome/css/all.min.css',
];

// Install event - cache static assets
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => {
                console.log('[SW] Caching static assets');
                return cache.addAll(STATIC_ASSETS);
            })
            .then(() => self.skipWaiting())
    );
});

// Activate event - clean up old caches
self.addEventListener('activate', (event) => {
    const cacheWhitelist = [CACHE_NAME, ASSETS_CACHE, IMAGE_CACHE];
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (!cacheWhitelist.includes(cacheName)) {
                        console.log('[SW] Deleting old cache:', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

// Fetch event handler
self.addEventListener('fetch', (event) => {
    const { request } = event;
    const url = new URL(request.url);

    // Only handle GET requests
    if (request.method !== 'GET') return;

    // Skip API and processing routes
    if (url.pathname.startsWith('/api/') ||
        url.pathname.includes('/upload/') ||
        url.pathname.includes('/process')) {
        return;
    }

    // Navigation requests - Network First, then Cache, then Offline fallback
    if (request.mode === 'navigate') {
        event.respondWith(
            fetch(request)
                .then((response) => {
                    const copy = response.clone();
                    caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));
                    return response;
                })
                .catch(() => caches.match(request) || caches.match('{$baseUrl}/offline'))
        );
        return;
    }

    // Static Assets - Cache First, then Network
    if (url.pathname.includes('/assets/')) {
        const cacheToUse = url.pathname.match(/\.(jpg|jpeg|png|gif|svg|webp)$/) ? IMAGE_CACHE : ASSETS_CACHE;
        event.respondWith(
            caches.match(request).then((cachedResponse) => {
                if (cachedResponse) return cachedResponse;
                return fetch(request).then((response) => {
                    if (response.ok) {
                        const copy = response.clone();
                        caches.open(cacheToUse).then((cache) => cache.put(request, copy));
                    }
                    return response;
                });
            })
        );
        return;
    }

    // Default strategy: Stale-While-Revalidate
    event.respondWith(
        caches.match(request).then((cachedResponse) => {
            const fetchPromise = fetch(request).then((networkResponse) => {
                if (networkResponse.ok) {
                    const copy = networkResponse.clone();
                    caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));
                }
                return networkResponse;
            });
            return cachedResponse || fetchPromise;
        })
    );
});

// Handle messages (e.g., skipWaiting)
self.addEventListener('message', (event) => {
    if (event.data && event.data.type === 'SKIP_WAITING') {
        self.skipWaiting();
    }
});
JS;
    }

    /**
     * Offline page
     * 
     * @return void
     */
    public function offline(): void
    {
        $this->render('pwa/offline', [
            'title'      => 'Offline',
            'active_nav' => 'offline',
        ]);
    }
}
