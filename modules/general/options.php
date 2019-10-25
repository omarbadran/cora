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

$this->parent->options->add_field([
    'id'            =>  'footer_info',
    'section'       =>  'general',
    'title'         =>  esc_html__('Footer Extra Informations' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
    'description'   =>  'Show useful informations about your WordPress Installation in footer.'
]);