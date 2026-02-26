<?php
/**
 * Documentation Page View - Bootstrap 5 Overhaul
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
                <h1 class="display-1 fw-bold mb-4">Documentation</h1>
                <p class="lead opacity-75 fs-3 mb-0" style="max-width: 700px;">
                    Everything you need to know about using and extending DGLab PWA.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3">
                <div class="sticky-top" style="top: 6rem; z-index: 10;">
                    <nav id="docs-nav" class="nav flex-column gap-2 p-3 bg-light rounded-4 border shadow-sm">
                        <span class="fw-bold text-uppercase tracking-widest small text-muted px-3 mb-2">Getting Started</span>
                        <a class="nav-link py-2 px-3 rounded-3 text-dark transition-hover active" href="#introduction">Introduction</a>
                        <a class="nav-link py-2 px-3 rounded-3 text-muted transition-hover" href="#installation">Installation</a>
                        <a class="nav-link py-2 px-3 rounded-3 text-muted transition-hover" href="#configuration">Configuration</a>

                        <span class="fw-bold text-uppercase tracking-widest small text-muted px-3 mt-4 mb-2">Features</span>
                        <a class="nav-link py-2 px-3 rounded-3 text-muted transition-hover" href="#pwa">PWA Features</a>
                        <a class="nav-link py-2 px-3 rounded-3 text-muted transition-hover" href="#offline">Offline Support</a>
                        <a class="nav-link py-2 px-3 rounded-3 text-muted transition-hover" href="#upload">File Uploads</a>

                        <span class="fw-bold text-uppercase tracking-widest small text-muted px-3 mt-4 mb-2">For Developers</span>
                        <a class="nav-link py-2 px-3 rounded-3 text-muted transition-hover" href="#api">API Reference</a>
                        <a class="nav-link py-2 px-3 rounded-3 text-muted transition-hover" href="#tools">Creating Tools</a>
                    </nav>
                </div>
            </div>

            <!-- Documentation Content -->
            <div class="col-lg-9">
                <div class="pe-lg-5">
                    <article id="introduction" class="mb-5 py-3">
                        <h2 class="display-5 fw-bold mb-4">Introduction</h2>
                        <p class="lead text-muted mb-4 lh-base">
                            DGLab PWA is a modern, extensible web application platform built on PHP 8+.
                            It is designed to be a central hub for powerful, privacy-first web tools.
                        </p>
                        <div class="alert alert-info border-0 rounded-4 p-4 shadow-sm mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle fs-3 me-3" aria-hidden="true"></i>
                                <div>
                                    <h4 class="alert-heading fw-bold mb-1">PWA First Design</h4>
                                    <p class="mb-0 small opacity-80">Built from the ground up to support modern Progressive Web App features like offline access and push notifications.</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article id="installation" class="mb-5 py-3 border-top pt-5">
                        <h2 class="display-6 fw-bold mb-4">Installation</h2>
                        <p class="text-muted mb-4 lh-base">To install DGLab PWA on your own server, follow these simple steps:</p>
                        <div class="card border-0 bg-dark text-white rounded-4 p-4 shadow mb-4">
                            <pre class="mb-0"><code class="text-info">git clone https://github.com/DGCodeIdeas/DGLabPWA.git
cd DGLabPWA
cp config/config.example.php config/config.php</code></pre>
                        </div>
                        <p class="text-muted mb-4">Ensure your <code>storage/</code> directory is writable by the web server.</p>
                    </article>

                    <article id="configuration" class="mb-5 py-3 border-top pt-5">
                        <h2 class="display-6 fw-bold mb-4">Configuration</h2>
                        <p class="text-muted mb-4">Most settings can be found in <code>config/config.php</code>. This includes database credentials, application name, and tool-specific settings.</p>
                    </article>

                    <article id="api" class="mb-5 py-3 border-top pt-5">
                        <h2 class="display-6 fw-bold mb-4">API Reference</h2>
                        <p class="text-muted mb-4">DGLab PWA provides a robust REST API for integrating our tools into your own projects.</p>
                        <table class="table table-hover border-top">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4 py-3">Endpoint</th>
                                    <th class="px-4 py-3">Method</th>
                                    <th class="px-4 py-3">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-3 text-primary fw-bold"><code>/api/v1/tools</code></td>
                                    <td class="px-4 py-3"><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold">GET</span></td>
                                    <td class="px-4 py-3 text-muted small">List all available tools and their metadata.</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-primary fw-bold"><code>/api/v1/status</code></td>
                                    <td class="px-4 py-3"><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold">GET</span></td>
                                    <td class="px-4 py-3 text-muted small">Check the health and status of the system.</td>
                                </tr>
                            </tbody>
                        </table>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
#docs-nav .nav-link:hover {
    background-color: rgba(79, 70, 229, 0.05);
    color: #4f46e5 !important;
}
#docs-nav .nav-link.active {
    background-color: #4f46e5;
    color: white !important;
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
}
</style>
