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
    'title'     =>  esc_html__('General' , 'cora'),
    'icon'      =>  'dns',
]);

# Logo
$this->parent->options->add_field([
    'id'            =>  'logo',
    'section'       =>  'general',
    'title'         =>  esc_html__('Logo' , 'cora'),
    'type'          =>  'image',
    'description'   =>  'Upload your logo here, will be used in the admin area & login page.',
    'default'       =>  'https://s.w.org/style/images/about/WordPress-logotype-wmark.png'
]);


# Add Dashboard Widgets
$this->parent->options->add_field([
    'id'            =>  'add_widgets',
    'section'       =>  'general',
    'title'         =>  esc_html__('Dashboard Widgets' , 'cora'),
    'type'          =>  'repeater',
    'description'   =>  'Easily add custom dashboard widgets.',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  esc_html__('Title' , 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'    =>  'content',
            'title' =>  esc_html__('Content' , 'cora'),
            'type'  =>  'editor',
        ],
    ],
    'new_item_default'  => [
        'title'         =>  esc_html__('Custom Widget', 'cora'),
        'content'       =>  ''
    ],
]);

# Footer Text
$this->parent->options->add_field([
    'id'            =>  'footer_text',
    'section'       =>  'general',
    'title'         =>  esc_html__('Footer Text' , 'cora'),
    'type'          =>  'textarea',
    'default'       =>  'Thank you for creating with WordPress.'
]);

# Footer info
$this->parent->options->add_field([
    'id'            =>  'footer_info',
    'section'       =>  'general',
    'title'         =>  esc_html__('Footer Informations' , 'cora'),
    'type'          =>  'switch',
    'description'   =>  'Show useful informations about your WordPress Installation in footer.',
    'default'       =>  true
]);

# Admin Scripts
$this->parent->options->add_field([
    'id'            =>  'admin_scripts',
    'section'       =>  'general',
    'title'         =>  esc_html__('Admin Scripts' , 'cora'),
    'description'   =>  'This option allows you to add custom CSS & JS to the admin area.',
    'type'          =>  'repeater',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  esc_html__('Title' , 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'type',
            'title'     =>  esc_html__('Type' , 'cora'),
            'type'      =>  'select',
            'options'   =>  [
                [
                    'text'  =>  'CSS',
                    'id'    =>  'css'
                ],
                [
                    'text'  =>  'JS',
                    'id'    =>  'js'
                ]
            ]
        ],
        [
            'id'    =>  'content',
            'title' =>  esc_html__('Code' , 'cora'),
            'type'  =>  'textarea',
            'placeholder' => 'Paste your code here.'
        ],
    ],
    'new_item_default'  => [
        'title'         =>  esc_html__('Custom Script', 'cora'),
        'type'          =>  'css',
        'content'       =>  ''
    ],
]);

# frontend Scripts
$this->parent->options->add_field([
    'id'            =>  'frontend_scripts',
    'section'       =>  'general',
    'title'         =>  esc_html__('Front-end Scripts' , 'cora'),
    'description'   =>  'This option allows you to add custom CSS & JS on the front-end.',
    'type'          =>  'repeater',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  esc_html__('Title' , 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'type',
            'title'     =>  esc_html__('Type' , 'cora'),
            'type'      =>  'select',
            'options'   =>  [
                [
                    'text'  =>  'CSS',
                    'id'    =>  'css'
                ],
                [
                    'text'  =>  'JS',
                    'id'    =>  'js'
                ]
            ]
        ],
        [
            'id'    =>  'content',
            'title' =>  esc_html__('Code' , 'cora'),
            'type'  =>  'textarea',
            'placeholder' => 'Paste your code here.'
        ],
    ],
    'new_item_default'  => [
        'title'         =>  esc_html__('Custom Script', 'cora'),
        'type'          =>  'css',
        'content'       =>  ''
    ],
]);

# login Scripts
$this->parent->options->add_field([
    'id'            =>  'login_scripts',
    'section'       =>  'general',
    'title'         =>  esc_html__('Login Scripts' , 'cora'),
    'description'   =>  'This option allows you to add custom CSS & JS to the login area.',
    'type'          =>  'repeater',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  esc_html__('Title' , 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'type',
            'title'     =>  esc_html__('Type' , 'cora'),
            'type'      =>  'select',
            'options'   =>  [
                [
                    'text'  =>  'CSS',
                    'id'    =>  'css'
                ],
                [
                    'text'  =>  'JS',
                    'id'    =>  'js'
                ]
            ]
        ],
        [
            'id'    =>  'content',
            'title' =>  esc_html__('Code' , 'cora'),
            'type'  =>  'textarea',
            'placeholder' => 'Paste your code here.'
        ],
    ],
    'new_item_default'  => [
        'title'         =>  esc_html__('Custom Script', 'cora'),
        'type'          =>  'css',
        'content'       =>  ''
    ],
]);
