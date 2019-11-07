<?php
/**
 * General options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'general',
    'title'     =>  __('General', 'cora'),
    'icon'      =>  'dns',
]);


# Add Dashboard Widgets
$this->parent->options->add_field([
    'id'            =>  'add_widgets',
    'section'       =>  'general',
    'title'         =>  __('Dashboard Widgets', 'cora'),
    'type'          =>  'repeater',
    'description'   =>  __('Easily add custom dashboard widgets.', 'cora'),
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  __('Title', 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'    =>  'content',
            'title' =>  __('Content', 'cora'),
            'type'  =>  'editor',
        ],
    ],
    'new_item_default'  => [
        'title'         =>  __('Custom Widget', 'cora'),
        'content'       =>  ''
    ],
]);

# Footer Text
$this->parent->options->add_field([
    'id'            =>  'footer_text',
    'section'       =>  'general',
    'title'         =>  __('Footer Text', 'cora'),
    'type'          =>  'textarea',
    'default'       =>  __('Thank you for creating with WordPress.', 'cora')
]);

# Footer info
$this->parent->options->add_field([
    'id'            =>  'footer_info',
    'section'       =>  'general',
    'title'         =>  __('Footer Informations', 'cora'),
    'type'          =>  'switch',
    'description'   =>  __('Show useful informations about your WordPress Installation in footer.', 'cora'),
    'default'       =>  true
]);

# Screen Options
$this->parent->options->add_field([
    'id'            =>  'screen_options',
    'section'       =>  'general',
    'title'         =>  __('Screen Options', 'cora'),
    'type'          =>  'switch',
    'default'       =>  false
]);


# Admin Scripts
$this->parent->options->add_field([
    'id'            =>  'admin_scripts',
    'section'       =>  'general',
    'title'         =>  __('Admin Scripts', 'cora'),
    'description'   =>  __('This option allows you to add custom CSS & JS to the admin area.', 'cora'),
    'type'          =>  'repeater',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  __('Title', 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'type',
            'title'     =>  __('Type', 'cora'),
            'type'      =>  'select',
            'options'   =>  [
                [
                    'text'  =>  __('CSS', 'cora'),
                    'id'    =>  'css'
                ],
                [
                    'text'  =>  __('JS', 'cora'),
                    'id'    =>  'js'
                ]
            ]
        ],
        [
            'id'    =>  'content',
            'title' =>  __('Code', 'cora'),
            'type'  =>  'textarea',
            'placeholder' => __('Paste your code here.', 'cora')
        ],
    ],
    'new_item_default'  => [
        'title'         =>  __('Custom Script', 'cora'),
        'type'          =>  'css',
        'content'       =>  ''
    ],
]);

# frontend Scripts
$this->parent->options->add_field([
    'id'            =>  'frontend_scripts',
    'section'       =>  'general',
    'title'         =>  __('Front-end Scripts', 'cora'),
    'description'   =>  __('This option allows you to add custom CSS & JS on the front-end.', 'cora'),
    'type'          =>  'repeater',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  __('Title', 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'type',
            'title'     =>  __('Type', 'cora'),
            'type'      =>  'select',
            'options'   =>  [
                [
                    'text'  =>  __('CSS', 'cora'),
                    'id'    =>  'css'
                ],
                [
                    'text'  =>  __('JS', 'cora'),
                    'id'    =>  'js'
                ]
            ]
        ],
        [
            'id'            =>      'content',
            'title'         =>      __('Code', 'cora'),
            'type'          =>      'textarea',
            'placeholder'   =>      __('Paste your code here.', 'cora')
        ],
    ],
    'new_item_default'  => [
        'title'         =>  __('Custom Script', 'cora'),
        'type'          =>  'css',
        'content'       =>  ''
    ],
]);

# login Scripts
$this->parent->options->add_field([
    'id'            =>  'login_scripts',
    'section'       =>  'general',
    'title'         =>  __('Login Scripts', 'cora'),
    'description'   =>  __('This option allows you to add custom CSS & JS to the login area.', 'cora'),
    'type'          =>  'repeater',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  __('Title', 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'type',
            'title'     =>  __('Type', 'cora'),
            'type'      =>  'select',
            'options'   =>  [
                [
                    'text'  =>  __('CSS', 'cora'),
                    'id'    =>  'css'
                ],
                [
                    'text'  =>  __('JS', 'cora'),
                    'id'    =>  'js'
                ]
            ]
        ],
        [
            'id'            =>      'content',
            'title'         =>      __('Code', 'cora'),
            'type'          =>      'textarea',
            'placeholder'   =>      __('Paste your code here.', 'cora')
        ],
    ],
    'new_item_default'  => [
        'title'         =>  __('Custom Script', 'cora'),
        'type'          =>  'css',
        'content'       =>  ''
    ],
]);
