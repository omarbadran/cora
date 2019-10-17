<?php
/**
 * Appearance options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'appearance',
    'title'     =>  esc_html__('Appearance' , 'cora'),
    'icon'      =>  'invert_colors',
]);


# General

$this->parent->options->add_field([
    'section'   =>  'appearance',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('General' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_background_color',
    'section'   =>  'appearance',
    'title'     =>  'Primary background',
    'type'      =>  'color',
    'default'   =>  '#383f4a'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_background_color',
    'section'   =>  'appearance',
    'title'     =>  'Secondary background',
    'type'      =>  'color',
    'default'   =>  '#424b56'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_text_color',
    'section'   =>  'appearance',
    'title'     =>  'Primary text',
    'type'      =>  'color',
    'default'   =>  '#ffffff'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_text_color',
    'section'   =>  'appearance',
    'title'     =>  'Secondary text',
    'type'      =>  'color',
    'default'   =>  '#f7f0f0'
]);

$this->parent->options->add_field([
    'id'        =>  'link_color',
    'section'   =>  'appearance',
    'title'     =>  'Links',
    'type'      =>  'color',
    'default'   =>  '#6c8fc3'
]);



# Menu Colors

$this->parent->options->add_field([
    'section'   =>  'appearance',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('Admin Menu' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_background',
    'section'   =>  'appearance',
    'title'     =>  'Background',
    'type'      =>  'color',
    'default'   =>  '#313742'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_item_text',
    'section'   =>  'appearance',
    'title'     =>  'Item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.2)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_highlight_text',
    'section'   =>  'appearance',
    'title'     =>  'Item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_highlight_background',
    'section'   =>  'appearance',
    'title'     =>  'Item background (Highlight)',
    'type'      =>  'color',
    'default'   =>  '#02B875'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_background',
    'section'   =>  'appearance',
    'title'     =>  'Submenu background',
    'type'      =>  'color',
    'default'   =>  'rgb(66, 74, 86)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_item_text',
    'section'   =>  'appearance',
    'title'     =>  'Submenu item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.2)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_highlight_text',
    'section'   =>  'appearance',
    'title'     =>  'Submenu item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);



# Toolbar Colors

$this->parent->options->add_field([
    'section'   =>  'appearance',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('Toolbar' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_background',
    'section'   =>  'appearance',
    'title'     =>  'Toolbar background',
    'type'      =>  'color',
    'default'   =>  '#383f4a'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_item_text',
    'section'   =>  'appearance',
    'title'     =>  'Item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.4)'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_highlight_text',
    'section'   =>  'appearance',
    'title'     =>  'Item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_highlight_background',
    'section'   =>  'appearance',
    'title'     =>  'Item background (Highlight)',
    'type'      =>  'color',
    'default'   =>  '#2c333e'
]);


# Forms Colors

$this->parent->options->add_field([
    'section'   =>  'appearance',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('Forms' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'forms_field_background',
    'section'   =>  'appearance',
    'title'     =>  'Control field background',
    'type'      =>  'color',
    'default'   =>  'rgba(62, 68, 80, 1)'
]);

$this->parent->options->add_field([
    'id'        =>  'forms_field_border',
    'section'   =>  'appearance',
    'title'     =>  'Control field border',
    'type'      =>  'color',
    'default'   =>  'rgba(62, 68, 80, 1)'
]);
