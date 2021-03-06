<?php


namespace App\Controllers\Base;


use App\app;

class UserController
{
    protected string $redirect = '/login';

    public function __construct()
    {
        if (App::$session->getUser()['role'] !== 'user') {
            header("Location: $this->redirect");
            exit();
        }
    }
}