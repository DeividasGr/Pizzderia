<?php

namespace App\Views;

use App\app;
use Core\View;

class Navigation extends View
{
    public function render($template_path = ROOT . '/app/templates/nav.tpl.php')
    {
        return parent::render($template_path); // TODO: Change the autogenerated stub
    }


    public function __construct()
    {
        parent::__construct($this->generate());
    }

    public function generate()
    {
        $nav = [App::$router::getUrl('index') => 'Home'];

        if (App::$session->getUser()) {
            if (App::$session->getUser()['role'] === 'admin') {
                return $nav + [
                        App::$router::getUrl('add') => 'Add',
                        App::$router::getUrl('list') => 'Edit',
                        App::$router::getUrl('admin_orders') => 'Orders',
                        App::$router::getUrl('admin_users') => 'Users',
                        App::$router::getUrl('logout') => 'Logout',
                    ];
            } else {
                return $nav + [
                        App::$router::getUrl('user_orders') => 'Orders',
                        App::$router::getUrl('logout') => 'Logout',
                    ];
            }
        } else {
            return $nav + [
                    App::$router::getUrl('register') => 'Register',
                    App::$router::getUrl('login') => 'Login',
                ];
        }
    }
}