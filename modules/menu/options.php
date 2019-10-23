<?php
/**
 * Menu options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'menu',
    'title'     =>  esc_html__('Menu' , 'cora'),
    'icon'      =>  'sort',
]);

# Show Logo
$this->parent->options->add_field([
    'id'           =>  'show_logo',
    'section'      =>  'menu',
    'title'        =>   esc_html__('Show Logo' , 'cora'),
    'type'         =>   'switch',
    'default'      =>   true,
]);

# logo Type
$this->parent->options->add_field([
    'id'           =>  'logo_type',
    'section'      =>  'menu',
    'title'        =>   esc_html__('Logo Type' , 'cora'),
    'type'         =>   'select',
    'default'      =>   'site_name',
    'options'      =>   [
        [
            'id'    =>  'logo',
            'text'  =>  'Logo'
        ],
        [
            'id'    =>  'site_name',
            'text'  =>  'Site Name'
        ]
    ],
    'condition'    =>   ['show_logo', '===', true]
]);

# Menu Items
add_action('_admin_menu', function (){
    
    $this->parent->options->add_field([
        'id'        =>  'items',
        'section'   =>  'menu',
        'title'     =>  esc_html__('Menu Items' , 'cora'),
        'type'      =>  'repeater',
        'fields'    =>  [
            [
                'id'    =>  'title',
                'title' =>  esc_html__('Title' , 'cora'),
                'type'  =>  'text',
            ],
            [
                'id'    =>  'custom_icon',
                'title' =>  esc_html__('Icon' , 'cora'),
                'type'  =>  'icon',
            ],
            [
                'id'    =>  'type',
                'title' =>  esc_html__('Type' , 'cora'),
                'type'  =>  'select',
                'options' => [
                    [
                        'id' => 'link',
                        'text' => esc_html__('Link' , 'cora')
                    ],
                    [
                        'id' => 'page',
                        'text' => esc_html__('Page' , 'cora')
                    ]
                ],
                'condition' => ['type', '!==', 'default']
            ],
            [
                'id'    =>  'url',
                'title' =>  esc_html__('URL' , 'cora'),
                'type'  =>  'text',
                'condition' => ['type', '==', 'link']
            ],
            [
                'id'    =>  'page_content',
                'title' =>  esc_html__('Page Content' , 'cora'),
                'type'  =>  'editor',
                'condition' => ['type', '==', 'page']
            ],
            [
                'id'    =>  'hide_for',
                'title' =>  esc_html__('Hide For' , 'cora'),
                'type'  =>  'select',
                'options' => $this->get_roles(),
                'multiple' => true
            ]
        ],
        'default' =>  $this->get_menu_items(),
        'new_item_default'  => [
            'type'          =>  'link',
            'title'         =>  esc_html__('New Item', 'cora'),
            'custom_icon'   =>  'settings',
        ],
        'remove_condition' => ['type' , '!==' , 'default'],
        'remove_disabled_title' =>  esc_html__('Default items cannot be removed.', 'cora')
    ]);
}, PHP_INT_MAX);