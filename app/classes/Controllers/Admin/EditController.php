<?php


namespace App\Controllers\Admin;


use App\app;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\EditForm;


class EditController extends AuthController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        parent:: __construct();
        $this->form = new EditForm();
        $this->page = new BasePage([
            'title' => 'Edit Pizza',
        ]);
    }

    public function edit()
    {
        $row_id = $_GET['id'] ?? null;

        if ($row_id === null) {
            header("Location: /list");
            exit();
        }

        $this->form->fill(App::$db->getRowById('pizzas', $row_id));

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            var_dump($clean_inputs);

            App::$db->updateRow('pizzas', $row_id, $clean_inputs);
            header('Location: /');
        }


        $this->page->setContent($this->form->render());

        return $this->page->render();
    }
}