<?php
/**
 * 404 Not Found Error Page
 * 
 * @package DGLab\Views\Errors
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <!-- Application CSS -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/vendor/fontawesome/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen d-flex align-items-center justify-content-center antialiased">
    <div class="text-center p-6 max-w-lg">
        <div class="display-1 fw-bold text-gradient mb-4">404</div>
        <h1 class="h2 fw-bold text-gray-900 mb-3">Page Not Found</h1>
        <p class="fs-5 text-gray-600 mb-8 leading-relaxed">
            Sorry, we couldn't find the page you're looking for. 
            It might have been moved or deleted.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="/" class="btn btn-primary rounded-pill px-6 py-3 btn-gradient border-0 d-flex align-items-center gap-2 shadow-lg">
                <i class="fas fa-home"></i>
                <span>Go Home</span>
            </a>
            <a href="/tools" class="btn btn-outline-secondary rounded-pill px-6 py-3 d-flex align-items-center gap-2">
                <i class="fas fa-tools"></i>
                <span>Browse Tools</span>
            </a>
        </div>
    </div>
</body>
</html>
