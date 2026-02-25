<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline - <?php echo APP_NAME; ?></title>
    <!-- Application CSS -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/vendor/fontawesome/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-indigo-600 to-purple-700 min-h-screen d-flex align-items-center justify-content-center text-white antialiased">
    <div class="text-center p-6 max-w-sm">
        <div class="bg-white/20 rounded-circle d-inline-flex align-items-center justify-content-center mb-6" style="width: 100px; height: 100px;">
            <i class="fas fa-wifi-slash fs-1 text-white"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">You're Offline</h1>
        <p class="fs-5 opacity-90 mb-8 leading-relaxed">
            It looks like you've lost your internet connection. 
            Please check your connection and try again.
        </p>
        <div class="d-grid gap-3">
            <button class="btn btn-light rounded-pill py-3 fw-bold text-indigo-600 shadow-lg border-0 d-flex align-items-center justify-content-center gap-2" onclick="window.location.reload()" aria-label="Try Again">
                <i class="fas fa-sync-alt"></i>
                <span>Try Again</span>
            </button>
            <a href="/" class="btn btn-outline-light rounded-pill py-3 d-flex align-items-center justify-content-center gap-2" aria-label="Go Home">
                <i class="fas fa-home"></i>
                <span>Go Home</span>
            </a>
        </div>
    </div>
</body>
</html>
