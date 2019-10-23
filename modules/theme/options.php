<?php
/**
 * Theme options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'theme',
    'title'     =>  esc_html__('Theme' , 'cora'),
    'icon'      =>  'invert_colors',
]);


# General

$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('General' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_background_color',
    'section'   =>  'theme',
    'title'     =>  'Primary background',
    'type'      =>  'color',
    'default'   =>  '#383f4a'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_background_color',
    'section'   =>  'theme',
    'title'     =>  'Secondary background',
    'type'      =>  'color',
    'default'   =>  '#424b56'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_text_color',
    'section'   =>  'theme',
    'title'     =>  'Primary text',
    'type'      =>  'color',
    'default'   =>  '#ffffff'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_text_color',
    'section'   =>  'theme',
    'title'     =>  'Secondary text',
    'type'      =>  'color',
    'default'   =>  '#f7f0f0'
]);

$this->parent->options->add_field([
    'id'        =>  'link_color',
    'section'   =>  'theme',
    'title'     =>  'Links',
    'type'      =>  'color',
    'default'   =>  '#6c8fc3'
]);



# Menu Colors

$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('Admin Menu' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_background',
    'section'   =>  'theme',
    'title'     =>  'Background',
    'type'      =>  'color',
    'default'   =>  '#333b46'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_item_text',
    'section'   =>  'theme',
    'title'     =>  'Item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.15)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_highlight_text',
    'section'   =>  'theme',
    'title'     =>  'Item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_highlight_background',
    'section'   =>  'theme',
    'title'     =>  'Item background (Highlight)',
    'type'      =>  'color',
    'default'   =>  '#02B875'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_background',
    'section'   =>  'theme',
    'title'     =>  'Submenu background',
    'type'      =>  'color',
    'default'   =>  'rgb(56, 63, 74)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_item_text',
    'section'   =>  'theme',
    'title'     =>  'Submenu item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.2)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_highlight_text',
    'section'   =>  'theme',
    'title'     =>  'Submenu item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_logo_text',
    'section'   =>  'theme',
    'title'     =>  'Logo Text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

# Toolbar Colors

$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('Toolbar' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_background',
    'section'   =>  'theme',
    'title'     =>  'Toolbar background',
    'type'      =>  'color',
    'default'   =>  '#383f4a'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_item_text',
    'section'   =>  'theme',
    'title'     =>  'Item text',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.4)'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_highlight_text',
    'section'   =>  'theme',
    'title'     =>  'Item text (Highlight)',
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_highlight_background',
    'section'   =>  'theme',
    'title'     =>  'Item background (Highlight)',
    'type'      =>  'color',
    'default'   =>  '#2c333e'
]);

# Buttons

$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('Buttons' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_button_color',
    'section'   =>  'theme',
    'title'     =>  'Primary Button Color',
    'type'      =>  'color',
    'default'   =>  '#02B875'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_button_text',
    'section'   =>  'theme',
    'title'     =>  'Primary Button Text',
    'type'      =>  'color',
    'default'   =>  '#ffffff'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_button_color',
    'section'   =>  'theme',
    'title'     =>  'Secondary Button Color',
    'type'      =>  'color',
    'default'   =>  '#434d5d'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_button_text',
    'section'   =>  'theme',
    'title'     =>  'Secondary Button Text',
    'type'      =>  'color',
    'default'   =>  '#f1ecec'
]);


# Forms

$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . esc_html__('Forms' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'forms_field_background',
    'section'   =>  'theme',
    'title'     =>  'Control field background',
    'type'      =>  'color',
    'default'   =>  'rgba(62, 68, 80, 1)'
]);

$this->parent->options->add_field([
    'id'        =>  'forms_field_border',
    'section'   =>  'theme',
    'title'     =>  'Control field border',
    'type'      =>  'color',
    'default'   =>  'rgba(62, 68, 80, 1)'
]);
