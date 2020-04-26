<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 26.04.2020
 * Time: 20:28
 */

$routes = [];
$routes['default'] = "core\\controllers\\mainController|index";
$routes['contacts/views'] = "core\\controllers\\contactsController|index";
$routes['404'] = "core\\controllers\\errorController|error404";
//$routes['products/views/.*'] = "core\\controllers\\contactsController|index";
