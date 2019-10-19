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

# Add Section
$this->parent->options->add_field([
    'id'            =>  'widgets',
    'section'       =>  'general',
    'title'         =>  esc_html__('Dashboard Widgets' , 'cora'),
    'type'          =>  'repeater',
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
    ],
]);
