<?php
/**
 * 500 Internal Server Error View - Bootstrap 5 Overhaul
 * 
 * @package DGLab\Views\Errors
 */
?>
<div class="container py-5">
    <div class="row min-vh-75 align-items-center justify-content-center text-center py-5">
        <div class="col-lg-6">
            <div class="position-relative mb-5">
                <span class="display-1 fw-black opacity-10 position-absolute top-50 start-50 translate-middle tracking-tighter" style="font-size: 15rem; z-index: -1;">500</span>
                <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4 shadow-sm" style="width: 8rem; height: 8rem;">
                    <i class="fas fa-exclamation-triangle fs-1" aria-hidden="true"></i>
                </div>
            </div>

            <h1 class="display-4 fw-bold mb-3">Internal <span class="text-danger">Server Error</span></h1>
            <p class="lead text-muted mb-5">
                Something went wrong on our end. We've been notified and are working to fix it.
            </p>

            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="<?php echo $base_url; ?>/" class="btn btn-primary btn-lg rounded-pill px-5 shadow">
                    <i class="fas fa-home me-2" aria-hidden="true"></i> Back to Home
                </a>
                <button onclick="window.location.reload();" class="btn btn-outline-secondary btn-lg rounded-pill px-5">
                    <i class="fas fa-sync-alt me-2" aria-hidden="true"></i> Try Again
                </button>
            </div>
        </div>
    </div>
</div>
