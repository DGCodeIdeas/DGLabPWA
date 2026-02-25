<?php
/**
 * Tools Listing Page View
 * 
 * @package DGLab\Views\Tools
 */
?>
<!-- Page Header -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-700 py-16 lg:py-24 text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">All Tools</h1>
        <p class="fs-5 opacity-90 max-w-xl mx-auto leading-relaxed">
            Browse our collection of web-based tools for file processing and conversion.
        </p>
    </div>
</section>

<!-- Tools by Category -->
<section class="py-16 bg-gray-50">
    <div class="container">
        <?php foreach ($categories as $category => $catTools): ?>
            <div class="mb-16 last:mb-0">
                <div class="d-flex align-items-center gap-3 mb-8">
                    <h2 class="h4 fw-bold text-gray-900 mb-0"><?php echo htmlspecialchars($category); ?></h2>
                    <div class="flex-grow-1 bg-gray-200 h-0.5 rounded-full"></div>
                </div>
                
                <div class="row g-6">
                    <?php foreach ($catTools as $id => $tool): ?>
                        <div class="col-lg-4 col-md-6">
                            <a href="<?php echo $base_url; ?>/tool/<?php echo $id; ?>" class="d-block text-decoration-none h-100">
                                <div class="bg-white p-6 rounded-3xl border shadow-sm transition-all hover:shadow-md hover:-translate-y-1 h-100 d-flex flex-column">
                                    <div class="bg-indigo-600 text-white rounded-2xl p-3 d-inline-flex mb-4 align-self-start">
                                        <i class="fas <?php echo $tool->getIcon(); ?> fs-4"></i>
                                    </div>
                                    <h3 class="h5 fw-bold text-gray-900 mb-3"><?php echo htmlspecialchars($tool->getName()); ?></h3>
                                    <p class="text-gray-600 mb-6 fs-6 leading-relaxed">
                                        <?php echo htmlspecialchars($tool->getDescription()); ?>
                                    </p>

                                    <div class="mt-auto pt-4 border-top d-flex align-items-center justify-content-between">
                                        <span class="text-xs text-gray-500 font-medium uppercase tracking-wider">
                                            <?php echo implode(', ', array_slice($tool->getSupportedTypes(), 0, 2)); ?>
                                        </span>
                                        <?php if ($tool->supportsChunking()): ?>
                                            <span class="text-amber-500 d-flex align-items-center gap-1" title="Supports large files">
                                                <i class="fas fa-bolt"></i>
                                                <span class="text-xs fw-bold">PRO</span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
