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


# Title
$this->parent->options->add_field([
    'id'           =>  'title',
    'section'      =>  'login',
    'title'        =>   esc_html__('Title' , 'cora'),
    'type'         =>   'text',
    'default'      =>   '',
    'condition'    =>   ['layout', '===', 'modern'],
]);


# Description
$this->parent->options->add_field([
    'id'           =>  'description',
    'section'      =>  'login',
    'title'        =>   esc_html__('Description' , 'cora'),
    'type'         =>   'editor',
    'default'      =>   '',
    'condition'    =>   ['layout', '===', 'modern'],
]);


# Background Type
$this->parent->options->add_field([
    'id'           =>  'background_type',
    'section'      =>  'login',
    'title'        =>   esc_html__('Background Type' , 'cora'),
    'type'         =>   'select',
    'default'      =>   'default',
    'options'      =>   [
        [
            'id'    =>  'default',
            'text'  =>  'Default'
        ],
        [
            'id'    =>  'image',
            'text'  =>  'Image'
        ]
    ]
]);


# Background Image
$this->parent->options->add_field([
    'id'           =>  'background_image',
    'section'      =>  'login',
    'title'        =>   esc_html__('Background Image' , 'cora'),
    'type'         =>   'image',
    'default'      =>   'https://images.unsplash.com/photo-1541253768886-47a2cef5e09e?w=1567',
    'condition'    =>   ['background_type', '==', 'image']
]);


# Show Logo
$this->parent->options->add_field([
    'id'           =>  'show_logo',
    'section'      =>  'login',
    'title'        =>   esc_html__('Show Logo' , 'cora'),
    'type'         =>   'switch',
    'default'      =>   false,
]);


# logo Type
$this->parent->options->add_field([
    'id'           =>  'logo_type',
    'section'      =>  'login',
    'title'        =>   esc_html__('Logo Type' , 'cora'),
    'type'         =>   'select',
    'default'      =>   'image',
    'options'      =>   [
        [
            'id'    =>  'image',
            'text'  =>  'Image'
        ],
        [
            'id'    =>  'text',
            'text'  =>  'Text'
        ]
    ],
    'condition'    =>   ['show_logo', '===', true]
]);


# Logo URL
$this->parent->options->add_field([
    'id'           =>  'logo_url',
    'section'      =>  'login',
    'title'        =>   esc_html__('Logo URL' , 'cora'),
    'type'         =>   'image',
    'default'      =>   $this->url . 'assets/images/wordpress-logo.svg',
    'condition'    =>   [
        ['show_logo', '===', true],
        ['logo_type', '==', 'image']
    ]
]);


# Logo text
$this->parent->options->add_field([
    'id'           =>  'logo_text',
    'section'      =>  'login',
    'title'        =>   esc_html__('Logo Text' , 'cora'),
    'type'         =>   'text',
    'default'      =>   get_bloginfo('name'),
    'condition'    =>   [
        ['show_logo', '===', true],
        ['logo_type', '==', 'text']
    ]
]);