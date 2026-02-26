<?php
/**
 * Tools Listing Page View
 * 
 * @package DGLab\Views\Tools
 */
?>
<!-- Page Header -->
<section class="tw-pt-48 tw-pb-32 tw-bg-slate-900 tw-text-white tw-relative tw-overflow-hidden">
    <div class="tw-bg-blur-blob" style="top: -20%; left: -10%; background: radial-gradient(circle, rgba(79, 70, 229, 0.2) 0%, transparent 70%);"></div>
    <div class="container tw-relative tw-z-10">
        <div class="lg:tw-broken-grid">
            <div class="tw-col-span-12 lg:tw-col-span-8">
                <h1 class="tw-text-7xl tw-font-bold tw-mb-6">The <span class="tw-text-gradient">Arsenal</span></h1>
                <p class="tw-text-2xl tw-opacity-80 tw-max-w-2xl">
                    A curated collection of digital tools, crafted for performance and aesthetic precision.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Tools by Category -->
<section class="tw-py-32 tw-bg-white">
    <div class="container">
        <?php foreach ($categories as $category => $catTools): ?>
            <div class="tw-mb-32">
                <div class="lg:tw-broken-grid tw-mb-16 tw-items-end">
                    <div class="tw-col-span-12 lg:tw-col-span-6">
                        <h2 class="tw-text-4xl tw-font-bold tw-flex tw-items-center tw-gap-4">
                            <?php echo htmlspecialchars($category); ?>
                        </h2>
                        <div class="tw-h-1 tw-w-24 tw-bg-indigo-600 tw-mt-4"></div>
                    </div>
                </div>
                
                <div class="tools-grid tw-gap-12">
                    <?php $i = 0; foreach ($catTools as $id => $tool): ?>
                        <a href="<?php echo $base_url; ?>/tool/<?php echo $id; ?>"
                           class="tool-card tw-p-10 tw-border-none tw-shadow-sm hover:tw-shadow-2xl <?php echo $i % 2 === 1 ? 'lg:tw-offset-y-lg' : ''; ?>">
                            <div class="tool-card-icon tw-w-16 tw-h-16 tw-text-xl tw-mb-8">
                                <i class="fas <?php echo $tool->getIcon(); ?>"></i>
                            </div>
                            <h3 class="tool-card-title tw-text-2xl tw-mb-4"><?php echo htmlspecialchars($tool->getName()); ?></h3>
                            <p class="tool-card-description tw-text-gray-500 tw-mb-8">
                                <?php echo htmlspecialchars($tool->getDescription()); ?>
                            </p>
                            <div class="tw-flex tw-items-center tw-justify-between tw-mt-auto">
                                <span class="tw-text-xs tw-font-bold tw-text-slate-400 tw-uppercase tw-tracking-widest">
                                    <?php echo implode(' / ', array_slice($tool->getSupportedTypes(), 0, 2)); ?>
                                </span>
                                <?php if ($tool->supportsChunking()): ?>
                                    <i class="fas fa-bolt tw-text-indigo-600" title="Optimized for large files"></i>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
