<?php
/**
 * About Page View
 * 
 * @package DGLab\Views\Home
 */
?>
<!-- Page Header -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-700 py-16 text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">About <?php echo APP_NAME; ?></h1>
        <p class="fs-5 opacity-90 max-w-xl mx-auto leading-relaxed">
            Learn more about our mission, features, and the technology behind our platform.
        </p>
    </div>
</section>

<!-- About Content -->
<section class="py-16 bg-white">
    <div class="container">
        <div class="row g-10">
            <div class="col-lg-8">
                <div class="about-main">
                    <h2 class="h3 fw-bold text-gray-900 mb-4">Our Mission</h2>
                    <p class="text-gray-600 leading-relaxed mb-8 fs-5">
                        <?php echo APP_NAME; ?> was created with a simple mission: to provide powerful,
                        easy-to-use web tools for file processing and conversion. We believe that
                        everyone should have access to professional-grade tools without needing
                        technical expertise or expensive software.
                    </p>

                    <h2 class="h3 fw-bold text-gray-900 mb-4">What Makes Us Different</h2>
                    <div class="row g-4 mb-8">
                        <div class="col-md-6">
                            <div class="p-4 rounded-2xl bg-gray-50 h-100 border">
                                <div class="text-emerald-500 mb-3 fs-3"><i class="fas fa-shield-alt"></i></div>
                                <h4 class="h5 fw-bold mb-2">Privacy First</h4>
                                <p class="text-sm text-gray-600 mb-0">Your files are processed securely and automatically deleted. We never store your data.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 rounded-2xl bg-gray-50 h-100 border">
                                <div class="text-indigo-500 mb-3 fs-3"><i class="fas fa-mobile-alt"></i></div>
                                <h4 class="h5 fw-bold mb-2">Works Everywhere</h4>
                                <p class="text-sm text-gray-600 mb-0">Our PWA works on any device with a modern browser. No installation required.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 rounded-2xl bg-gray-50 h-100 border">
                                <div class="text-amber-500 mb-3 fs-3"><i class="fas fa-bolt"></i></div>
                                <h4 class="h5 fw-bold mb-2">Fast & Efficient</h4>
                                <p class="text-sm text-gray-600 mb-0">Optimized algorithms and chunked uploads ensure quick processing of large files.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 rounded-2xl bg-gray-50 h-100 border">
                                <div class="text-blue-500 mb-3 fs-3"><i class="fas fa-code"></i></div>
                                <h4 class="h5 fw-bold mb-2">Developer Friendly</h4>
                                <p class="text-sm text-gray-600 mb-0">Complete REST API for integrating our tools into your own applications.</p>
                            </div>
                        </div>
                    </div>

                    <h2 class="h3 fw-bold text-gray-900 mb-4">Technology Stack</h2>
                    <p class="text-gray-600 mb-6">Our platform is built with modern, reliable technologies:</p>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="px-4 py-3 rounded-xl bg-gray-100 d-flex align-items-center gap-2 fw-semibold">
                            <i class="fab fa-php text-indigo-600 fs-5"></i>
                            <span>PHP 8+</span>
                        </div>
                        <div class="px-4 py-3 rounded-xl bg-gray-100 d-flex align-items-center gap-2 fw-semibold">
                            <i class="fas fa-database text-indigo-600 fs-5"></i>
                            <span>MySQL</span>
                        </div>
                        <div class="px-4 py-3 rounded-xl bg-gray-100 d-flex align-items-center gap-2 fw-semibold">
                            <i class="fab fa-bootstrap text-indigo-600 fs-5"></i>
                            <span>Bootstrap 5</span>
                        </div>
                        <div class="px-4 py-3 rounded-xl bg-gray-100 d-flex align-items-center gap-2 fw-semibold">
                            <i class="fas fa-wind text-indigo-600 fs-5"></i>
                            <span>Tailwind CSS</span>
                        </div>
                        <div class="px-4 py-3 rounded-xl bg-gray-100 d-flex align-items-center gap-2 fw-semibold">
                            <i class="fab fa-js text-indigo-600 fs-5"></i>
                            <span>jQuery 4</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div class="bg-white p-6 rounded-3xl border shadow-sm mb-6">
                        <h3 class="h5 fw-bold text-gray-900 mb-4">Platform Stats</h3>
                        <div class="space-y-4">
                            <div class="d-flex flex-column border-bottom pb-3">
                                <span class="display-6 fw-bold text-indigo-600"><?php echo count($tools ?? []); ?></span>
                                <span class="text-sm text-gray-500">Available Tools</span>
                            </div>
                            <div class="d-flex flex-column border-bottom pb-3">
                                <span class="display-6 fw-bold text-indigo-600">100MB</span>
                                <span class="text-sm text-gray-500">Max File Size</span>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="display-6 fw-bold text-indigo-600">24/7</span>
                                <span class="text-sm text-gray-500">Availability</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border shadow-sm">
                        <h3 class="h5 fw-bold text-gray-900 mb-4">Supported Formats</h3>
                        <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                            <li class="d-flex align-items-center gap-3">
                                <div class="bg-indigo-50 text-indigo-600 rounded-lg p-2"><i class="fas fa-book"></i></div>
                                <span class="text-gray-700 fw-medium">EPUB E-books</span>
                            </li>
                            <li class="d-flex align-items-center gap-3">
                                <div class="bg-indigo-50 text-indigo-600 rounded-lg p-2"><i class="fas fa-file-pdf"></i></div>
                                <span class="text-gray-700 fw-medium">PDF Documents</span>
                            </li>
                            <li class="d-flex align-items-center gap-3">
                                <div class="bg-indigo-50 text-indigo-600 rounded-lg p-2"><i class="fas fa-image"></i></div>
                                <span class="text-gray-700 fw-medium">Images</span>
                            </li>
                            <li class="d-flex align-items-center gap-3">
                                <div class="bg-indigo-50 text-indigo-600 rounded-lg p-2"><i class="fas fa-file-alt"></i></div>
                                <span class="text-gray-700 fw-medium">Text Files</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
