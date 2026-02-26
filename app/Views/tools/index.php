<?php
/**
 * Tools Listing Page View - Bootstrap 5 Overhaul
 * 
 * @package DGLab\Views\Tools
 */
?>
<!-- Page Header -->
<section class="py-5 bg-dark text-white position-relative overflow-hidden">
    <div class="tw-bg-blur-blob position-absolute" style="top: -20%; left: -10%; background: radial-gradient(circle, rgba(79, 70, 229, 0.2) 0%, transparent 70%);"></div>
    <div class="container py-5 position-relative z-1">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-3 fw-bold mb-3">The <span class="tw-text-gradient">Arsenal</span></h1>
                <p class="lead opacity-75 fs-4 mb-0">
                    A curated collection of digital tools, crafted for performance and aesthetic precision.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Tools by Category -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <?php foreach ($categories as $category => $catTools): ?>
            <div class="mb-5 pb-5 border-bottom last-child-border-0">
                <div class="d-flex align-items-center mb-5">
                    <h2 class="h2 fw-bold mb-0 me-3"><?php echo htmlspecialchars($category); ?></h2>
                    <div class="flex-grow-1 border-top border-2 border-primary opacity-25" style="max-width: 60px;"></div>
                </div>
                
                <div class="row g-4">
                    <?php $i = 0; foreach ($catTools as $id => $tool): ?>
                        <div class="col-md-6 col-lg-4">
                            <a href="<?php echo $base_url; ?>/tool/<?php echo $id; ?>"
                               class="card h-100 border shadow-sm hover-shadow-lg transition-all text-decoration-none p-4 rounded-4 group-tool-card">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center mb-4 transition-transform" style="width: 3.5rem; height: 3.5rem;">
                                    <i class="fas <?php echo $tool->getIcon(); ?> fs-4" aria-hidden="true"></i>
                                </div>
                                <h3 class="h4 fw-bold text-dark mb-2"><?php echo htmlspecialchars($tool->getName()); ?></h3>
                                <p class="text-muted small mb-4">
                                    <?php echo htmlspecialchars($tool->getDescription()); ?>
                                </p>
                                <div class="mt-auto d-flex align-items-center justify-content-between">
                                    <span class="text-uppercase tracking-widest fw-bold text-secondary opacity-75 x-small">
                                        <?php echo implode(' / ', array_slice($tool->getSupportedTypes(), 0, 2)); ?>
                                    </span>
                                    <?php if ($tool->supportsChunking()): ?>
                                        <i class="fas fa-bolt text-primary" title="Optimized for large files" aria-label="Optimized for large files"></i>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
.hover-shadow-lg:hover {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.125) !important;
}
.group-tool-card:hover .bg-primary {
    transform: scale(1.1);
}
.x-small {
    font-size: 0.65rem;
}
.last-child-border-0:last-child {
    border-bottom: 0 !important;
}
</style>
