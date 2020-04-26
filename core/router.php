<?php

use \core\main\Container;


$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if (!empty($uri)) {
    $sections = explode('/', $uri);
    $count = count($sections);

    if ($count < 3) {
        if (isset($routes[$uri])) {
            $arr = explode('|', $routes[$uri]);
            $path = str_replace('\\', '//', $arr[0]);
            $file = $arr[0] . '.php';
            $class = $arr[0];
            $method = $arr[1];
        } else {
            $arr = explode('|', $routes["404"]);   // ----------404
            $path = str_replace('\\', '//', $arr[0]);
            $file = $arr[0] . '.php';
            $class = $arr[0];
            $method = $arr[1];
        }
    } elseif ($count == 3) {
        $i = $sections[0] . '/' . $sections[1] . "/.*";

        if (isset($routes[$i])) {

            define("ARGUMENT", $sections[2]);


            $arr = explode('|', $routes[$i]);
            $path = str_replace('\\', '//', $arr[0]);
            $file = $arr[0] . '.php';
            $class = $arr[0];
            $method = $arr[1];
        } else {

            $arr = explode('|', $routes["404"]);    // ----------404
            $path = str_replace('\\', '//', $arr[0]);
            $file = $arr[0] . '.php';
            $class = $arr[0];
            $method = $arr[1];
        }
    }


} else {
    $arr = explode('|', $routes['default']);
    $path = str_replace('\\', '//', $arr[0]);
    $file = $arr[0] . '.php';
    $class = $arr[0];
    $method = $arr[1];
}

if (file_exists($file)) {
    require_once($file);

    if (class_exists($class) && method_exists($class, $method)) {
        $router = new $class;
        $router->$method();
    } else {
        $container = new Container();
        $container->logger('Class or method not found');

        throw new Exception('Class or method not found');
    }

} else {
    $container = new Container();
    $container->logger('Controller not found');
    throw new Exception('Controller not found');
}



