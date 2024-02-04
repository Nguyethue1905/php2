<?php
namespace Core;
    class Route
    {
        private array $routes;

        public function register(string $requestMethod, string $route, callable|array $action): self
        {
            // var_dump($route);
            $this->routes[$requestMethod][$route] = $action;
            //  var_dump($this->routes['post']);
            return $this;
        }

        public function get(string $route, callable|array $action): self
        {
            return $this->register('get', $route, $action);
        }

        public function post(string $route, callable|array $action): self
        {
            return $this->register('post', $route, $action);
        }
        public function resolve(string $requestUrl, string $requestMethod)
        {
            $route = explode('?', $requestUrl)[0];
            $action = $this->routes[$requestMethod][$route] ?? null;
            if (!$action) {
                // throw new RouteNotFoundException();
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

    ?>