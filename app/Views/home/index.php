<?php
/**
 * Home Page View - Redesigned for Asymmetrical Beauty
 * 
 * @package DGLab\Views\Home
 */
?>
<!-- Hero Section -->
<section class="tw-relative tw-pt-48 tw-pb-64 tw-overflow-hidden tw-bg-slate-50">
    <!-- Animated Blobs -->
    <div class="tw-absolute tw-top-[-10%] tw-right-[-5%] tw-w-[800px] tw-h-[800px] tw-rounded-full tw-bg-indigo-100/50 tw-blur-[120px] tw-animate-pulse"></div>
    <div class="tw-absolute tw-bottom-[-10%] tw-left-[-5%] tw-w-[600px] tw-h-[600px] tw-rounded-full tw-bg-purple-100/50 tw-blur-[100px]"></div>

    <div class="container tw-relative tw-z-10">
        <div class="lg:tw-broken-grid tw-items-center">
            <div class="tw-col-span-12 lg:tw-col-span-7">
                <h1 class="tw-text-8xl tw-font-bold tw-leading-tight tw-mb-8 tw-tracking-tighter">
                    Powerful Web Tools for
                    <span class="tw-text-gradient">File Processing</span>
                </h1>
                <p class="tw-text-2xl tw-text-slate-600 tw-max-w-xl tw-mb-12 tw-leading-relaxed">
                    Transform, convert, and optimize your files with our collection of
                    high-performance, privacy-first tools.
                </p>
                <div class="tw-flex tw-flex-wrap tw-gap-6">
                    <a href="<?php echo $base_url; ?>/tools" class="btn btn-primary tw-px-10 tw-py-5 tw-rounded-2xl tw-text-lg tw-font-bold tw-shadow-2xl hover:tw-scale-105 tw-transition-transform">
                        <i class="fas fa-rocket tw-mr-2"></i>
                        Get Started
                    </a>
                    <a href="<?php echo $base_url; ?>/docs" class="btn btn-outline tw-px-10 tw-py-5 tw-rounded-2xl tw-text-lg tw-font-bold hover:tw-bg-white">
                        <i class="fas fa-book tw-mr-2"></i>
                        Documentation
                    </a>
                </div>
            </div>

            <!-- Hero Visual: Asymmetrical Floating Elements -->
            <div class="tw-col-span-12 lg:tw-col-span-5 tw-relative tw-mt-24 lg:tw-mt-0">
                <div class="tw-relative tw-w-full tw-h-[500px]">
                    <!-- Main Floating Card -->
                    <div class="tw-floating-card tw-glass-card tw-absolute tw-top-0 tw-right-0 tw-w-72 tw-p-8 tw-rounded-[2.5rem] tw-z-30">
                        <div class="tw-w-16 tw-h-16 tw-bg-indigo-600 tw-rounded-2xl tw-flex tw-items-center tw-justify-center tw-mb-6 tw-shadow-xl">
                            <i class="fas fa-magic tw-text-white tw-text-2xl"></i>
                        </div>
                        <div class="tw-text-sm tw-font-bold tw-text-slate-400 tw-uppercase tw-tracking-widest tw-mb-2">Processor</div>
                        <div class="tw-text-2xl tw-font-bold tw-text-slate-900">Convert</div>
                    </div>

                    <!-- Secondary Card (Offset) -->
                    <div class="tw-floating-card tw-glass-card tw-absolute tw-bottom-12 tw-left-0 tw-w-64 tw-p-8 tw-rounded-[2rem] tw-z-20 tw-rotate-[-6deg]">
                        <div class="tw-w-12 tw-h-12 tw-bg-purple-600 tw-rounded-xl tw-flex tw-items-center tw-justify-center tw-mb-4 tw-shadow-lg">
                            <i class="fas fa-file-alt tw-text-white tw-text-xl"></i>
                        </div>
                        <div class="tw-text-xl tw-font-bold tw-text-slate-900">E-Books</div>
                    </div>

                    <!-- Decorative Circle -->
                    <div class="tw-absolute tw-top-1/2 tw-left-1/2 tw-translate-x-[-50%] tw-translate-y-[-50%] tw-w-96 tw-h-96 tw-border tw-border-indigo-100 tw-rounded-full tw-z-0"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section: Spacious and Minimal -->
<section class="tw-py-48 tw-bg-white">
    <div class="container">
        <div class="lg:tw-broken-grid tw-mb-32">
            <div class="tw-col-span-12 lg:tw-col-span-6">
                <h2 class="tw-text-6xl tw-font-bold tw-mb-8">Built for <span class="tw-text-indigo-600">Privacy</span> & Speed.</h2>
                <p class="tw-text-xl tw-text-slate-500 tw-max-w-md">
                    We've optimized every layer of the experience to ensure your files never leave the security of our environment.
                </p>
            </div>
        </div>
        
        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-4 tw-gap-12">
            <div class="tw-group tw-p-10 tw-rounded-[2.5rem] tw-bg-slate-50 hover:tw-bg-indigo-600 tw-transition-colors">
                <div class="tw-w-14 tw-h-14 tw-bg-white tw-rounded-2xl tw-flex tw-items-center tw-justify-center tw-mb-8 tw-shadow-sm group-hover:tw-rotate-12 tw-transition-transform">
                    <i class="fas fa-bolt tw-text-indigo-600"></i>
                </div>
                <h3 class="tw-text-2xl tw-font-bold tw-mb-4 group-hover:tw-text-white">Fast Processing</h3>
                <p class="tw-text-slate-500 group-hover:tw-text-indigo-100">
                    Optimized algorithms and chunked uploads for efficiency.
                </p>
            </div>
            
            <div class="tw-group tw-p-10 tw-rounded-[2.5rem] tw-bg-slate-50 hover:tw-bg-indigo-600 tw-transition-colors">
                <div class="tw-w-14 tw-h-14 tw-bg-white tw-rounded-2xl tw-flex tw-items-center tw-justify-center tw-mb-8 tw-shadow-sm group-hover:tw-rotate-12 tw-transition-transform">
                    <i class="fas fa-shield-alt tw-text-indigo-600"></i>
                </div>
                <h3 class="tw-text-2xl tw-font-bold tw-mb-4 group-hover:tw-text-white">Privacy First</h3>
                <p class="tw-text-slate-500 group-hover:tw-text-indigo-100">
                    Your files are processed securely and deleted automatically.
                </p>
            </div>
            
            <div class="tw-group tw-p-10 tw-rounded-[2.5rem] tw-bg-slate-50 hover:tw-bg-indigo-600 tw-transition-colors">
                <div class="tw-w-14 tw-h-14 tw-bg-white tw-rounded-2xl tw-flex tw-items-center tw-justify-center tw-mb-8 tw-shadow-sm group-hover:tw-rotate-12 tw-transition-transform">
                    <i class="fas fa-mobile-alt tw-text-indigo-600"></i>
                </div>
                <h3 class="tw-text-2xl tw-font-bold tw-mb-4 group-hover:tw-text-white">Works Everywhere</h3>
                <p class="tw-text-slate-500 group-hover:tw-text-indigo-100">
                    Progressive Web App works on any device. Install for offline access.
                </p>
            </div>
            
            <div class="tw-group tw-p-10 tw-rounded-[2.5rem] tw-bg-slate-50 hover:tw-bg-indigo-600 tw-transition-colors">
                <div class="tw-w-14 tw-h-14 tw-bg-white tw-rounded-2xl tw-flex tw-items-center tw-justify-center tw-mb-8 tw-shadow-sm group-hover:tw-rotate-12 tw-transition-transform">
                    <i class="fas fa-code tw-text-indigo-600"></i>
                </div>
                <h3 class="tw-text-2xl tw-font-bold tw-mb-4 group-hover:tw-text-white">API Friendly</h3>
                <p class="tw-text-slate-500 group-hover:tw-text-indigo-100">
                    RESTful API for seamless integration into your own apps.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Tools Preview: Staggered Layout -->
<section class="tw-py-48 tw-bg-slate-50">
    <div class="container">
        <div class="tw-flex tw-items-center tw-justify-between tw-mb-24">
            <h2 class="tw-text-6xl tw-font-bold">Available <span class="tw-text-gradient">Tools</span></h2>
            <a href="<?php echo $base_url; ?>/tools" class="tw-text-lg tw-font-bold tw-text-indigo-600 tw-flex tw-items-center tw-gap-3 hover:tw-translate-x-2 tw-transition-transform">
                View Arsenal
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-12">
            <?php $i = 0; foreach ($featured as $id => $tool): ?>
                <a href="<?php echo $base_url; ?>/tool/<?php echo $id; ?>"
                   class="tool-card tw-glass-card tw-p-12 tw-border-none tw-shadow-sm hover:tw-shadow-2xl tw-transition-all <?php echo $i % 2 === 1 ? 'lg:tw-offset-y-lg' : ''; ?>">
                    <div class="tw-w-20 tw-h-20 tw-bg-indigo-600 tw-rounded-2xl tw-flex tw-items-center tw-justify-center tw-mb-10 tw-text-white tw-text-2xl">
                        <i class="fas <?php echo $tool->getIcon(); ?>"></i>
                    </div>
                    <h3 class="tw-text-3xl tw-font-bold tw-mb-4"><?php echo htmlspecialchars($tool->getName()); ?></h3>
                    <p class="tw-text-lg tw-text-slate-500 tw-mb-12">
                        <?php echo htmlspecialchars($tool->getDescription()); ?>
                    </p>
                    <span class="tw-text-xs tw-font-bold tw-text-indigo-600 tw-uppercase tw-tracking-widest tw-bg-indigo-50 tw-px-6 tw-py-3 tw-rounded-full">
                        <?php echo htmlspecialchars($tool->getCategory()); ?>
                    </span>
                </a>
            <?php $i++; endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="tw-py-48">
    <div class="container">
        <div class="tw-relative tw-p-24 tw-bg-indigo-600 tw-rounded-[4rem] tw-text-white tw-overflow-hidden tw-text-center">
            <div class="tw-absolute tw-top-0 tw-left-0 tw-w-full tw-h-full tw-bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.2),transparent_70%)]"></div>
            <div class="tw-relative tw-z-10">
                <h2 class="tw-text-6xl tw-font-bold tw-mb-8">Ready to Get Started?</h2>
                <p class="tw-text-2xl tw-text-indigo-100 tw-max-w-2xl tw-mx-auto tw-mb-12">
                    Explore our collection of tools and start processing your files today.
                </p>
                <a href="<?php echo $base_url; ?>/tools" class="btn btn-primary tw-bg-white tw-text-indigo-600 tw-px-12 tw-py-6 tw-rounded-2xl tw-text-xl tw-font-bold hover:tw-scale-105 tw-transition-transform">
                    <i class="fas fa-tools tw-mr-3"></i>
                    Browse All Tools
                </a>
            </div>
        </div>
    </div>
</section>
