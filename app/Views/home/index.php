<?php
/**
 * Home Page View - Redesigned for Bootstrap 5 with a touch of Palette
 * 
 * @package DGLab\Views\Home
 */
?>
<!-- Hero Section -->
<section class="position-relative py-5 overflow-hidden bg-white border-bottom">
    <!-- Palette's Touch: Animated Blobs -->
    <div class="tw-bg-blur-blob position-absolute" style="top: -10%; right: -5%; background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, transparent 70%);"></div>
    <div class="tw-bg-blur-blob position-absolute" style="bottom: -10%; left: -5%; background: radial-gradient(circle, rgba(124, 58, 237, 0.1) 0%, transparent 70%);"></div>

    <div class="container position-relative z-1 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <h1 class="display-1 fw-black mb-4 tracking-tighter">
                    Powerful Web Tools for
                    <span class="tw-text-gradient">File Processing</span>
                </h1>
                <p class="lead text-muted mb-5 fs-4">
                    Transform, convert, and optimize your files with our collection of
                    high-performance, privacy-first tools.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo $base_url; ?>/tools" class="btn btn-primary btn-lg rounded-pill px-5 shadow">
                        <i class="fas fa-rocket me-2" aria-hidden="true"></i> Get Started
                    </a>
                    <a href="<?php echo $base_url; ?>/docs" class="btn btn-outline-secondary btn-lg rounded-pill px-5">
                        <i class="fas fa-book me-2" aria-hidden="true"></i> Documentation
                    </a>
                </div>
            </div>

            <!-- Hero Visual: Clean with a touch of Asymmetry -->
            <div class="col-lg-5 position-relative mt-5 mt-lg-0">
                <div class="position-relative py-5">
                    <div class="card border-0 shadow-lg rounded-4 p-4 tw-floating-card mx-auto" style="max-width: 320px; z-index: 10;">
                        <div class="bg-primary bg-gradient rounded-4 d-flex align-items-center justify-content-center mb-4 shadow" style="width: 4rem; height: 4rem;">
                            <i class="fas fa-magic text-white fs-3" aria-hidden="true"></i>
                        </div>
                        <div class="text-uppercase tracking-widest text-secondary fw-bold small mb-2">Processor</div>
                        <h2 class="h4 fw-bold">Instant Conversion</h2>
                        <p class="text-muted small mb-0">Drag and drop any file to begin the magic.</p>
                    </div>

                    <!-- Decorative back element -->
                    <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 border border-primary opacity-10 rounded-circle" style="z-index: 0;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-4">Built for <span class="text-primary">Privacy</span> & Speed</h2>
                <p class="lead text-muted">
                    We've optimized every layer to ensure your files are processed securely and efficiently.
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center mb-4" style="width: 3.5rem; height: 3.5rem;">
                            <i class="fas fa-bolt fs-4" aria-hidden="true"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">Fast Processing</h3>
                        <p class="text-muted small mb-0">Optimized algorithms and chunked uploads for maximum efficiency.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center mb-4" style="width: 3.5rem; height: 3.5rem;">
                            <i class="fas fa-shield-alt fs-4" aria-hidden="true"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">Privacy First</h3>
                        <p class="text-muted small mb-0">Secure processing with automated deletion policies for your peace of mind.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-info bg-opacity-10 text-info rounded-3 d-flex align-items-center justify-content-center mb-4" style="width: 3.5rem; height: 3.5rem;">
                            <i class="fas fa-mobile-alt fs-4" aria-hidden="true"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">PWA Ready</h3>
                        <p class="text-muted small mb-0">Install on any device for a seamless app-like experience anywhere.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-3 d-flex align-items-center justify-content-center mb-4" style="width: 3.5rem; height: 3.5rem;">
                            <i class="fas fa-code fs-4" aria-hidden="true"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">API Access</h3>
                        <p class="text-muted small mb-0">Comprehensive RESTful API for seamless integration into your workflows.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tools Preview -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h2 class="display-6 fw-bold mb-0">Available <span class="tw-text-gradient">Tools</span></h2>
            <a href="<?php echo $base_url; ?>/tools" class="btn btn-link text-primary fw-bold text-decoration-none p-0">
                View Arsenal <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
            </a>
        </div>
        
        <div class="row g-4">
            <?php $i = 0; foreach ($featured as $id => $tool): ?>
                <div class="col-md-6 <?php echo $i % 2 === 1 ? 'tw-offset-y-lg' : ''; ?>">
                    <a href="<?php echo $base_url; ?>/tool/<?php echo $id; ?>" class="card h-100 border-0 shadow rounded-4 p-4 p-lg-5 text-decoration-none transition-hover group-card">
                        <div class="bg-primary rounded-4 d-flex align-items-center justify-content-center mb-4 text-white shadow-sm" style="width: 4.5rem; height: 4.5rem;">
                            <i class="fas <?php echo $tool->getIcon(); ?> fs-2" aria-hidden="true"></i>
                        </div>
                        <h3 class="h3 fw-bold text-dark mb-3"><?php echo htmlspecialchars($tool->getName()); ?></h3>
                        <p class="text-muted mb-4 lead fs-6">
                            <?php echo htmlspecialchars($tool->getDescription()); ?>
                        </p>
                        <div>
                            <span class="badge rounded-pill bg-light text-primary px-4 py-2 fw-bold text-uppercase tracking-widest small border">
                                <?php echo htmlspecialchars($tool->getCategory()); ?>
                            </span>
                        </div>
                    </a>
                </div>
            <?php $i++; endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light border-top">
    <div class="container py-5">
        <div class="bg-primary bg-gradient rounded-5 p-5 p-lg-5 text-center text-white shadow-lg position-relative overflow-hidden">
             <!-- Decorative Blob -->
             <div class="position-absolute top-0 end-0 w-50 h-100 bg-white opacity-10 rounded-circle translate-middle-y translate-middle-x"></div>

             <div class="position-relative z-1 py-4">
                <h2 class="display-4 fw-bold mb-4">Ready to Get Started?</h2>
                <p class="lead text-primary-light mb-5 mx-auto opacity-75" style="max-width: 700px;">
                    Explore our arsenal of high-performance tools and experience the power of modern file processing.
                </p>
                <a href="<?php echo $base_url; ?>/tools" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold text-primary shadow">
                    <i class="fas fa-tools me-2" aria-hidden="true"></i> Browse All Tools
                </a>
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
    box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important;
}
.group-card:hover .bg-primary {
    transform: scale(1.05) rotate(5deg);
    transition: transform 0.3s ease;
}
.text-primary-light {
    color: #e0e7ff;
}
</style>
