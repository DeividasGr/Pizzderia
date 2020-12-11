<?php

namespace App\Views\Forms\Admin\ButtonForms;

use Core\Views\Form;

class OrderForm extends Form
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
                    'value' => 'Order'
                ],
                'name' => [
                    'type' => 'hidden',
                    'value' => $value
                ],
            ],
            'buttons' => [
                'delete' => [
                    'title' => 'Order',
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