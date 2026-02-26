<div class="tw-bg-blur-blob" style="top: 10%; right: -5%; background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, transparent 70%);"></div>

<section class="tw-pt-32 tw-pb-20">
    <div class="container">
        <div class="lg:tw-broken-grid tw-items-end tw-mb-16">
            <div class="tw-col-span-12 lg:tw-col-span-8">
                <a href="<?php echo $base_url; ?>/tools" class="tw-inline-flex tw-items-center tw-text-indigo-600 tw-font-bold tw-mb-6 hover:tw-translate-x-[-4px] tw-transition-transform">
                    <i class="fas fa-arrow-left tw-mr-2"></i>
                    Back to All Tools
                </a>
                <h1 class="tw-text-6xl tw-font-bold"><?php echo htmlspecialchars($category); ?> <span class="tw-text-gradient">Tools</span></h1>
            </div>
        </div>

        <div class="tools-grid tw-gap-12">
            <?php $i = 0; foreach ($tools as $id => $tool): ?>
                <a href="<?php echo $base_url; ?>/tool/<?php echo $id; ?>"
                   class="tool-card tw-p-10 tw-border-none tw-shadow-sm hover:tw-shadow-2xl <?php echo $i % 2 === 1 ? 'lg:tw-offset-y-lg' : ''; ?>">
                    <div class="tool-card-icon tw-w-16 tw-h-16 tw-text-xl tw-mb-8">
                        <i class="fas <?php echo $tool->getIcon(); ?>"></i>
                    </div>
                    <h3 class="tool-card-title tw-text-2xl tw-mb-4"><?php echo htmlspecialchars($tool->getName()); ?></h3>
                    <p class="tool-card-description tw-text-gray-500 tw-mb-0">
                        <?php echo htmlspecialchars($tool->getDescription()); ?>
                    </p>
                </a>
            <?php $i++; endforeach; ?>
        </div>
    </div>
</section>
