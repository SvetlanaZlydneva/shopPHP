<?php


use \RedBeanPHP\R as R;
R::setup("mysql:host=$_ENV[host]; dbname=$_ENV[dbName]",$_ENV['login'],$_ENV['password']);