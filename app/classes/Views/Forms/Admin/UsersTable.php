<?php

namespace App\Views\Forms\Admin;

use App\App;
use Core\Views\Table;

class UsersTable extends Table
{
    protected RoleForm $form;

    public function __construct()
    {
        $this->form = new RoleForm();
        $rows = App::$db->getRowsWhere('users');

        foreach ($rows as $id => &$row) {
            $row['id'] = $id;
            $roleForm = new RoleForm($row['role'], $id);
            $rows[$id]['role_form'] = $roleForm->render();


            if ($row['email'] === $_SESSION['email']) {
                unset($row['role_form']);
            }
            unset($row['email'], $row['password']);
        }

        /**
         * Table generate: header array + rows data
         */
        parent::__construct([
            'headers' => [
                'ID',
                'Name',
                'Role',
                'Status'
            ],
            'rows' => $rows
        ]);
    }

}