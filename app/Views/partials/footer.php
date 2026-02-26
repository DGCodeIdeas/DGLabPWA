<?php
/**
 * Footer Partial - Refactored for Bootstrap 5
 * 
 * @package DGLab\Views\Partials
 */
?>
<footer class="bg-dark text-white-50 py-5 border-top border-secondary border-opacity-10" role="contentinfo">
    <div class="container py-4">
        <div class="row g-5">
            <!-- Brand -->
            <div class="col-lg-4">
                <a href="<?php echo $base_url; ?>/" class="d-flex align-items-center mb-4 text-white text-decoration-none">
                    <span class="bg-primary rounded-2 d-flex align-items-center justify-content-center me-2" style="width: 2rem; height: 2rem;">
                        <i class="fas fa-cube text-white small"></i>
                    </span>
                    <span class="h4 mb-0 fw-bold"><?php echo APP_NAME; ?></span>
                </a>
                <p class="mb-4 small lh-base">
                    A collection of high-performance web tools for professional file processing and conversion.
                    Built with privacy and precision at its core.
                </p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white-50 hover-white transition-all" aria-label="GitHub"><i class="fab fa-github fs-5"></i></a>
                    <a href="#" class="text-white-50 hover-white transition-all" aria-label="Twitter"><i class="fab fa-twitter fs-5"></i></a>
                </div>
            </div>
            
            <!-- Links -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <div class="col-sm-4">
                        <h4 class="h6 fw-bold text-white text-uppercase tracking-widest mb-4">Quick Links</h4>
                        <ul class="list-unstyled small vstack gap-2">
                            <li><a href="<?php echo $base_url; ?>/" class="text-white-50 text-decoration-none hover-white">Home</a></li>
                            <li><a href="<?php echo $base_url; ?>/tools" class="text-white-50 text-decoration-none hover-white">Tools Arsenal</a></li>
                            <li><a href="<?php echo $base_url; ?>/docs" class="text-white-50 text-decoration-none hover-white">Documentation</a></li>
                            <li><a href="<?php echo $base_url; ?>/about" class="text-white-50 text-decoration-none hover-white">About Us</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <h4 class="h6 fw-bold text-white text-uppercase tracking-widest mb-4">Categories</h4>
                        <ul class="list-unstyled small vstack gap-2">
                            <li><a href="<?php echo $base_url; ?>/tools/category/E-Books" class="text-white-50 text-decoration-none hover-white">E-Books</a></li>
                            <li><a href="<?php echo $base_url; ?>/tools/category/Documents" class="text-white-50 text-decoration-none hover-white">Documents</a></li>
                            <li><a href="<?php echo $base_url; ?>/tools/category/Images" class="text-white-50 text-decoration-none hover-white">Images</a></li>
                            <li><a href="<?php echo $base_url; ?>/tools" class="text-white-50 text-decoration-none hover-white">All Categories</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <h4 class="h6 fw-bold text-white text-uppercase tracking-widest mb-4">Resources</h4>
                        <ul class="list-unstyled small vstack gap-2">
                            <li><a href="<?php echo $base_url; ?>/docs/api" class="text-white-50 text-decoration-none hover-white">API Reference</a></li>
                            <li><a href="<?php echo $base_url; ?>/docs/development" class="text-white-50 text-decoration-none hover-white">Developer Hub</a></li>
                            <li><a href="<?php echo $base_url; ?>/manifest.json" class="text-white-50 text-decoration-none hover-white">PWA Manifest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-5 pt-4 border-top border-white border-opacity-10 x-small">
            <p class="mb-2 mb-md-0">
                &copy; <?php echo date('Y'); ?> <?php echo APP_NAME; ?>. Engineered for excellence.
            </p>
            <div class="d-flex gap-4">
                <span>Version <?php echo APP_VERSION; ?></span>
                <a href="#" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a>
                <a href="#" class="text-white-50 text-decoration-none hover-white">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<style>
.hover-white:hover {
    color: #fff !important;
}
.x-small {
    font-size: 0.75rem;
}
.transition-all {
    transition: all 0.2s ease-in-out;
}
</style>
