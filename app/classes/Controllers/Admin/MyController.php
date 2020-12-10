<?php


namespace App\Controllers\Admin;


use App\app;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use Core\View;

class MyController extends AuthController
{
    protected $content;
    protected $page;

    public function __construct()
    {
        parent:: __construct();
        $this->content = new View([
            'title' => 'Poop-Wall',
            'products' => App::$db->getRowsWhere('pixels')
        ]);
        $this->page = new BasePage([
            'title' => 'My Poops',
            'content' => $this->content->render(ROOT . '/app/templates/content/my.tpl.php')
        ]);
    }

    public function my()
    {
        return $this->page->render();
        // TODO: Implement index() method.
    }
}