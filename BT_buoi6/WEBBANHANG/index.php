<?php
spl_autoload_register(function ($class_name) {
    $dirs = ['app/config', 'app/controllers', 'app/models'];
    foreach ($dirs as $dir) {
        $file = "$dir/$class_name.php";
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'default';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controllerName = ucfirst($controller) . 'Controller';
if (class_exists($controllerName)) {
    $controllerInstance = new $controllerName();
    if (method_exists($controllerInstance, $action)) {
        if ($id) {
            $controllerInstance->$action($id);
        } else {
            $controllerInstance->$action();
        }
    } else {
        echo "Action not found!";
    }
} else {
    echo "Controller not found!";
}
?>