<?php

namespace App\Controllers\User;

use App\Controllers\Base\UserController;
use App\Views\BasePage;
use App\Views\Forms\Admin\OrderTable;

class OrderController extends UserController
{
    protected $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Orders'
        ]);
    }

    public function index()
    {
        $table = new OrderTable();

        $this->page->setContent($table->render());

        return $this->page->render();
    }
}