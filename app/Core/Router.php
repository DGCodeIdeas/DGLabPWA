<?php
/**
 * DGLab PWA - Router
 * 
 * Lightweight routing system for the application.
 * 
 * @package DGLab\Core
 * @author DGLab Team
 * @version 1.0.0
 */

namespace DGLab\Core;

/**
 * Router Class
 * 
 * Manages application routes and dispatches requests.
 */
class Router
{
    /** @var array Registered routes */
    private array $routes = [];

    /** @var string Base path for the application */
    private string $basePath = '';

    /**
     * Constructor
     * 
     * @param string $basePath Optional base path
     */
    public function __construct(string $basePath = '')
    {
        $this->basePath = rtrim($basePath, '/');
    }

    /**
     * Add a GET route
     * 
     * @param string $path Route path
     * @param mixed $handler Route handler (controller@method or closure)
     * @return void
     */
    public function get(string $path, mixed $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    /**
     * Add a POST route
     * 
     * @param string $path Route path
     * @param mixed $handler Route handler
     * @return void
     */
    public function post(string $path, mixed $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    /**
     * Add a route with a specific method
     * 
     * @param string $method HTTP method
     * @param string $path Route path
     * @param mixed $handler Route handler
     * @return void
     */
    private function addRoute(string $method, string $path, mixed $handler): void
    {
        // Convert path to regex
        // Example: /tool/{id} -> #^/tool/([^/]+)$#
        $regex = preg_quote($path, '#');
        $regex = preg_replace('/\\\{([^/]+)\\\}/', '([^/]+)', $regex);
        $regex = '#^' . $regex . '$#';

        $this->routes[] = [
            'method'  => $method,
            'path'    => $path,
            'regex'   => $regex,
            'handler' => $handler
        ];
    }

    /**
     * Dispatch the current request
     * 
     * @return void
     */
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
        // Detect URI from different sources (shared hosting support)
        if (isset($_GET['__route__'])) {
            $uri = '/' . ltrim($_GET['__route__'], '/');
        } else {
            $uri = $_SERVER['REQUEST_URI'];
            
            // Strip query string
            if (($pos = strpos($uri, '?')) !== false) {
                $uri = substr($uri, 0, $pos);
            }
            
            // Normalize path (especially for shared hosting with subdirectory)
            if (!empty($this->basePath) && str_starts_with($uri, $this->basePath)) {
                $uri = substr($uri, strlen($this->basePath));
            }
            
            // Strip index.php if present
            $uri = str_replace(['/index.php', '/public/index.php'], '', $uri);
            
            if (empty($uri)) {
                $uri = '/';
            }
        }

        // Handle trailing slash (except for root)
        if ($uri !== '/' && str_ends_with($uri, '/')) {
            $uri = rtrim($uri, '/');
        }

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['regex'], $uri, $matches)) {
                array_shift($matches); // Remove full match
                $this->executeHandler($route['handler'], $matches);
                return;
            }
        }

        // No route found
        $this->handleNotFound();
    }

    /**
     * Execute route handler
     * 
     * @param mixed $handler Handler to execute
     * @param array $params Parameters from regex matches
     * @return void
     */
    private function executeHandler(mixed $handler, array $params): void
    {
        if (is_string($handler) && str_contains($handler, '@')) {
            list($controllerName, $method) = explode('@', $handler);
            $controllerClass = "DGLab\\Controllers\\$controllerName";

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $params);
                    return;
                }
            }
        } elseif (is_callable($handler)) {
            call_user_func_array($handler, $params);
            return;
        }

        $this->handleError("Invalid route handler for controller $handler");
    }

    /**
     * Handle 404 Not Found
     * 
     * @return void
     */
    private function handleNotFound(): void
    {
        $controller = new \DGLab\Controllers\ErrorController();
        $controller->notFound();
    }

    /**
     * Handle application error
     * 
     * @param string $message Error message
     * @return void
     */
    private function handleError(string $message): void
    {
        error_log($message);
        $controller = new \DGLab\Controllers\ErrorController();
        $controller->internalError();
    }
}
