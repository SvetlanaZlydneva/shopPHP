<?php

try {

    require_once('core/config/config.php');
    require_once('bootstrap.php');
    require_once('core/config/routes.php');
    require_once('core/router.php');

}catch(Exception $e) {
    echo $e->getMessage();
}