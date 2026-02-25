<?php
/**
 * Home Page View
 * 
 * @package DGLab\Views\Home
 */
?>
<!-- Hero Section -->
<section class="bg-gray-50 py-20 lg:py-32 overflow-hidden border-bottom">
    <div class="container position-relative">
        <div class="row align-items-center gy-12">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4 tracking-tight text-gray-900">
                        Powerful Web Tools for
                        <span class="text-gradient d-block">File Processing</span>
                    </h1>
                    <p class="fs-5 text-gray-600 mb-5 max-w-lg leading-relaxed">
                        Transform, convert, and optimize your files with our collection of
                        browser-based tools. No installation required - works on any device.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="<?php echo $base_url; ?>/tools" class="btn btn-primary btn-lg px-8 rounded-pill btn-gradient border-0 d-flex align-items-center gap-2">
                            <i class="fas fa-rocket"></i>
                            <span>Get Started</span>
                        </a>
                        <a href="<?php echo $base_url; ?>/docs" class="btn btn-outline-secondary btn-lg px-8 rounded-pill d-flex align-items-center gap-2">
                            <i class="fas fa-book"></i>
                            <span>Documentation</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- Hero Visual -->
                <div class="hero-visual d-flex justify-content-center">
                    <div class="position-relative" style="width: 340px; height: 340px;">
                        <!-- Animated Cards using Tailwind utilities -->
                        <div class="position-absolute top-0 start-50 translate-middle-x bg-white p-4 rounded-2xl shadow-xl d-flex flex-column align-items-center justify-content-center gap-2 transition-transform hover:-translate-y-2" style="width: 140px; height: 140px; z-index: 3;">
                            <i class="fas fa-file-alt fs-2 text-indigo-600"></i>
                            <span class="fw-bold text-gray-700">EPUB</span>
                        </div>
                        <div class="position-absolute bottom-20 start-0 bg-white p-4 rounded-2xl shadow-xl d-flex flex-column align-items-center justify-content-center gap-2 transition-transform hover:-translate-y-2" style="width: 140px; height: 140px; z-index: 2;">
                            <i class="fas fa-font fs-2 text-purple-600"></i>
                            <span class="fw-bold text-gray-700">Fonts</span>
                        </div>
                        <div class="position-absolute bottom-20 end-0 bg-white p-4 rounded-2xl shadow-xl d-flex flex-column align-items-center justify-content-center gap-2 transition-transform hover:-translate-y-2" style="width: 140px; height: 140px; z-index: 1;">
                            <i class="fas fa-magic fs-2 text-indigo-500"></i>
                            <span class="fw-bold text-gray-700">Convert</span>
                        </div>

                        <!-- Decorative background element -->
                        <div class="position-absolute top-50 start-50 translate-middle bg-indigo-100 rounded-circle opacity-50 blur-3xl" style="width: 300px; height: 300px; z-index: 0;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 lg:py-32 bg-white">
    <div class="container">
        <div class="text-center mb-16">
            <h2 class="display-6 fw-bold text-gray-900 mb-3">Why Choose <?php echo APP_NAME; ?>?</h2>
            <div class="bg-indigo-600 h-1 w-20 mx-auto rounded-pill"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="h-100 p-5 rounded-3xl bg-gray-50 border transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="bg-indigo-600 text-white rounded-2xl p-3 d-inline-flex mb-4">
                        <i class="fas fa-bolt fs-4"></i>
                    </div>
                    <h3 class="h4 fw-bold mb-3">Fast Processing</h3>
                    <p class="text-gray-600 mb-0 leading-relaxed">
                        Optimized algorithms and chunked uploads ensure your files are
                        processed quickly and efficiently.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="h-100 p-5 rounded-3xl bg-gray-50 border transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="bg-indigo-600 text-white rounded-2xl p-3 d-inline-flex mb-4">
                        <i class="fas fa-shield-alt fs-4"></i>
                    </div>
                    <h3 class="h4 fw-bold mb-3">Privacy First</h3>
                    <p class="text-gray-600 mb-0 leading-relaxed">
                        Your files are processed securely and automatically deleted after
                        processing. We never store your data.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="h-100 p-5 rounded-3xl bg-gray-50 border transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="bg-indigo-600 text-white rounded-2xl p-3 d-inline-flex mb-4">
                        <i class="fas fa-mobile-alt fs-4"></i>
                    </div>
                    <h3 class="h4 fw-bold mb-3">Works Everywhere</h3>
                    <p class="text-gray-600 mb-0 leading-relaxed">
                        Progressive Web App works on desktop, tablet, and mobile devices.
                        Install for offline access.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="h-100 p-5 rounded-3xl bg-gray-50 border transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="bg-indigo-600 text-white rounded-2xl p-3 d-inline-flex mb-4">
                        <i class="fas fa-code fs-4"></i>
                    </div>
                    <h3 class="h4 fw-bold mb-3">Developer Friendly</h3>
                    <p class="text-gray-600 mb-0 leading-relaxed">
                        RESTful API for integrating tools into your own applications.
                        Comprehensive documentation included.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tools Section -->
<section class="py-20 lg:py-32 bg-gray-50">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-12 gap-4">
            <div>
                <h2 class="h2 fw-bold text-gray-900 mb-2">Available Tools</h2>
                <p class="text-gray-600 mb-0">Discover our powerful file processing tools.</p>
            </div>
            <a href="<?php echo $base_url; ?>/tools" class="btn btn-outline-primary px-4 rounded-pill d-inline-flex align-items-center gap-2 transition-all">
                <span>View All Tools</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="row g-6">
            <?php foreach ($featured as $id => $tool): ?>
                <div class="col-lg-4 col-md-6">
                    <a href="<?php echo $base_url; ?>/tool/<?php echo $id; ?>" class="d-block text-decoration-none h-100">
                        <div class="bg-white p-6 rounded-3xl border shadow-sm transition-all hover:shadow-md hover:-translate-y-1 h-100">
                            <div class="bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-2xl p-3 d-inline-flex mb-4">
                                <i class="fas <?php echo $tool->getIcon(); ?> fs-4"></i>
                            </div>
                            <h3 class="h5 fw-bold text-gray-900 mb-3"><?php echo htmlspecialchars($tool->getName()); ?></h3>
                            <p class="text-gray-600 mb-4 fs-6 leading-relaxed">
                                <?php echo htmlspecialchars($tool->getDescription()); ?>
                            </p>
                            <span class="badge bg-indigo-50 text-indigo-600 px-3 py-2 rounded-pill fw-medium">
                                <?php echo htmlspecialchars($tool->getCategory()); ?>
                            </span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-700 text-white">
    <div class="container">
        <div class="text-center">
            <h2 class="display-5 fw-bold mb-4">Ready to Get Started?</h2>
            <p class="fs-5 opacity-90 mb-5 mx-auto max-w-xl">
                Explore our collection of tools and start processing your files today.
                Fast, secure, and completely free.
            </p>
            <a href="<?php echo $base_url; ?>/tools" class="btn btn-light btn-lg px-10 rounded-pill fw-bold text-indigo-600 shadow-xl transition-all hover:scale-105 border-0">
                <i class="fas fa-tools me-2"></i>
                Browse All Tools
            </a>
        </div>
    </div>
</section>
