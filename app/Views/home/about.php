<?php
/**
 * About Page View
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
                <h1 class="tw-text-7xl tw-font-bold tw-mb-6">Our <span class="tw-text-gradient">Story</span></h1>
                <p class="tw-text-2xl tw-opacity-80 tw-max-w-2xl">
                    Crafting powerful tools with an uncompromising focus on privacy and aesthetic beauty.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="tw-py-32 tw-bg-white">
    <div class="container">
        <div class="lg:tw-broken-grid tw-gap-24">
            <div class="tw-col-span-12 lg:tw-col-span-7">
                <div class="tw-prose tw-prose-lg tw-max-w-none">
                    <h2 class="tw-text-4xl tw-font-bold tw-mb-8">Our Mission</h2>
                    <p class="tw-text-xl tw-text-slate-600 tw-leading-relaxed tw-mb-12">
                        <?php echo APP_NAME; ?> was created with a simple mission: to provide powerful,
                        easy-to-use web tools for file processing and conversion. We believe that
                        everyone should have access to professional-grade tools without needing
                        technical expertise or expensive software.
                    </p>

                    <h2 class="tw-text-4xl tw-font-bold tw-mb-8">What Makes Us Different</h2>
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-8 tw-mb-16">
                        <div class="tw-p-8 tw-bg-slate-50 tw-rounded-3xl">
                            <i class="fas fa-shield-alt tw-text-2xl tw-text-indigo-600 tw-mb-6"></i>
                            <h3 class="tw-text-xl tw-font-bold tw-mb-4">Privacy First</h3>
                            <p class="tw-text-slate-500">Your files are processed securely and automatically deleted after processing. We never store your data.</p>
                        </div>
                        <div class="tw-p-8 tw-bg-slate-50 tw-rounded-3xl">
                            <i class="fas fa-globe tw-text-2xl tw-text-indigo-600 tw-mb-6"></i>
                            <h3 class="tw-text-xl tw-font-bold tw-mb-4">Works Everywhere</h3>
                            <p class="tw-text-slate-500">Our Progressive Web App works on any device with a modern web browser. No installation required.</p>
                        </div>
                        <div class="tw-p-8 tw-bg-slate-50 tw-rounded-3xl">
                            <i class="fas fa-bolt tw-text-2xl tw-text-indigo-600 tw-mb-6"></i>
                            <h3 class="tw-text-xl tw-font-bold tw-mb-4">Fast & Efficient</h3>
                            <p class="tw-text-slate-500">Optimized algorithms and chunked uploads ensure quick processing of even large files.</p>
                        </div>
                        <div class="tw-p-8 tw-bg-slate-50 tw-rounded-3xl">
                            <i class="fas fa-code tw-text-2xl tw-text-indigo-600 tw-mb-6"></i>
                            <h3 class="tw-text-xl tw-font-bold tw-mb-4">Developer Friendly</h3>
                            <p class="tw-text-slate-500">Complete REST API for integrating our tools into your own applications.</p>
                        </div>
                    </div>

                    <h2 class="tw-text-4xl tw-font-bold tw-mb-8">Technology Stack</h2>
                    <div class="tw-flex tw-flex-wrap tw-gap-4">
                        <span class="tw-px-6 tw-py-3 tw-bg-indigo-50 tw-text-indigo-600 tw-rounded-full tw-font-bold">PHP 8.3</span>
                        <span class="tw-px-6 tw-py-3 tw-bg-indigo-50 tw-text-indigo-600 tw-rounded-full tw-font-bold">Tailwind CSS</span>
                        <span class="tw-px-6 tw-py-3 tw-bg-indigo-50 tw-text-indigo-600 tw-rounded-full tw-font-bold">PWA</span>
                        <span class="tw-px-6 tw-py-3 tw-bg-indigo-50 tw-text-indigo-600 tw-rounded-full tw-font-bold">Service Workers</span>
                    </div>
                </div>
            </div>
            
            <div class="tw-col-span-12 lg:tw-col-span-5">
                <div class="tw-sticky tw-top-32">
                    <div class="tw-p-12 tw-bg-indigo-600 tw-rounded-[3rem] tw-text-white tw-shadow-2xl tw-mb-8">
                        <h3 class="tw-text-2xl tw-font-bold tw-mb-8">Platform Stats</h3>
                        <div class="tw-space-y-8">
                            <div>
                                <span class="tw-block tw-text-5xl tw-font-bold"><?php echo count($tools ?? []); ?></span>
                                <span class="tw-text-indigo-100 tw-uppercase tw-tracking-widest tw-text-xs">Available Tools</span>
                            </div>
                            <div>
                                <span class="tw-block tw-text-5xl tw-font-bold">100MB</span>
                                <span class="tw-text-indigo-100 tw-uppercase tw-tracking-widest tw-text-xs">Max File Size</span>
                            </div>
                            <div>
                                <span class="tw-block tw-text-5xl tw-font-bold">24/7</span>
                                <span class="tw-text-indigo-100 tw-uppercase tw-tracking-widest tw-text-xs">Uptime Guarantee</span>
                            </div>
                        </div>
                    </div>

                    <div class="tw-p-12 tw-bg-slate-900 tw-rounded-[3rem] tw-text-white tw-shadow-2xl">
                        <h3 class="tw-text-2xl tw-font-bold tw-mb-6">Ready to start?</h3>
                        <p class="tw-text-slate-400 tw-mb-8">Experience the future of file processing today.</p>
                        <a href="<?php echo $base_url; ?>/tools" class="btn btn-primary tw-bg-white tw-text-indigo-600 tw-w-full tw-py-4 tw-rounded-2xl tw-font-bold">
                            Explore Tools
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
