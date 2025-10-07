<?php
class Router {
    public function run() {
        // Get the URL parameter from the query string (default to 'home/index' if empty)
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';

        // Sanitize and split the URL into parts
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $urlParts = explode('/', $url);

        // Set controller and method names (default to 'index' method)
        $controllerName = ucfirst($urlParts[0]) . 'Controller';
        $methodName = $urlParts[1] ?? 'index';  // Default to 'index' if no method is provided
        $params = array_slice($urlParts, 2);    // Any extra parts become params

        // Define the path to the controller file
        $controllerPath = __DIR__ . "/../controllers/$controllerName.php";

        // If the controller doesn't exist, show a 404 error
        if (!file_exists($controllerPath)) {
            http_response_code(404);
            echo "404 - Controller not found.";
            return;
        }

        // Include the core Controller file
        require_once "../app/core/Controller.php";

        // Include the specific controller
        require_once $controllerPath;

        // Instantiate the controller class
        $controller = new $controllerName();

        // Check if the method exists in the controller
        if (!method_exists($controller, $methodName)) {
            http_response_code(404);
            echo "404 - Method not found.";
            return;
        }

        // Call the method and pass any parameters
        call_user_func_array([$controller, $methodName], $params);
    }
}


