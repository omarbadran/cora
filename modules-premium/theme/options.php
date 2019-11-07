<?php
/**
 * Theme options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'theme_premium',
    'title'     =>  __('Theme' , 'cora'),
    'icon'      =>  'color_lens',
]);


# Themes

$this->parent->options->add_field([
    'id'        =>  'themes',
    'section'   =>  'theme_premium',
    'type'      =>  'demo',
    'title'     =>  false,
    'options'   =>  [
        [
            'img'   =>  $this->parent->url("modules-premium/theme/themes/light/screenshot.png" ),
            'title' =>  __('Light', 'cora'),
            'data'  =>  json_decode( file_get_contents( $this->parent->dir("modules-premium/theme/themes/light/light.json") ), true )
        ],
        [
            'img'   =>  $this->parent->url("modules-premium/theme/themes/dark/screenshot.png" ),
            'title' =>  __('Dark', 'cora'),
            'data'  =>  json_decode( file_get_contents( $this->parent->dir("modules-premium/theme/themes/dark/dark.json") ), true )
        ]
    ]
]);


# Shadows

$this->parent->options->add_field([
    'section'   =>  'theme_premium',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . __('Shadows' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'shadows',
    'section'   =>  'theme_premium',
    'title'     =>  __('Shadows', 'cora'),
    'type'      =>  'switch',
    'default'   =>  true
]);


# General

$this->parent->options->add_field([
    'section'   =>  'theme_premium',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . __('General' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_background_color',
    'section'   =>  'theme_premium',
    'title'     =>  __('Primary Background', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#f5f5ff'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_background_color',
    'section'   =>  'theme_premium',
    'title'     =>  __('Secondary Background', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#ffffff'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_text_color',
    'section'   =>  'theme_premium',
    'title'     =>  __('Primary Text', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#5d5d65'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_text_color',
    'section'   =>  'theme_premium',
    'title'     =>  __('Secondary Text', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#737379'
]);

$this->parent->options->add_field([
    'id'        =>  'link_color',
    'section'   =>  'theme_premium',
    'title'     =>  __('Links', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#0073aa'
]);



# Menu Colors

$this->parent->options->add_field([
    'section'   =>  'theme_premium',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . __('Menu' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_background',
    'section'   =>  'theme_premium',
    'title'     =>  __('Background', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#242831'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_item_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Item Text', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.08)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_highlight_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Item Text - Highlight', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_highlight_background',
    'section'   =>  'theme_premium',
    'title'     =>  __('Item Background - Highlight', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#02B875'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_background',
    'section'   =>  'theme_premium',
    'title'     =>  __('Submenu Background', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#242831'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_item_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Submenu Item Text', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.15)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_submenu_highlight_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Submenu Item Text - Highlight', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

$this->parent->options->add_field([
    'id'        =>  'menu_logo_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Logo Text', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0.9)'
]);

# Toolbar Colors

$this->parent->options->add_field([
    'section'   =>  'theme_premium',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . __('Toolbar' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_background',
    'section'   =>  'theme_premium',
    'title'     =>  __('Toolbar Background', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#f5f5ff'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_item_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Item Text', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#696d7b'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_highlight_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Item Text - Highlight', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 1)'
]);

$this->parent->options->add_field([
    'id'        =>  'toolbar_highlight_background',
    'section'   =>  'theme_premium',
    'title'     =>  __('Item background - Highlight', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgb(91, 96, 107)'
]);

# Buttons

$this->parent->options->add_field([
    'section'   =>  'theme_premium',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . __('Buttons' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_button_color',
    'section'   =>  'theme_premium',
    'title'     =>  __('Primary Button Color', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#02B875'
]);

$this->parent->options->add_field([
    'id'        =>  'primary_button_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Primary Button Text', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#ffffff'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_button_color',
    'section'   =>  'theme_premium',
    'title'     =>  __('Secondary Button Color', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#dadbe0'
]);

$this->parent->options->add_field([
    'id'        =>  'secondary_button_text',
    'section'   =>  'theme_premium',
    'title'     =>  __('Secondary Button Text', 'cora'),
    'type'      =>  'color',
    'default'   =>  '#666'
]);


# Forms

$this->parent->options->add_field([
    'section'   =>  'theme_premium',
    'type'      =>  'html',
    'content'   =>  '<h3 class="cora-separator">' . __('Forms' , 'cora') . '</h3>'
]);

$this->parent->options->add_field([
    'id'        =>  'forms_field_background',
    'section'   =>  'theme_premium',
    'title'     =>  __('Control Field Background', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgba(255, 255, 255, 0)'
]);

$this->parent->options->add_field([
    'id'        =>  'forms_field_border',
    'section'   =>  'theme_premium',
    'title'     =>  __('Control Field Border', 'cora'),
    'type'      =>  'color',
    'default'   =>  'rgba(0, 0, 0, 0.075)'
]);