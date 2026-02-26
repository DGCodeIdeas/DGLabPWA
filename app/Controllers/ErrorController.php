<?php
/**
 * DGLab PWA - Error Controller
 * 
 * Handles error pages (404, 500, etc.)
 * 
 * @package DGLab\Controllers
 * @author DGLab Team
 * @version 1.0.0
 */

namespace DGLab\Controllers;

use DGLab\Core\Controller;

/**
 * ErrorController Class
 * 
 * Controller for handling application errors.
 */
class ErrorController extends Controller
{
    /**
     * 404 Not Found error page
     * 
     * @return void
     */
    public function notFound(): void
    {
        header("HTTP/1.0 404 Not Found");
        
        $this->render('errors/404', [
            'title' => 'Page Not Found',
            'active_nav' => 'error'
        ]);
    }

    /**
     * 500 Internal Server Error page
     * 
     * @return void
     */
    public function internalError(): void
    {
        header("HTTP/1.0 500 Internal Server Error");
        
        $this->render('errors/500', [
            'title' => 'Internal Server Error',
            'active_nav' => 'error'
        ]);
    }
}
