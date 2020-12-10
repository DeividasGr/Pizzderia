<?php


namespace App\Controllers\Base;

use App\app;

class AuthController
{
    protected string $redirect = '/login';

    public function __construct()
    {
        if (!App::$session->getUser()) {
            header("Location: $this->redirect");
            exit();
        }
    }
}