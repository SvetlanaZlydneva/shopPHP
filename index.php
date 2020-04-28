<?php
session_start();
ob_start();

use core\main\Container;
use core\plugins\Assets;


try {
    require_once('core/config/config.php');
    require_once('bootstrap.php');
    require_once('core/plugins/assets.php');
    require_once('core/config/routes.php');
    require_once('core/router.php');
    d(password_hash('1111', PASSWORD_DEFAULT));
    $container = new Container();

    if ($sections[0] == '@') {
        if (isset($_COOKIE['auth']) && $_COOKIE['auth']) {
            echo $container->twig()->render('admin/main.twig', ["assets" => Assets::assetsGenerate()]);
        } else {
            echo $container->twig()->render('admin/enter.twig', ["assets" => Assets::assetsGenerate()]);
        }
    } else {
        echo $container->twig()->render('main.twig', ["assets" => Assets::assetsGenerate()]);
    }


} catch (Exception $e) {
    echo $e->getMessage();
}