<?php

namespace core\controllers;

use \RedBeanPHP\R as R;
use core\main\Container;

class adminController extends Container
{
    public function index()
    {
//        echo $this->twig()->render("admin/enter.twig");
    }

    public function authorisation()
    {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = R::findOne('administrators', 'login=?', [$_POST['login']]);
            if (!empty($login)) {
                if (password_verify($_POST['password'], $login->pass)) {
                    setcookie('auth', true, time() + 3600, '/');
                    setcookie('login', $login->login, time() + 3600, '/');
                    setcookie('email', $login->email, time() + 3600, '/');
                    setcookie('role', $login->role, time() + 3600, '/');
                    header('location:/@');
                }
            }
        }

    }
}