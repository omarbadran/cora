<?php
/**
 * Media options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'media',
    'title'     =>  esc_html__('Media' , 'cora'),
    'icon'      =>  'photo',
]);

# SVG Support
$this->parent->options->add_field([
    'id'            =>  'svg_support',
    'section'       =>  'media',
    'title'         =>  esc_html__('SVG Support' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# ICO Support
$this->parent->options->add_field([
    'id'            =>  'ico_support',
    'section'       =>  'media',
    'title'         =>  esc_html__('ICO Support' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);
