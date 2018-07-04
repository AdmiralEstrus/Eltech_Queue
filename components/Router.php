<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = __DIR__ . '/../config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $url = $this->getURI();
        foreach ($this->routes as $pattern => $route) {
            if (preg_match("~$pattern~", $url)) {
                $internalRoute = preg_replace("~$pattern~", $route, $url);
                $segments = explode('/', $internalRoute);
                $controller = ucfirst(array_shift($segments)) . 'Controller';
                $action = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;
                $controllerFile = __DIR__ . '/../controllers/' . $controller . '.php';
                var_dump($controllerFile);
                if (file_exists($controllerFile)) {
                    var_dump("1");
                    include_once($controllerFile);

                }
                var_dump("2");
                if (!is_callable(array($controller, $action))) {
                    var_dump("3");
                    header("HTTP/1.0 404 Not Found");
                    return false;
                }
                var_dump("4");
                $controllerObject = new $controller();
                if (call_user_func_array(array($controllerObject, $action), $parameters)) {
                    var_dump("5");
                    return true;
                }
            }
        }
        var_dump("6");
        if (file_exists(__DIR__ . "/../controllers/SiteController.php")) {
            var_dump("7");
            include_once(__DIR__ . "/../controllers/SiteController.php");
        }
        header("HTTP/1.0 404 Not Found");
        return false;
    }
}