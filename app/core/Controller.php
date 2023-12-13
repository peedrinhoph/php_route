<?php

namespace app\core;

use app\library\Request;
use app\library\Response;
use app\controllers\NotFoundController;
use ReflectionClass;
use ReflectionParameter;

class Controller
{

    private const NAMESPACE = 'app\\controllers\\';

    private function controllerPath(string $controller): string
    {
        $controllerInstance = $this::NAMESPACE . $controller;

        return $controllerInstance;
    }

    public function dispatch(array $routes): void
    {

        $currentUri =  isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        $uri = $currentUri !== '/' ? rtrim($currentUri, '/') : $currentUri;

        $routerFound = false;

        foreach ($routes as $route) {

            $pattern = '#^' . preg_replace('/{id}/', '([\w-]+)', $route['path']) . '$#';

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);

                $routerFound = true;
                if (Request::getMethod() !== $route['method']) {
                    Response::json([
                        'error'   => true,
                        'success' => false,
                        'message' => 'Sorry, method not allowed'
                    ], 405);
                    return;
                }

                if (!str_contains($route['action'], '@')) {
                    throw new \Exception("Incorrect {$route['action']} in route");
                }

                [$controller, $action] = explode('@', $route['action']);

                $controller = $this->controllerPath($controller);

                $extendController = new $controller();

                if (!method_exists($controller, $action)) {
                    throw new \Exception("Method {$action} does not exist on class {$controller}");
                }
                
                // $reflect = new ReflectionClass($extendController);
                // $params = $reflect->getMethod($action)->getParameters();
                
                
                $extendController->$action($matches);
            }
        }

        if (!$routerFound) {
            $controller = new NotFoundController();
            $controller->index(new Request, new Response);
        }
    }
    
}
