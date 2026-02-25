<?php
/**
 * Header Partial
 * 
 * @package DGLab\Views\Partials
 */
?>
<header class="navbar navbar-expand-md sticky-top bg-white border-bottom shadow-sm py-0" role="banner">
    <div class="container py-2">
        <!-- Logo -->
        <a href="<?php echo $base_url; ?>/" class="navbar-brand d-flex align-items-center gap-2 fw-bold text-gray-900 transition-transform hover:scale-105" aria-label="<?php echo APP_NAME; ?> Home">
            <div class="bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-xl shadow-md d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                <i class="fas fa-cube fs-4"></i>
            </div>
            <span class="d-none d-sm-inline"><?php echo APP_NAME; ?></span>
        </a>

        <!-- Mobile Menu Toggle -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto gap-md-1 mt-3 mt-md-0">
                <li class="nav-item">
                    <a href="<?php echo $base_url; ?>/" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded-lg transition-colors <?php echo ($active_nav ?? '') === 'home' ? 'active bg-indigo-50 text-indigo-600 fw-semibold' : 'text-gray-600 hover:bg-gray-100'; ?>">
                        <i class="fas fa-home w-5 text-center"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $base_url; ?>/tools" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded-lg transition-colors <?php echo ($active_nav ?? '') === 'tools' ? 'active bg-indigo-50 text-indigo-600 fw-semibold' : 'text-gray-600 hover:bg-gray-100'; ?>">
                        <i class="fas fa-tools w-5 text-center"></i>
                        <span>Tools</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $base_url; ?>/docs" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded-lg transition-colors <?php echo ($active_nav ?? '') === 'docs' ? 'active bg-indigo-50 text-indigo-600 fw-semibold' : 'text-gray-600 hover:bg-gray-100'; ?>">
                        <i class="fas fa-book w-5 text-center"></i>
                        <span>Docs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $base_url; ?>/about" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded-lg transition-colors <?php echo ($active_nav ?? '') === 'about' ? 'active bg-indigo-50 text-indigo-600 fw-semibold' : 'text-gray-600 hover:bg-gray-100'; ?>">
                        <i class="fas fa-info-circle w-5 text-center"></i>
                        <span>About</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
