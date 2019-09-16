<?php
/**
 * Menu options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->options->add_section([
    'id'        =>  'menu',
    'title'     =>  esc_html__('Menu' , 'cora'),
    'icon'      =>  'sort',
]);

# Layout
$this->options->add_field([
    'id'           =>  'layout',
    'section'      =>  'menu',
    'title'        =>   esc_html__('Layout' , 'cora'),
    'type'         =>   'select',
    'default'      =>   'vertical',
    'options'      =>   [
        [
            'id'    => 'vertical',
            'text'  =>  esc_html__('Vertical' , 'cora')
        ],
        [
            'id'    => 'horizontal',
            'text'  =>  esc_html__('Horizontal' , 'cora')
        ],
    ]
]);

# Layout
$this->options->add_field([
    'id'           =>  'collapse_button',
    'section'      =>  'menu',
    'title'        =>   esc_html__('Collapse Button' , 'cora'),
    'type'         =>   'switch',
    'default'      =>   true,
    'condition'    =>   ['layout', '===', 'vertical']
]);


# Menu Items
add_action('_admin_menu', function (){
    
    $this->options->add_field([
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