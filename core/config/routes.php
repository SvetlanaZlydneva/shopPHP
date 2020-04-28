<?php

$routes = [];
$routes['default'] = "core\\controllers\\mainController|index";
$routes['contacts/views'] = "core\\controllers\\contactsController|index";
$routes['404'] = "core\\controllers\\errorController|error404";
$routes['@'] = "core\\controllers\\adminController|index";
$routes['@/auth'] = "core\\controllers\\adminController|authorisation";
//$routes['products/views/.*'] = "core\\controllers\\contactsController|index";
