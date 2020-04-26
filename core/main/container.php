<?php namespace core\main;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Container{
public function twig(){
    $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/public/');
     return new \Twig\Environment($loader);
}
public function logger($error){
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'].'/logs/error.log', Logger::WARNING));

    $log->error($error);
}
}