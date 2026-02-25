<?php
/**
 * Documentation Page View
 * 
 * @package DGLab\Views\Home
 */
?>
<!-- Page Header -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-700 py-16 text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Documentation</h1>
        <p class="fs-5 opacity-90 max-w-xl mx-auto leading-relaxed">
            Learn how to use our platform and integrate with our API.
        </p>
    </div>
</section>

<!-- Documentation Content -->
<section class="py-16 bg-white">
    <div class="container">
        <div class="row g-10">
            <!-- Sidebar Navigation -->
            <aside class="col-lg-3">
                <nav class="sticky-top" style="top: 100px;">
                    <div class="mb-6">
                        <h3 class="text-xs fw-bold text-gray-400 text-uppercase tracking-wider mb-3">Getting Started</h3>
                        <ul class="nav flex-column gap-1">
                            <li class="nav-item"><a href="#introduction" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Introduction</a></li>
                            <li class="nav-item"><a href="#quickstart" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Quick Start</a></li>
                            <li class="nav-item"><a href="#installation" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Installation</a></li>
                        </ul>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-xs fw-bold text-gray-400 text-uppercase tracking-wider mb-3">Using Tools</h3>
                        <ul class="nav flex-column gap-1">
                            <li class="nav-item"><a href="#uploading" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Uploading Files</a></li>
                            <li class="nav-item"><a href="#processing" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Processing Files</a></li>
                            <li class="nav-item"><a href="#downloading" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Downloading Results</a></li>
                        </ul>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-xs fw-bold text-gray-400 text-uppercase tracking-wider mb-3">API Reference</h3>
                        <ul class="nav flex-column gap-1">
                            <li class="nav-item"><a href="#api-overview" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">API Overview</a></li>
                            <li class="nav-item"><a href="#authentication" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Authentication</a></li>
                            <li class="nav-item"><a href="#endpoints" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Endpoints</a></li>
                        </ul>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-xs fw-bold text-gray-400 text-uppercase tracking-wider mb-3">Development</h3>
                        <ul class="nav flex-column gap-1">
                            <li class="nav-item"><a href="#architecture" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Architecture</a></li>
                            <li class="nav-item"><a href="#creating-tools" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Creating Tools</a></li>
                            <li class="nav-item"><a href="#contributing" class="nav-link px-0 text-gray-600 hover:text-indigo-600 transition-colors">Contributing</a></li>
                        </ul>
                    </div>
                </nav>
            </aside>
            
            <!-- Main Content -->
            <main class="col-lg-9">
                <article id="introduction" class="mb-16">
                    <h2 class="h2 fw-bold text-gray-900 mb-4">Introduction</h2>
                    <p class="text-gray-600 fs-5 leading-relaxed mb-4">
                        <?php echo APP_NAME; ?> is a web-based platform for file processing and conversion. 
                        It provides a collection of tools that work directly in your browser, 
                        with no software installation required.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Our platform is built as a Progressive Web App (PWA), which means you can 
                        install it on your device and use it offline. It works on desktop computers, 
                        tablets, and mobile devices.
                    </p>
                </article>
                
                <article id="quickstart" class="mb-16">
                    <h2 class="h2 fw-bold text-gray-900 mb-6">Quick Start</h2>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex gap-3 p-4 rounded-2xl bg-gray-50 border h-100">
                                <div class="bg-indigo-600 text-white rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">1</div>
                                <div>
                                    <h4 class="h5 fw-bold mb-2">Choose a Tool</h4>
                                    <p class="text-sm text-gray-600 mb-0">Browse our <a href="/tools" class="text-indigo-600 fw-medium">tools collection</a> and select the one you need.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3 p-4 rounded-2xl bg-gray-50 border h-100">
                                <div class="bg-indigo-600 text-white rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">2</div>
                                <div>
                                    <h4 class="h5 fw-bold mb-2">Upload Your File</h4>
                                    <p class="text-sm text-gray-600 mb-0">Click the upload area or drag and drop your file. We support files up to 100MB.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3 p-4 rounded-2xl bg-gray-50 border h-100">
                                <div class="bg-indigo-600 text-white rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">3</div>
                                <div>
                                    <h4 class="h5 fw-bold mb-2">Configure Options</h4>
                                    <p class="text-sm text-gray-600 mb-0">Select your desired settings and options for the processing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3 p-4 rounded-2xl bg-gray-50 border h-100">
                                <div class="bg-indigo-600 text-white rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">4</div>
                                <div>
                                    <h4 class="h5 fw-bold mb-2">Process & Download</h4>
                                    <p class="text-sm text-gray-600 mb-0">Click "Process File" and download your result when complete.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                
                <article id="installation" class="mb-16">
                    <h2 class="h2 fw-bold text-gray-900 mb-4">Installation</h2>
                    <p class="text-gray-600 mb-6">
                        To install <?php echo APP_NAME; ?> as a Progressive Web App:
                    </p>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="p-5 rounded-3xl bg-gray-50 border h-100 text-center">
                                <i class="fab fa-chrome fs-1 text-blue-500 mb-4"></i>
                                <h4 class="h5 fw-bold mb-3">Chrome / Edge</h4>
                                <p class="text-sm text-gray-600 mb-0">Click the install icon (➕) in the address bar, then click "Install".</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-5 rounded-3xl bg-gray-50 border h-100 text-center">
                                <i class="fab fa-safari fs-1 text-blue-400 mb-4"></i>
                                <h4 class="h5 fw-bold mb-3">Safari (iOS)</h4>
                                <p class="text-sm text-gray-600 mb-0">Tap Share → "Add to Home Screen" → "Add".</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-5 rounded-3xl bg-gray-50 border h-100 text-center">
                                <i class="fab fa-firefox fs-1 text-orange-500 mb-4"></i>
                                <h4 class="h5 fw-bold mb-3">Firefox</h4>
                                <p class="text-sm text-gray-600 mb-0">Click the menu (☰) → "Install".</p>
                            </div>
                        </div>
                    </div>
                </article>
                
                <article id="api-overview" class="mb-16">
                    <h2 class="h2 fw-bold text-gray-900 mb-4">API Overview</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Our REST API allows you to integrate our tools into your own applications. 
                        All API endpoints return JSON responses.
                    </p>
                    
                    <h3 class="h5 fw-bold text-gray-700 mb-3">Base URL</h3>
                    <div class="p-4 bg-gray-900 rounded-2xl mb-8">
                        <code class="text-emerald-400"><?php echo $base_url; ?>/api/v1</code>
                    </div>
                    
                    <h3 class="h5 fw-bold text-gray-700 mb-3">Response Format</h3>
                    <div class="p-4 bg-gray-900 rounded-2xl overflow-hidden">
                        <pre class="mb-0 text-gray-100"><code>{
  "success": true,
  "data": { ... },
  "message": "Optional message"
}</code></pre>
                    </div>
                </article>
                
                <article id="endpoints" class="mb-16">
                    <h2 class="h2 fw-bold text-gray-900 mb-6">API Endpoints</h2>
                    
                    <div class="space-y-4">
                        <div class="p-5 rounded-3xl bg-gray-50 border mb-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="badge bg-emerald-600 px-3 py-2 rounded-lg">GET</span>
                                <code class="fw-bold text-gray-900">/status</code>
                            </div>
                            <p class="text-gray-600 mb-0">Get platform status and information.</p>
                        </div>

                        <div class="p-5 rounded-3xl bg-gray-50 border mb-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="badge bg-emerald-600 px-3 py-2 rounded-lg">GET</span>
                                <code class="fw-bold text-gray-900">/tools</code>
                            </div>
                            <p class="text-gray-600 mb-0">List all available tools.</p>
                        </div>

                        <div class="p-5 rounded-3xl bg-gray-50 border mb-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="badge bg-emerald-600 px-3 py-2 rounded-lg">GET</span>
                                <code class="fw-bold text-gray-900">/tools/{id}</code>
                            </div>
                            <p class="text-gray-600 mb-0">Get detailed information about a specific tool.</p>
                        </div>

                        <div class="p-5 rounded-3xl bg-gray-50 border mb-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="badge bg-indigo-600 px-3 py-2 rounded-lg">POST</span>
                                <code class="fw-bold text-gray-900">/process/{toolId}</code>
                            </div>
                            <p class="text-gray-600 mb-3">Process a file with the specified tool.</p>
                            <p class="text-sm fw-bold text-gray-700 mb-2">Parameters:</p>
                            <ul class="text-sm text-gray-600 mb-0">
                                <li><code>file</code> - The file to process (required)</li>
                                <li>Tool-specific options (optional)</li>
                            </ul>
                        </div>
                    </div>
                </article>
                
                <article id="creating-tools" class="mb-16">
                    <h2 class="h2 fw-bold text-gray-900 mb-4">Creating Custom Tools</h2>
                    <p class="text-gray-600 mb-6">
                        You can extend <?php echo APP_NAME; ?> by creating custom tools. Tools must implement 
                        the <code>ToolInterface</code> and follow our conventions.
                    </p>
                    
                    <h3 class="h5 fw-bold text-gray-700 mb-3">Basic Tool Structure</h3>
                    <div class="p-4 bg-gray-900 rounded-2xl overflow-hidden mb-6">
                        <pre class="mb-0 text-gray-100"><code>namespace DGLab\Tools\MyTool;

use DGLab\Tools\Interfaces\ToolInterface;

class MyTool implements ToolInterface
{
    public function getId(): string
    {
        return 'my-tool';
    }
    
    public function process(string $inputPath, array $options = []): array
    {
        // Your processing logic
        return [
            'success' => true,
            'output_path' => $outputPath
        ];
    }
    
    // ... other required methods
}</code></pre>
                    </div>
                    
                    <p class="text-gray-600 mb-0">
                        See the <a href="/docs/development" class="text-indigo-600 fw-medium">Development Guide</a> for complete documentation
                        on creating custom tools.
                    </p>
                </article>
            </main>
        </div>
    </div>
</section>
