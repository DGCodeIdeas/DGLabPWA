<!DOCTYPE html>
<html lang="<?php echo $locale ?? 'en'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo $csrf_token; ?>">
    
    <!-- Title -->
    <title><?php echo htmlspecialchars($title ?? APP_NAME); ?> - <?php echo APP_NAME; ?></title>
    
    <!-- Meta Description -->
    <meta name="description" content="<?php echo htmlspecialchars($description ?? 'DGLab PWA - A collection of web tools for file processing and conversion'); ?>">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#4f46e5">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="<?php echo $base_url; ?>/manifest.json">
    
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="<?php echo $base_url; ?>/assets/icons/icon-192x192.png">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo $base_url; ?>/assets/icons/icon-72x72.png">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo DGLab\Core\AssetBundler::asset('vendor/fontawesome/css/all.min.css'); ?>">
    
    <!-- Main Compiled CSS (Includes Bootstrap & Tailwind) -->
    <link rel="stylesheet" href="<?php echo DGLab\Core\AssetBundler::asset('css/tailwind.css'); ?>">
    
    <!-- Page-specific CSS -->
    <?php if (isset($page_css)): ?>
        <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/<?php echo $page_css; ?>.css?v=<?php echo APP_VERSION; ?>">
    <?php endif; ?>

    <style>
        ::selection {
            background-color: #4f46e5;
            color: white;
        }
    </style>
</head>
<body class="bg-light <?php echo $body_class ?? ''; ?>">
    <!-- Skip to content link for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- Header -->
    <?php include VIEWS_PATH . '/partials/header.php'; ?>
    
    <!-- Main Content -->
    <main id="main-content" class="main-content">
        <?php echo $content; ?>
    </main>
    
    <!-- Footer -->
    <?php include VIEWS_PATH . '/partials/footer.php'; ?>
    
    <!-- Toast Notifications Container -->
    <div id="toast-container" class="toast-container" aria-live="polite" aria-atomic="true"></div>
    
    <!-- Loading Overlay -->
    <div id="loading-overlay" class="loading-overlay" style="display: none;">
        <div class="text-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 fw-bold text-dark loading-text">Processing...</p>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="<?php echo DGLab\Core\AssetBundler::asset('js/vendor/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="<?php echo DGLab\Core\AssetBundler::asset('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    
    <!-- Application JavaScript -->
    <script src="<?php echo DGLab\Core\AssetBundler::asset('js/app.js'); ?>"></script>
    
    <!-- Page-specific JavaScript -->
    <?php if (isset($page_js)): ?>
        <script src="<?php echo $base_url; ?>/assets/js/<?php echo $page_js; ?>.js?v=<?php echo APP_VERSION; ?>"></script>
    <?php endif; ?>
    
    <!-- PWA Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('<?php echo $base_url; ?>/sw.js')
                    .then(function(registration) {
                        console.log('SW registered:', registration.scope);
                        registration.addEventListener('updatefound', () => {
                            const newWorker = registration.installing;
                            newWorker.addEventListener('statechange', () => {
                                if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                    showUpdateNotification(registration);
                                }
                            });
                        });
                    })
                    .catch(function(error) {
                        console.log('SW registration failed:', error);
                    });
            });

            let refreshing = false;
            navigator.serviceWorker.addEventListener('controllerchange', () => {
                if (!refreshing) {
                    window.location.reload();
                    refreshing = true;
                }
            });
        }

        function showUpdateNotification(registration) {
            const toast = document.createElement('div');
            toast.className = 'toast align-items-center text-white bg-primary border-0 show';
            toast.style.position = 'fixed';
            toast.style.bottom = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
            toast.role = 'alert';
            toast.ariaLive = 'assertive';
            toast.ariaAtomic = 'true';
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        New version available!
                    </div>
                    <button type="button" id="update-btn" class="btn btn-light btn-sm me-2 m-auto">Update</button>
                </div>
            `;
            document.body.appendChild(toast);

            document.getElementById('update-btn').addEventListener('click', () => {
                if (registration.waiting) {
                    registration.waiting.postMessage({ type: 'SKIP_WAITING' });
                }
            });
        }
    </script>
</body>
</html>
