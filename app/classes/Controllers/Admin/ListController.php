<?php


namespace App\Controllers\Admin;

use App\app;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Card;
use Core\Views\Link;
use Core\Views\Table;

class ListController extends AuthController
{
    protected $table;
    protected $page;
    protected $rows;

    public function __construct()
    {
        parent:: __construct();
        $this->page = new BasePage([
            'title' => 'Pizza List',
        ]);

        $this->rows = App::$db->getRowsWhere('pizzas');

        foreach ($this->rows as $id => $row) {
            $link = new Link([
                'link' => App::$router::getUrl('edit') . "?id={$id}",
                'text' => 'Edit',
            ]);

            $this->rows[$id]['link'] = $link->render();
        }


        $this->table = new Table([
            'headers' => [
                'Pizza Name',
                'Price',
                'URL',
                'Update',
            ],
            'rows' => $this->rows ?? []
        ]);

    }


    public function list()
    {
        $this->page->setContent($this->table->render());

        return $this->page->render();
    }
}
