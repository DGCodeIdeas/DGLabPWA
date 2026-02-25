<div class="container py-5">
    <div class="d-flex align-items-center mb-4">
        <a href="/tools" class="btn btn-outline-secondary me-3">
            <i class="fas fa-arrow-left"></i> All Tools
        </a>
        <h1 class="h2 mb-0"><?php echo htmlspecialchars($category); ?> Tools</h1>
    </div>

    <div class="row g-4">
        <?php foreach ($tools as $id => $tool): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm tool-card">
                    <div class="card-body">
                        <div class="tool-icon mb-3">
                            <i class="<?php echo htmlspecialchars($tool->getIcon()); ?> fa-2x text-primary"></i>
                        </div>
                        <h5 class="card-title"><?php echo htmlspecialchars($tool->getName()); ?></h5>
                        <p class="card-text text-muted"><?php echo htmlspecialchars($tool->getDescription()); ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="/tool/<?php echo $id; ?>" class="btn btn-primary w-100">Open Tool</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
