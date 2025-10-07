<?php
class Router {
    public function run() {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $urlParts = explode('/', $url);

        $controllerName = ucfirst($urlParts[0]) . 'Controller';
        $methodName = $urlParts[1] ?? 'index';
        $params = array_slice($urlParts, 2);

        $controllerPath = "../app/controllers/$controllerName.php";
        if (!file_exists($controllerPath)) {
            http_response_code(404);
            echo "404 - Controller not found.";
            return;
        }

        // ✅ Include the base controller before loading the child
        require_once "../app/core/Controller.php";

        // Now include the specific controller
        require_once $controllerPath;

        $controller = new $controllerName();

        if (!method_exists($controller, $methodName)) {
            http_response_code(404);
            echo "404 - Method not found.";
            return;
        }

        call_user_func_array([$controller, $methodName], $params);
    }
}
