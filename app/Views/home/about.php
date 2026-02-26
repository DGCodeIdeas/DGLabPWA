<?php
/**
 * About Page View - Bootstrap 5 Overhaul
 * 
 * @package DGLab\Views\Home
 */
?>
<!-- Page Header -->
<section class="py-5 bg-dark text-white position-relative overflow-hidden">
    <!-- Decorative Blur Blobs -->
    <div class="tw-bg-blur-blob position-absolute" style="top: -20%; right: -10%; background: radial-gradient(circle, rgba(79, 70, 229, 0.2) 0%, transparent 70%);"></div>
    <div class="tw-bg-blur-blob position-absolute" style="bottom: -20%; left: -10%; background: radial-gradient(circle, rgba(124, 58, 237, 0.15) 0%, transparent 70%);"></div>

    <div class="container py-5 position-relative z-1">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-1 fw-bold mb-4">Our <span class="text-primary">Story</span></h1>
                <p class="lead opacity-75 fs-3 mb-0" style="max-width: 700px;">
                    Crafting powerful tools with an uncompromising focus on privacy and aesthetic beauty.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5 align-items-start">
            <div class="col-lg-7">
                <div class="pe-lg-5">
                    <h2 class="display-5 fw-bold mb-4 text-dark">Our Mission</h2>
                    <p class="lead text-muted mb-5 lh-base">
                        <?php echo APP_NAME; ?> was created with a simple mission: to provide powerful,
                        easy-to-use web tools for file processing and conversion. We believe that
                        everyone should have access to professional-grade tools without needing
                        technical expertise or expensive software.
                    </p>

                    <h2 class="display-6 fw-bold mb-4 text-dark">What Makes Us Different</h2>
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 bg-light rounded-4 p-4 transition-hover">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center mb-4 shadow-sm" style="width: 3.5rem; height: 3.5rem;">
                                    <i class="fas fa-shield-alt fs-4" aria-hidden="true"></i>
                                </div>
                                <h3 class="h5 fw-bold mb-3">Privacy First</h3>
                                <p class="text-muted small mb-0">Your files are processed securely and automatically deleted after processing. We never store your data.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 bg-light rounded-4 p-4 transition-hover">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center mb-4 shadow-sm" style="width: 3.5rem; height: 3.5rem;">
                                    <i class="fas fa-globe fs-4" aria-hidden="true"></i>
                                </div>
                                <h3 class="h5 fw-bold mb-3">Works Everywhere</h3>
                                <p class="text-muted small mb-0">Our Progressive Web App works on any device with a modern web browser. No installation required.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 bg-light rounded-4 p-4 transition-hover">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center mb-4 shadow-sm" style="width: 3.5rem; height: 3.5rem;">
                                    <i class="fas fa-bolt fs-4" aria-hidden="true"></i>
                                </div>
                                <h3 class="h5 fw-bold mb-3">Fast & Efficient</h3>
                                <p class="text-muted small mb-0">Optimized algorithms and chunked uploads ensure quick processing of even large files.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 bg-light rounded-4 p-4 transition-hover">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center mb-4 shadow-sm" style="width: 3.5rem; height: 3.5rem;">
                                    <i class="fas fa-code fs-4" aria-hidden="true"></i>
                                </div>
                                <h3 class="h5 fw-bold mb-3">Developer Friendly</h3>
                                <p class="text-muted small mb-0">Complete REST API for integrating our tools into your own applications.</p>
                            </div>
                        </div>
                    </div>

                    <h2 class="display-6 fw-bold mb-4 text-dark">Technology Stack</h2>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-3 rounded-pill fw-bold">PHP 8.3</span>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-3 rounded-pill fw-bold">Bootstrap 5</span>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-3 rounded-pill fw-bold">Tailwind CSS</span>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-3 rounded-pill fw-bold">PWA</span>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-3 rounded-pill fw-bold">Service Workers</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="sticky-top" style="top: 6rem;">
                    <!-- Platform Stats Card -->
                    <div class="card border-0 bg-primary text-white rounded-5 p-4 p-lg-5 shadow-lg mb-4 overflow-hidden position-relative">
                        <div class="position-absolute top-0 end-0 w-50 h-100 bg-white opacity-10 rounded-circle translate-middle"></div>

                        <div class="position-relative z-1">
                            <h3 class="h4 fw-bold mb-5 opacity-75 text-uppercase tracking-widest small">Platform Stats</h3>
                            <div class="vstack gap-5">
                                <div>
                                    <span class="display-3 fw-bold d-block mb-1">
                                        <?php echo $tool_count ?? 0; ?>
                                    </span>
                                    <span class="text-primary-light text-uppercase tracking-widest fw-bold small opacity-75">Available Tools</span>
                                </div>
                                <div>
                                    <span class="display-3 fw-bold d-block mb-1">100MB</span>
                                    <span class="text-primary-light text-uppercase tracking-widest fw-bold small opacity-75">Max File Size</span>
                                </div>
                                <div>
                                    <span class="display-3 fw-bold d-block mb-1">24/7</span>
                                    <span class="text-primary-light text-uppercase tracking-widest fw-bold small opacity-75">Uptime Focus</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Call to Action Card -->
                    <div class="card border-0 bg-dark text-white rounded-5 p-4 p-lg-5 shadow-lg">
                        <h3 class="h4 fw-bold mb-3">Ready to start?</h3>
                        <p class="text-white-50 mb-4 lh-base">Experience the future of file processing today with our high-performance arsenal.</p>
                        <a href="<?php echo $base_url; ?>/tools" class="btn btn-light btn-lg w-100 py-3 rounded-3 fw-bold text-primary">
                            Explore Tools
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.transition-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.08) !important;
}
.text-primary-light {
    color: #e0e7ff;
}
</style>
