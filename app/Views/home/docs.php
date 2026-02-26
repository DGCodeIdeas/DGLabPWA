<?php
/**
 * Documentation Page View
 * 
 * @package DGLab\Views\Home
 */
?>
<!-- Page Header -->
<section class="tw-pt-48 tw-pb-32 tw-bg-slate-900 tw-text-white tw-relative tw-overflow-hidden">
    <div class="tw-bg-blur-blob" style="top: -20%; right: -10%; background: radial-gradient(circle, rgba(79, 70, 229, 0.2) 0%, transparent 70%);"></div>
    <div class="container tw-relative tw-z-10">
        <div class="lg:tw-broken-grid">
            <div class="tw-col-span-12 lg:tw-col-span-8">
                <h1 class="tw-text-7xl tw-font-bold tw-mb-6">Knowledge <span class="tw-text-gradient">Base</span></h1>
                <p class="tw-text-2xl tw-opacity-80 tw-max-w-2xl">
                    Master the tools of the digital trade with our comprehensive documentation and API reference.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Documentation Content -->
<section class="tw-py-32 tw-bg-white">
    <div class="container">
        <div class="lg:tw-broken-grid tw-gap-24">
            <!-- Sidebar Navigation -->
            <aside class="tw-col-span-12 lg:tw-col-span-3">
                <nav class="tw-sticky tw-top-32 tw-space-y-12">
                    <div>
                        <h3 class="tw-text-xs tw-font-bold tw-text-slate-400 tw-uppercase tw-tracking-widest tw-mb-6">Getting Started</h3>
                        <ul class="tw-space-y-3">
                            <li><a href="#introduction" class="tw-text-slate-600 hover:tw-text-indigo-600 tw-transition-colors">Introduction</a></li>
                            <li><a href="#quickstart" class="tw-text-slate-600 hover:tw-text-indigo-600 tw-transition-colors">Quick Start</a></li>
                            <li><a href="#installation" class="tw-text-slate-600 hover:tw-text-indigo-600 tw-transition-colors">Installation</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="tw-text-xs tw-font-bold tw-text-slate-400 tw-uppercase tw-tracking-widest tw-mb-6">API Reference</h3>
                        <ul class="tw-space-y-3">
                            <li><a href="#api-overview" class="tw-text-slate-600 hover:tw-text-indigo-600 tw-transition-colors">API Overview</a></li>
                            <li><a href="#endpoints" class="tw-text-slate-600 hover:tw-text-indigo-600 tw-transition-colors">Endpoints</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="tw-text-xs tw-font-bold tw-text-slate-400 tw-uppercase tw-tracking-widest tw-mb-6">Development</h3>
                        <ul class="tw-space-y-3">
                            <li><a href="#creating-tools" class="tw-text-slate-600 hover:tw-text-indigo-600 tw-transition-colors">Creating Tools</a></li>
                        </ul>
                    </div>
                </nav>
            </aside>
            
            <!-- Main Content -->
            <main class="tw-col-span-12 lg:tw-col-span-9">
                <article id="introduction" class="tw-mb-32">
                    <h2 class="tw-text-5xl tw-font-bold tw-mb-8">Introduction</h2>
                    <p class="tw-text-xl tw-text-slate-600 tw-leading-relaxed">
                        <?php echo APP_NAME; ?> is a web-based platform for file processing and conversion. 
                        It provides a collection of tools that work directly in your browser, 
                        with no software installation required.
                    </p>
                    <p class="tw-text-xl tw-text-slate-600 tw-leading-relaxed tw-mt-6">
                        Our platform is built as a Progressive Web App (PWA), which means you can 
                        install it on your device and use it offline. It works on desktop computers, 
                        tablets, and mobile devices.
                    </p>
                </article>
                
                <article id="quickstart" class="tw-mb-32">
                    <h2 class="tw-text-5xl tw-font-bold tw-mb-12">Quick Start</h2>
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-8">
                        <div class="tw-p-10 tw-bg-slate-50 tw-rounded-[2.5rem]">
                            <span class="tw-inline-flex tw-w-10 tw-h-10 tw-bg-indigo-600 tw-text-white tw-rounded-full tw-items-center tw-justify-center tw-font-bold tw-mb-6">1</span>
                            <h3 class="tw-text-xl tw-font-bold tw-mb-4">Choose a Tool</h3>
                            <p class="tw-text-slate-500">Browse our <a href="/tools" class="tw-text-indigo-600">tools collection</a> and select the one you need.</p>
                        </div>
                        <div class="tw-p-10 tw-bg-slate-50 tw-rounded-[2.5rem]">
                            <span class="tw-inline-flex tw-w-10 tw-h-10 tw-bg-indigo-600 tw-text-white tw-rounded-full tw-items-center tw-justify-center tw-font-bold tw-mb-6">2</span>
                            <h3 class="tw-text-xl tw-font-bold tw-mb-4">Upload File</h3>
                            <p class="tw-text-slate-500">Click the upload area or drag and drop your file. We support files up to 100MB.</p>
                        </div>
                    </div>
                </article>
                
                <article id="installation" class="tw-mb-32">
                    <h2 class="tw-text-5xl tw-font-bold tw-mb-8">Installation</h2>
                    <p class="tw-text-xl tw-text-slate-600 tw-mb-12">
                        To install <?php echo APP_NAME; ?> as a Progressive Web App:
                    </p>
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-6">
                        <div class="tw-p-8 tw-bg-slate-900 tw-text-white tw-rounded-3xl">
                            <i class="fab fa-chrome tw-text-2xl tw-mb-6"></i>
                            <h4 class="tw-font-bold tw-mb-2">Chrome / Edge</h4>
                            <p class="tw-text-slate-400 tw-text-sm">Click the install icon (➕) in the address bar.</p>
                        </div>
                        <div class="tw-p-8 tw-bg-slate-900 tw-text-white tw-rounded-3xl">
                            <i class="fab fa-safari tw-text-2xl tw-mb-6"></i>
                            <h4 class="tw-font-bold tw-mb-2">Safari (iOS)</h4>
                            <p class="tw-text-slate-400 tw-text-sm">Tap Share → "Add to Home Screen".</p>
                        </div>
                    </div>
                </article>
                
                <article id="api-overview" class="tw-mb-32">
                    <h2 class="tw-text-5xl tw-font-bold tw-mb-8">API Overview</h2>
                    <div class="tw-p-12 tw-bg-slate-50 tw-rounded-[3rem]">
                        <p class="tw-text-lg tw-text-slate-600 tw-mb-8">
                            Our REST API allows you to integrate our tools into your own applications.
                            All API endpoints return JSON responses.
                        </p>

                        <h3 class="tw-text-xl tw-font-bold tw-mb-4">Base URL</h3>
                        <code class="tw-block tw-p-6 tw-bg-slate-900 tw-text-indigo-400 tw-rounded-2xl tw-font-mono tw-text-sm tw-mb-8">
                            <?php echo $base_url; ?>/api/v1
                        </code>

                        <h3 class="tw-text-xl tw-font-bold tw-mb-4">Response Format</h3>
                        <pre class="tw-block tw-p-8 tw-bg-slate-900 tw-text-slate-300 tw-rounded-2xl tw-font-mono tw-text-sm"><code>{
  "success": true,
  "data": { ... },
  "message": "Optional message"
}</code></pre>
                    </div>
                </article>

                <article id="endpoints" class="tw-mb-32">
                    <h2 class="tw-text-5xl tw-font-bold tw-mb-8">Endpoints</h2>
                    <div class="tw-space-y-6">
                        <div class="tw-p-8 tw-bg-slate-50 tw-rounded-[2.5rem]">
                            <div class="tw-flex tw-items-center tw-gap-4 tw-mb-4">
                                <span class="tw-px-3 tw-py-1 tw-bg-green-500 tw-text-white tw-text-xs tw-font-bold tw-rounded tw-uppercase">GET</span>
                                <h4 class="tw-text-xl tw-font-bold">/status</h4>
                            </div>
                            <p class="tw-text-slate-500">Get platform status and information.</p>
                        </div>

                        <div class="tw-p-8 tw-bg-slate-50 tw-rounded-[2.5rem]">
                            <div class="tw-flex tw-items-center tw-gap-4 tw-mb-4">
                                <span class="tw-px-3 tw-py-1 tw-bg-green-500 tw-text-white tw-text-xs tw-font-bold tw-rounded tw-uppercase">GET</span>
                                <h4 class="tw-text-xl tw-font-bold">/tools</h4>
                            </div>
                            <p class="tw-text-slate-500">List all available tools.</p>
                        </div>

                        <div class="tw-p-8 tw-bg-slate-50 tw-rounded-[2.5rem]">
                            <div class="tw-flex tw-items-center tw-gap-4 tw-mb-4">
                                <span class="tw-px-3 tw-py-1 tw-bg-indigo-600 tw-text-white tw-text-xs tw-font-bold tw-rounded tw-uppercase">POST</span>
                                <h4 class="tw-text-xl tw-font-bold">/process/{toolId}</h4>
                            </div>
                            <p class="tw-text-slate-500">Process a file with the specified tool.</p>
                        </div>
                    </div>
                </article>

                <article id="creating-tools" class="tw-mb-32">
                    <h2 class="tw-text-5xl tw-font-bold tw-mb-8">Creating Tools</h2>
                    <p class="tw-text-xl tw-text-slate-600 tw-mb-10">
                        You can extend <?php echo APP_NAME; ?> by creating custom tools. Tools must implement 
                        the <code>ToolInterface</code> and follow our conventions.
                    </p>
                    
                    <div class="tw-p-10 tw-bg-slate-900 tw-rounded-[3rem]">
                        <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-6">Basic Tool Structure</h3>
                        <pre class="tw-text-slate-300 tw-font-mono tw-text-sm tw-overflow-x-auto"><code>namespace DGLab\Tools\MyTool;

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
}</code></pre>
                    </div>
                </article>
            </main>
        </div>
    </div>
</section>
