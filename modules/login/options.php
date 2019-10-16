<?php
/**
 * Login options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->options->add_section([
    'id'        =>  'login',
    'title'     =>  esc_html__('Login Page' , 'cora'),
    'icon'      =>  'lock',
]);

# Layout
$this->options->add_field([
    'id'           =>  'layout',
    'section'      =>  'login',
    'title'        =>   esc_html__('Layout' , 'cora'),
    'type'         =>   'image-select',
    'default'      =>   'standard',
    'options'      =>   [
        [
            'text'  =>  'Standard',
            'id'    =>  'standard',
            'url'   =>  $this->url . 'assets/standard.png'
        ],
        [
            'text'  =>  'Modern',
            'id'    =>  'modern',
            'url'   =>  $this->url . 'assets/modern.png'
        ]
    ]
]);

# Logo
$this->options->add_field([
    'id'           =>  'logo',
    'section'      =>  'login',
    'title'        =>   esc_html__('Logo' , 'cora'),
    'type'         =>   'image',
    'default'      =>   $this->url . 'assets/wordpress-logo.svg',
]);
