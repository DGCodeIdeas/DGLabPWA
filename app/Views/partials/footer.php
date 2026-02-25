<?php
/**
 * Footer Partial
 * 
 * @package DGLab\Views\Partials
 */
?>
<footer class="bg-gray-900 text-gray-400 py-12 mt-auto" role="contentinfo">
    <div class="container">
        <div class="row gy-8">
            <!-- Brand -->
            <div class="col-lg-4 col-md-12">
                <a href="<?php echo $base_url; ?>/" class="d-flex align-items-center gap-2 text-white text-decoration-none fw-bold mb-4 fs-4 transition-transform hover:scale-105">
                    <i class="fas fa-cube text-indigo-400"></i>
                    <span><?php echo APP_NAME; ?></span>
                </a>
                <p class="mb-0 text-gray-400 max-w-sm">
                    A collection of web tools for file processing and conversion. 
                    Built with modern web technologies and optimized for mobile devices.
                </p>
            </div>
            
            <!-- Links -->
            <div class="col-lg-8 col-md-12">
                <div class="row gy-6">
                    <div class="col-sm-4">
                        <h5 class="text-white fw-bold mb-4 text-uppercase tracking-wider fs-6">Quick Links</h5>
                        <ul class="list-unstyled d-flex flex-column gap-2">
                            <li><a href="<?php echo $base_url; ?>/" class="text-gray-400 hover:text-white transition-colors text-decoration-none">Home</a></li>
                            <li><a href="<?php echo $base_url; ?>/tools" class="text-gray-400 hover:text-white transition-colors text-decoration-none">Tools</a></li>
                            <li><a href="<?php echo $base_url; ?>/docs" class="text-gray-400 hover:text-white transition-colors text-decoration-none">Documentation</a></li>
                            <li><a href="<?php echo $base_url; ?>/about" class="text-gray-400 hover:text-white transition-colors text-decoration-none">About</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <h5 class="text-white fw-bold mb-4 text-uppercase tracking-wider fs-6">Categories</h5>
                        <ul class="list-unstyled d-flex flex-column gap-2">
                            <li><a href="<?php echo $base_url; ?>/tools/category/E-Books" class="text-gray-400 hover:text-white transition-colors text-decoration-none">E-Books</a></li>
                            <li><a href="<?php echo $base_url; ?>/tools/category/Documents" class="text-gray-400 hover:text-white transition-colors text-decoration-none">Documents</a></li>
                            <li><a href="<?php echo $base_url; ?>/tools/category/Images" class="text-gray-400 hover:text-white transition-colors text-decoration-none">Images</a></li>
                            <li><a href="<?php echo $base_url; ?>/tools" class="text-gray-400 hover:text-white transition-colors text-decoration-none">All Categories</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <h5 class="text-white fw-bold mb-4 text-uppercase tracking-wider fs-6">Resources</h5>
                        <ul class="list-unstyled d-flex flex-column gap-2">
                            <li><a href="<?php echo $base_url; ?>/docs/api" class="text-gray-400 hover:text-white transition-colors text-decoration-none">API Docs</a></li>
                            <li><a href="<?php echo $base_url; ?>/docs/development" class="text-gray-400 hover:text-white transition-colors text-decoration-none">Development</a></li>
                            <li><a href="<?php echo $base_url; ?>/manifest.json" class="text-gray-400 hover:text-white transition-colors text-decoration-none">Manifest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="border-top border-gray-800 mt-10 pt-8 d-flex flex-column flex-md-row justify-content-between align-items-center gap-4">
            <p class="mb-0 text-sm">
                &copy; <?php echo date('Y'); ?> <?php echo APP_NAME; ?>. All rights reserved.
            </p>
            <div class="d-flex align-items-center gap-4">
                <span class="badge bg-gray-800 text-gray-400 px-3 py-2 fw-normal">Version <?php echo APP_VERSION; ?></span>
            </div>
        </div>
    </div>
</footer>
