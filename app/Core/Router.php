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

    /** @var array Named routes mapping */
    private array $namedRoutes = [];

    /** @var string Current group prefix */
    private string $groupPrefix = '';

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
     * @param string|null $name Route name
     * @return void
     */
    public function get(string $path, mixed $handler, ?string $name = null): void
    {
        $this->addRoute('GET', $path, $handler, $name);
    }

    /**
     * Add a POST route
     * 
     * @param string $path Route path
     * @param mixed $handler Route handler
     * @param string|null $name Route name
     * @return void
     */
    public function post(string $path, mixed $handler, ?string $name = null): void
    {
        $this->addRoute('POST', $path, $handler, $name);
    }

    /**
     * Add a PUT route
     *
     * @param string $path Route path
     * @param mixed $handler Route handler
     * @param string|null $name Route name
     * @return void
     */
    public function put(string $path, mixed $handler, ?string $name = null): void
    {
        $this->addRoute('PUT', $path, $handler, $name);
    }

    /**
     * Add a PATCH route
     *
     * @param string $path Route path
     * @param mixed $handler Route handler
     * @param string|null $name Route name
     * @return void
     */
    public function patch(string $path, mixed $handler, ?string $name = null): void
    {
        $this->addRoute('PATCH', $path, $handler, $name);
    }

    /**
     * Add a DELETE route
     *
     * @param string $path Route path
     * @param mixed $handler Route handler
     * @param string|null $name Route name
     * @return void
     */
    public function delete(string $path, mixed $handler, ?string $name = null): void
    {
        $this->addRoute('DELETE', $path, $handler, $name);
    }

    /**
     * Add a route group
     *
     * @param array $attributes Group attributes (prefix, etc.)
     * @param callable $callback Callback to register routes in the group
     * @return void
     */
    public function group(array $attributes, callable $callback): void
    {
        $previousPrefix = $this->groupPrefix;

        if (isset($attributes['prefix'])) {
            $this->groupPrefix = $previousPrefix . '/' . trim($attributes['prefix'], '/');
        }

        $callback($this);

        $this->groupPrefix = $previousPrefix;
    }

    /**
     * Add a route with a specific method
     * 
     * @param string $method HTTP method
     * @param string $path Route path
     * @param mixed $handler Route handler
     * @param string|null $name Route name
     * @return void
     */
    private function addRoute(string $method, string $path, mixed $handler, ?string $name = null): void
    {
        // Apply group prefix
        $fullPath = '/' . trim($this->groupPrefix . '/' . trim($path, '/'), '/');
        if (empty($fullPath)) {
            $fullPath = '/';
        }

        // Convert path to regex
        // Example: /tool/{id} -> #^/tool/([^/]+)$#
        // Example: /assets/{path:any} -> #^/assets/(.*)$#
        $regex = preg_quote($fullPath, '#');

        // Support {param:any} for matching across slashes
        $regex = preg_replace('~\\\{[^/]+:any\\\}~', '(.*)', $regex);
        // Support regular {param}
        $regex = preg_replace('~\\\{[^/]+\\\}~', '([^/]+)', $regex);

        $regex = '#^' . $regex . '$#';

        if ($name) {
            $this->namedRoutes[$name] = $fullPath;
        }

        $this->routes[] = [
            'method'  => $method,
            'path'    => $fullPath,
            'regex'   => $regex,
            'handler' => $handler
        ];
    }

    /**
     * Generate URL for a named route
     *
     * @param string $name Route name
     * @param array $params Route parameters
     * @return string Generated URL
     */
    public function route(string $name, array $params = []): string
    {
        if (!isset($this->namedRoutes[$name])) {
            return '#';
        }

        $path = $this->namedRoutes[$name];

        foreach ($params as $key => $value) {
            // Replace {key} or {key:any}
            $path = preg_replace('~\{' . preg_quote($key, '~') . '(:any)?\}~', $value, $path);
        }

        return $this->basePath . $path;
    }

    /**
     * Dispatch the current request
     * 
     * @return void
     */
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        
        // Detect URI from different sources (shared hosting support)
        if (isset($_GET['__route__'])) {
            $uri = '/' . ltrim($_GET['__route__'], '/');
        } else {
            $uri = $_SERVER['REQUEST_URI'] ?? '/';
            
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
        $controllerClass = \DGLab\Controllers\ErrorController::class;
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            $controller->notFound();
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
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
        $controllerClass = \DGLab\Controllers\ErrorController::class;
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            $controller->internalError();
        } else {
            http_response_code(500);
            echo "500 Internal Server Error";
        }
    }
}
