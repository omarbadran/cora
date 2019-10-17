<?php
/**
 * Login options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'login',
    'title'     =>  esc_html__('Login Page' , 'cora'),
    'icon'      =>  'lock',
]);

# Layout
$this->parent->options->add_field([
    'id'           =>  'layout',
    'section'      =>  'login',
    'title'        =>   esc_html__('Layout' , 'cora'),
    'type'         =>   'image-select',
    'default'      =>   'standard',
    'options'      =>   [
        [
            'text'  =>  'Standard',
            'id'    =>  'standard',
            'url'   =>  $this->url . 'assets/images/standard.png'
        ],
        [
            'text'  =>  'Modern',
            'id'    =>  'modern',
            'url'   =>  $this->url . 'assets/images/modern.png'
        ]
    ]
]);

# Backgroud Type
$this->parent->options->add_field([
    'id'           =>  'backgroud_type',
    'section'      =>  'login',
    'title'        =>   esc_html__('Backgroud Type' , 'cora'),
    'type'         =>   'select',
    'default'      =>   'solid',
    'options'      =>   [
        [
            'id'    =>  'solid',
            'text'  =>  'Solid'
        ],
        [
            'id'    =>  'image',
            'text'  =>  'Image'
        ]
    ]
]);

# Backgroud Image
$this->parent->options->add_field([
    'id'           =>  'backgroud_image',
    'section'      =>  'login',
    'title'        =>   esc_html__('Backgroud Image' , 'cora'),
    'type'         =>   'image',
    'default'      =>   'https://images.unsplash.com/photo-1541253768886-47a2cef5e09e?auto=format&fit=crop&w=1567&q=80',
    'condition'    =>   ['backgroud_type', '==', 'image']
]);

# Hide Logo
$this->parent->options->add_field([
    'id'           =>  'hide_logo',
    'section'      =>  'login',
    'title'        =>   esc_html__('Hide Logo' , 'cora'),
    'type'         =>   'switch',
    'default'      =>   true,
]);


# Logo
$this->parent->options->add_field([
    'id'           =>  'logo',
    'section'      =>  'login',
    'title'        =>   esc_html__('Logo' , 'cora'),
    'type'         =>   'image',
    'default'      =>   $this->url . 'assets/images/wordpress-logo.svg',
    'condition'    =>   ['hide_logo', '==', false]
]);
