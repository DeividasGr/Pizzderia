<?php

namespace App\Controllers;

use App\app;
use App\Views\BasePage;
use App\Views\Content\HomeContent;
use App\Views\Forms\Admin\ButtonForms\DeleteForm;
use App\Views\Forms\Admin\ButtonForms\OrderForm;
use Core\View;
use Core\Views\Link;

class HomeController extends \App\Abstracts\Controller
{
    protected $page;
    protected $link;


    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Pizzderia'
        ]);
    }


    function index(): ?string
    {
        $home_content = new HomeContent();

        $home_content->HomeContent();

        $rows = App::$db->getRowsWhere('pizzas');

        $url_path = App::$router::getUrl('edit');


        foreach ($rows as $id => &$row) {
            if (App::$session->getUser()) {
                if (App::$session->getUser()['role'] === 'admin') {
                    $this->link = new Link([
                        'link' => "{$url_path}?id={$id}",
                        'class' => 'link',
                        'text' => 'Edit'
                    ]);

                    $row['link'] = $this->link->render();

                    $deleteForm = new DeleteForm($id);
                    $row['delete'] = $deleteForm->render();
                    $row['order'] = '';

                } elseif (App::$session->getUser()['role'] === 'user') {
                    $orderForm = new OrderForm($row['name']);
                    $row['order'] = $orderForm->render();
                    $row['link'] = '';
                    $row['delete'] = '';
                }
            } else {
                $row['order'] = '';
                $row['link'] = '';
                $row['delete'] = '';
            }
        }
        $content = new View([
            'title' => 'Choose our pizzas',
            'redirect' => $home_content->redirect(),
            'products' => $rows
        ]);

        $page = new BasePage([
            'title' => 'Pizzeria',
            'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php')
        ]);

        return $page->render();
    }
}