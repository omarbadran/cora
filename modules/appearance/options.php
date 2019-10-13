<?php
/**
 * Appearance options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->options->add_section([
    'id'        =>  'appearance',
    'title'     =>  esc_html__('Appearance' , 'cora'),
    'icon'      =>  'invert_colors',
]);


// Menu Colors
$this->options->add_field([
    'id'        =>  'toolbar_background',
    'section'   =>  'appearance',
    'type'      =>  'html',
    'content'   =>  'hello <span>world</span>'
]);

$this->options->add_field([
    'id'        =>  'menu_background',
    'section'   =>  'appearance',
    'title'     =>  'Background',
    'type'      =>  'color',
    'default'   =>  '#404852'
]);

$this->options->add_field([
    'id'        =>  'menu_item_text',
    'section'   =>  'appearance',
    'title'     =>  'Item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.2)'
]);

$this->options->add_field([
    'id'        =>  'menu_highlight_text',
    'section'   =>  'appearance',
    'title'     =>  'Item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->options->add_field([
    'id'        =>  'menu_highlight_background',
    'section'   =>  'appearance',
    'title'     =>  'Item background (Highlight)',
    'type'      =>  'color',
    'default'   =>  '#02B875'
]);

$this->options->add_field([
    'id'        =>  'menu_submenu_background',
    'section'   =>  'appearance',
    'title'     =>  'Submenu background',
    'type'      =>  'color',
    'default'   =>  'rgb(83, 91, 102)'
]);

$this->options->add_field([
    'id'        =>  'menu_submenu_item_text',
    'section'   =>  'appearance',
    'title'     =>  'Submenu item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.2)'
]);

$this->options->add_field([
    'id'        =>  'menu_submenu_highlight_text',
    'section'   =>  'appearance',
    'title'     =>  'Submenu item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

// Toolbar Colors
$this->options->add_field([
    'id'        =>  'toolbar_background',
    'section'   =>  'appearance',
    'title'     =>  'Toolbar background',
    'type'      =>  'color',
    'default'   =>  '#4a525d'
]);

$this->options->add_field([
    'id'        =>  'toolbar_item_text',
    'section'   =>  'appearance',
    'title'     =>  'Item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.4)'
]);

$this->options->add_field([
    'id'        =>  'toolbar_highlight_text',
    'section'   =>  'appearance',
    'title'     =>  'Item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->options->add_field([
    'id'        =>  'toolbar_highlight_background',
    'section'   =>  'appearance',
    'title'     =>  'Item background (Highlight)',
    'type'      =>  'color',
    'default'   =>  '#404852'
]);