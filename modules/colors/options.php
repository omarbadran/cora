<?php
/**
 * Colors options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->options->add_section([
    'id'        =>  'colors',
    'title'     =>  esc_html__('Colors' , 'cora'),
    'icon'      =>  'invert_colors',
]);


$this->options->add_field([
    'id'        =>  'menu_background',
    'section'   =>  'colors',
    'title'     =>  'Background',
    'type'      =>  'color',
    'default'   =>  '#363C43'
]);

$this->options->add_field([
    'id'        =>  'menu_item_text',
    'section'   =>  'colors',
    'title'     =>  'Item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.2)'
]);

$this->options->add_field([
    'id'        =>  'menu_highlight_text',
    'section'   =>  'colors',
    'title'     =>  'Item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->options->add_field([
    'id'        =>  'menu_highlight_background',
    'section'   =>  'colors',
    'title'     =>  'Item background (Highlight)',
    'type'      =>  'color',
    'default'   =>  '#02B875'
]);
