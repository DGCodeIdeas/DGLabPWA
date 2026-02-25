<?php
/**
 * Tools by Category Page View
 *
 * @package DGLab\Views\Tools
 */
?>
<!-- Page Header -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-700 py-16 text-white">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4">
            <div>
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>/tools" class="text-white/70 text-decoration-none hover:text-white">Tools</a></li>
                        <li class="breadcrumb-item active text-white fw-bold" aria-current="page">Category</li>
                    </ol>
                </nav>
                <h1 class="display-5 fw-bold mb-0"><?php echo htmlspecialchars($category); ?> Tools</h1>
            </div>
            <a href="<?php echo $base_url; ?>/tools" class="btn btn-white/20 text-white border-white/30 px-6 rounded-pill d-flex align-items-center gap-2 hover:bg-white/30 transition-all">
                <i class="fas fa-arrow-left"></i>
                <span>Back to All Tools</span>
            </a>
        </div>
    </div>
</section>

<!-- Tools Grid -->
<section class="py-16 bg-gray-50">
    <div class="container">
        <div class="row g-6">
            <?php foreach ($tools as $id => $tool): ?>
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
                                    <span class="text-amber-500" title="Supports large files">
                                        <i class="fas fa-bolt"></i>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($tools)): ?>
            <div class="text-center py-20">
                <div class="bg-gray-100 text-gray-400 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                    <i class="fas fa-search fs-2"></i>
                </div>
                <h3 class="h4 fw-bold text-gray-900 mb-2">No tools found</h3>
                <p class="text-gray-600 mb-0">We couldn't find any tools in this category.</p>
                <a href="<?php echo $base_url; ?>/tools" class="btn btn-primary mt-6 rounded-pill px-8">Browse all tools</a>
            </div>
        <?php endif; ?>
    </div>
</section>
