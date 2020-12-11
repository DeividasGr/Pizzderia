<?php

namespace App\Views\Content;

use App\app;
use App\Controllers\Base\GuestController;
use App\Views\Forms\Admin\ButtonForms\DeleteForm;
use App\Views\Forms\Admin\ButtonForms\OrderForm;
use Core\Views\Form;
use Core\Views\Link;


class HomeContent extends GuestController
{
    protected $form;
    protected $order;
    protected $link;

    public function __construct()
    {
        $this->form = new DeleteForm();
        $this->order = new OrderForm();
    }

    public function homeContent()
    {
        if (Form::action()) {
            if ($this->form->validate()) {
                $clean_inputs = $this->form->values();

                App::$db->deleteRow('pizzas', $clean_inputs['row_id']);
            }

            if ($this->order->validate()) {
                $clean_inputs = $this->order->values();
            }

        }

        if (isset($_POST['row_id'])) {

            if ($_POST['row_id'] === 'ORDER') {
                $rows = App::$db->getRowsWhere('orders');
                $pizza_id = 1;

                foreach ($rows as $id => $row) {
                    $pizza_id++;
                }

                App::$db->insertRow('orders', [
                    'email' => $_SESSION['email'],
                    'id' => $pizza_id,
                    'status' => 'active',
                    'name' => $_POST['name'],
                    'timestamp' => time()
                ]);
            }
        }
    }

    public function redirect()
    {
        if (!App::$session->getUser()) {
            $this->link = new Link([
                'link' => '/login',
                'text' => 'LOGIN'
            ]);

            return $this->link->render();

        } elseif (App::$session->getUser()) {

            if (App::$session->getUser()['role'] === 'admin') {
                $this->link = new Link([
                    'link' => '/add',
                    'text' => 'ADD PIZZA'
                ]);

                return $this->link->render();
            }
        }
    }

}