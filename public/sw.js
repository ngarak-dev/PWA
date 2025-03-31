const CACHE_VERSION = 'v1';
const CACHE_NAME = `site-static-${CACHE_VERSION}`;
const dynamicCacheName = 'site-dynamic-v1';
const assets = [
    'https://testing-pwa-main-nklh3x.laravel.cloud/',
    'https://testing-pwa-main-nklh3x.laravel.cloud/offline',
    'https://testing-pwa-main-nklh3x.laravel.cloud/css/app.css',
    'https://testing-pwa-main-nklh3x.laravel.cloud/js/app.js',
    'https://testing-pwa-main-nklh3x.laravel.cloud/manifest.json',
    'https://fonts.googleapis.com/css?family=Inter',
];

// Install service worker
self.addEventListener('install', evt => {
    evt.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            console.log('caching shell assets');
            cache.addAll(assets);
        })
    );
});

// Activate event
self.addEventListener('activate', evt => {
    evt.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(keys
                .filter(key => key !== CACHE_NAME && key !== dynamicCacheName)
                .map(key => caches.delete(key))
            );
        })
    );
});

// Fetch event
self.addEventListener('fetch', evt => {
    evt.respondWith(
        caches.match(evt.request).then(cacheRes => {
            return cacheRes || fetch(evt.request).then(fetchRes => {
                return caches.open(dynamicCacheName).then(cache => {
                    cache.put(evt.request.url, fetchRes.clone());
                    return fetchRes;
                })
            });
        }).catch(() => {
            if (evt.request.url.indexOf('.html') > -1) {
                return caches.match('/offline');
            }
            // Handle offline images
            if (evt.request.url.match(/\.(jpg|jpeg|png|gif|svg)$/)) {
                return caches.match('/icons/offline-image.png');
            }
        })
    );
});
