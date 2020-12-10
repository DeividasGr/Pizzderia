<?php

namespace App\Views\Content;

use App\app;
use App\Controllers\Base\GuestController;
use App\Views\Card;
use App\Views\Forms\Admin\ButtonForms\DeleteForm;
use App\Views\Forms\Admin\ButtonForms\EditForm;
use App\Views\Forms\Admin\ButtonForms\OrderForm;


class HomeContent extends GuestController
{
    protected $all_cards;
    protected $rows;
    protected $orderForm;
    protected $deleteForm;
    protected $editForm;

    public function __construct()
    {
        $this->rows = App::$db->getRowsWhere('pizzas');
        $this->orderForm = new OrderForm();
        $this->deleteForm = new DeleteForm();
        $this->editForm = new EditForm();

        foreach ($this->rows as $id => $row) {
            $card = new Card([
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image'],
                'order' => $this->orderForm,
                'delete' => $this->deleteForm,
                'edit' => $this->editForm,
            ]);
            $this->all_cards[] = $card->render();
        }
    }

    public function homeContent()
    {
        return $this->all_cards;
    }

}