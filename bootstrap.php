<?php
require_once ('core/config/paths.php');
require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable('core/config');
$dotenv->load();

require_once ('core/main/container.php');
require_once ('core/config/db.php');