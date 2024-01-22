<?php

namespace App;

class Route
{
    protected array $routes;
    public function register(string $route, callable|array $action): self
    {
        $this->routes[$route] = $action;
        // var_dump($this);
        return $this;
    }

    public function resolve(string $requestUrl)
    {
        $route = explode('?', $requestUrl)[0];
        // var_dump($route);
        // var_dump($requestUrl[0]);
        $action = $this->routes[$route] ?? null;
        // var_dump($action);
        if (!$action) {
            // throw new RouteNotFoundException();
            // echo 'hi';
            echo 'Không tìm thấy trang này';
        }
        if (is_callable($action)) {
            return call_user_func($action);
        }
        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
    }
}
