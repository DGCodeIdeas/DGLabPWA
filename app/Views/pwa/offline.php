<?php
/**
 * Offline Page View - Redesigned for Bootstrap 5
 *
 * @package DGLab\Views\Pwa
 */
?>
<div class="container py-5">
    <div class="row min-vh-75 align-items-center justify-content-center text-center py-5">
        <div class="col-lg-6">
            <div class="position-relative mb-5">
                <span class="display-1 fw-black opacity-10 position-absolute top-50 start-50 translate-middle tracking-tighter" style="font-size: 15rem; z-index: -1;">OFFLINE</span>
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4 shadow-sm" style="width: 8rem; height: 8rem;">
                    <i class="fas fa-wifi-slash fs-1" aria-hidden="true"></i>
                </div>
            </div>

            <h1 class="display-4 fw-bold mb-3">You're <span class="text-primary">Offline</span></h1>
            <p class="lead text-muted mb-5">
                It seems you've lost your connection. Don't worry, many of our tools
                work offline once they are cached on your device.
            </p>

            <div class="alert alert-warning border-0 rounded-4 p-4 shadow-sm mb-5 text-start">
                <div class="d-flex align-items-center">
                    <i class="fas fa-info-circle fs-3 me-3" aria-hidden="true"></i>
                    <div>
                        <h4 class="alert-heading fw-bold mb-1">What can I do?</h4>
                        <ul class="mb-0 small opacity-80 ps-3">
                            <li>Check your internet connection and try again.</li>
                            <li>Use previously visited tools that are cached offline.</li>
                            <li>Wait for your connection to be restored.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <button onclick="window.location.reload();" class="btn btn-primary btn-lg rounded-pill px-5 shadow">
                    <i class="fas fa-sync-alt me-2" aria-hidden="true"></i> Try Again
                </a>
                <a href="<?php echo $base_url; ?>/" class="btn btn-outline-secondary btn-lg rounded-pill px-5">
                    <i class="fas fa-home me-2" aria-hidden="true"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
