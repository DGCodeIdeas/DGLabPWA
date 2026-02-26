<?php
/**
 * Tool Category View - Bootstrap 5 Overhaul
 *
 * @package DGLab\Views\Tools
 */
?>
<!-- Category Header -->
<section class="py-5 bg-dark text-white position-relative overflow-hidden">
    <!-- Decorative Blur Blobs -->
    <div class="tw-bg-blur-blob position-absolute" style="top: -20%; right: -10%; background: radial-gradient(circle, rgba(79, 70, 229, 0.2) 0%, transparent 70%);"></div>
    <div class="tw-bg-blur-blob position-absolute" style="bottom: -20%; left: -10%; background: radial-gradient(circle, rgba(124, 58, 237, 0.15) 0%, transparent 70%);"></div>

    <div class="container py-5 position-relative z-1">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>/" class="text-white opacity-50 text-decoration-none transition-hover">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>/tools" class="text-white opacity-50 text-decoration-none transition-hover">Tools</a></li>
                        <li class="breadcrumb-item active text-white fw-bold" aria-current="page"><?php echo htmlspecialchars($category); ?></li>
                    </ol>
                </nav>
                <h1 class="display-2 fw-bold mb-4"><?php echo htmlspecialchars($category); ?> <span class="text-primary">Tools</span></h1>
                <p class="lead opacity-75 fs-3 mb-0" style="max-width: 700px;">
                    Explore our specialized arsenal of tools for <?php echo strtolower(htmlspecialchars($category)); ?> processing.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Tools List Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <?php if (empty($tools)): ?>
            <div class="text-center py-5">
                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 10rem; height: 10rem;">
                    <i class="fas fa-search fs-1 text-muted" aria-hidden="true"></i>
                </div>
                <h2 class="display-6 fw-bold mb-3">No tools found</h2>
                <p class="text-muted mb-5 lead fs-5">We couldn't find any tools in this category. Why not check out our other tools?</p>
                <a href="<?php echo $base_url; ?>/tools" class="btn btn-primary btn-lg rounded-pill px-5 shadow">
                    Browse All Tools
                </a>
            </div>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach ($tools as $id => $tool): ?>
                    <div class="col-md-6 col-lg-4">
                        <a href="<?php echo $base_url; ?>/tool/<?php echo $id; ?>" class="card h-100 border-0 shadow rounded-4 p-4 text-decoration-none transition-hover group-card">
                            <div class="bg-primary rounded-3 d-flex align-items-center justify-content-center mb-4 text-white shadow-sm" style="width: 3.5rem; height: 3.5rem;">
                                <i class="fas <?php echo $tool->getIcon(); ?> fs-4" aria-hidden="true"></i>
                            </div>
                            <h3 class="h4 fw-bold text-dark mb-3"><?php echo htmlspecialchars($tool->getName()); ?></h3>
                            <p class="text-muted mb-4 small">
                                <?php echo htmlspecialchars($tool->getDescription()); ?>
                            </p>
                            <div class="mt-auto pt-3 d-flex align-items-center text-primary fw-bold small">
                                Launch Tool <i class="fas fa-arrow-right ms-2 transition-x" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.transition-hover {
    transition: all 0.3s ease;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.08) !important;
}
.group-card:hover .transition-x {
    transform: translateX(5px);
}
</style>
