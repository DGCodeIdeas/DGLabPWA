<?php
/**
 * Header Partial - Refactored for Bootstrap 5
 * 
 * @package DGLab\Views\Partials
 */
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm" role="navigation">
    <div class="container">
        <!-- Logo -->
        <a href="<?php echo $base_url; ?>/" class="navbar-brand d-flex align-items-center fw-bold" aria-label="<?php echo APP_NAME; ?> Home">
            <span class="bg-primary rounded-3 d-flex align-items-center justify-content-center me-2" style="width: 2.5rem; height: 2.5rem;">
                <i class="fas fa-cube text-white"></i>
            </span>
            <span class="fs-4"><?php echo APP_NAME; ?></span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-lg-2">
                <li class="nav-item">
                    <a href="<?php echo $base_url; ?>/" class="nav-link px-3<?php echo $active_nav === 'home' ? ' active fw-semibold' : ''; ?>" <?php echo $active_nav === 'home' ? 'aria-current="page"' : ''; ?>>
                        <i class="fas fa-home me-1 d-lg-none"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $base_url; ?>/tools" class="nav-link px-3<?php echo $active_nav === 'tools' ? ' active fw-semibold' : ''; ?>" <?php echo $active_nav === 'tools' ? 'aria-current="page"' : ''; ?>>
                        <i class="fas fa-tools me-1 d-lg-none"></i> Tools
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $base_url; ?>/docs" class="nav-link px-3<?php echo $active_nav === 'docs' ? ' active fw-semibold' : ''; ?>" <?php echo $active_nav === 'docs' ? 'aria-current="page"' : ''; ?>>
                        <i class="fas fa-book me-1 d-lg-none"></i> Docs
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $base_url; ?>/about" class="nav-link px-3<?php echo $active_nav === 'about' ? ' active fw-semibold' : ''; ?>" <?php echo $active_nav === 'about' ? 'aria-current="page"' : ''; ?>>
                        <i class="fas fa-info-circle me-1 d-lg-none"></i> About
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
