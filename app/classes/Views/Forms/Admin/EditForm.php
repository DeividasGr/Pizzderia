<?php


namespace App\Views\Forms\Admin;

use Core\Views\Form;

class EditForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'name' => [
                    'label' => 'Pizza Name',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',

                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pizza Name',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'price' => [
                    'label' => 'Enter Price',
                    'type' => 'number',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pizza Price',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'image' => [
                    'label' => 'Image URL',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter URL Here',
                            'class' => 'input-field'
                        ]
                    ]
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Update That Pizza!',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn'
                        ]
                    ]
                ]
            ]
        ]);
    }
}