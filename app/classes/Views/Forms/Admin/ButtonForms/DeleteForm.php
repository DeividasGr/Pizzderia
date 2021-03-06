<?php


namespace App\Views\Forms\Admin\ButtonForms;

use Core\Views\Form;

class DeleteForm extends Form
{
public function __construct($value = null)
{
    parent::__construct([
        'attr' => [
            'method' => 'POST',
            'class' => 'form-btn'
        ],
        'fields' => [
            'row_id' => [
                'type' => 'hidden',
                'value' => $value,
                'validators' => [
                    'validate_row_exists',
                ],

            ],
        ],
        'buttons' => [
            'delete' => [
                'title' => 'Delete',
                'type' => 'submit',
                'extra' => [
                    'attr' => [
                        'class' => 'btn-link'
                    ]
                ]
            ]
        ],
    ]);
}
}