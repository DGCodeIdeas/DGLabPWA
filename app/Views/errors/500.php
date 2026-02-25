<?php
/**
 * 500 Server Error Page
 * 
 * @package DGLab\Views\Errors
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error</title>
    <!-- Application CSS -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/vendor/fontawesome/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen d-flex align-items-center justify-content-center antialiased">
    <div class="text-center p-6 max-w-lg">
        <div class="display-1 fw-bold text-red-500 mb-4">500</div>
        <h1 class="h2 fw-bold text-gray-900 mb-3">Server Error</h1>
        <p class="fs-5 text-gray-600 mb-8 leading-relaxed">
            Sorry, something went wrong on our end. 
            Please try again later or contact support if the problem persists.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="/" class="btn btn-primary rounded-pill px-6 py-3 btn-gradient border-0 d-flex align-items-center gap-2 shadow-lg" aria-label="Go Home">
                <i class="fas fa-home"></i>
                <span>Go Home</span>
            </a>
            <button onclick="window.location.reload()" class="btn btn-outline-secondary rounded-pill px-6 py-3 d-flex align-items-center gap-2" aria-label="Try Again">
                <i class="fas fa-sync-alt"></i>
                <span>Try Again</span>
            </button>
        </div>
    </div>
</body>
</html>
