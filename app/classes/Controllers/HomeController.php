<?php

namespace App\Controllers;

use App\app;
use App\Views\BasePage;
use App\Views\Content\HomeContent;
use Core\View;

class HomeController extends \App\Abstracts\Controller
{
    protected $home_content;

    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * For example, create $page object,
     * set it's header/navigation
     * or check if user has a proper role
     *
     * Goal is to prepare $page
     */
    public function __construct()
    {
        $this->home_content = new HomeContent();
    }

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new PixelsController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ProductsController();
     * print $controller->my();
     *
     * @return string|null
     */

    function index(): ?string
    {
//        var_dump($this->home_content->homeContent());
//        if ($this->home_content->homeContent()['order']->validate()) {
//
//        }

        $content = new View([
            'title' => 'Choose our pizzas',
            'products' => $this->home_content->homeContent()
        ]);

        $page = new BasePage([
            'title' => 'Select you pizza',
            'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php')
        ]);

        return $page->render();
    }
}