/**
 * DGLab PWA - Optimized Service Worker
 */

const CACHE_NAME = 'dglab-cache-v1.0.0';
const ASSETS_CACHE = 'dglab-assets-v1';
const IMAGE_CACHE = 'dglab-images-v1';

const STATIC_ASSETS = [
    '/',
    '/offline',
    '/assets/css/app.css',
    '/assets/css/tailwind.css',
    '/assets/js/app.js',
    '/assets/js/vendor/jquery.min.js',
    '/assets/vendor/bootstrap/css/bootstrap.min.css',
    '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
    '/assets/vendor/fontawesome/css/all.min.css',
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
                .catch(() => caches.match(request) || caches.match('/offline'))
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
