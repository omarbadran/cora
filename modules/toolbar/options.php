<?php
/**
 * Toolbar options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'toolbar',
    'title'     =>  esc_html__('Toolbar' , 'cora'),
    'icon'      =>  'layers',
]);

# Add Items
$this->parent->options->add_field([
    'id'            =>  'add_items',
    'section'       =>  'toolbar',
    'title'         =>  esc_html__('Add Items' , 'cora'),
    'type'          =>  'repeater',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  esc_html__('title' , 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'href',
            'title'     =>  esc_html__('URL' , 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'new_tab',
            'section'   =>  'toolbar',
            'title'     =>  esc_html__('Open link in new tab ?' , 'cora'),
            'type'      =>  'switch',
            'default'   =>  false
        ],
    ],
    'new_item_default'  => [
        'title'         =>  esc_html__('New Item', 'cora'),
        'href'           =>  'http://'
    ],
]);

# WP Logo
$this->parent->options->add_field([
    'id'        =>  'wp_logo',
    'section'   =>  'toolbar',
    'title'     =>  'WP Logo',
    'type'      =>  'switch',
    'default'   =>  true,
]);

# Site Name
$this->parent->options->add_field([
    'id'        =>  'site_name',
    'section'   =>  'toolbar',
    'title'     =>  'Site Name',
    'type'      =>  'switch',
    'default'   =>  true,
]);

# Updates
$this->parent->options->add_field([
    'id'        =>  'updates',
    'section'   =>  'toolbar',
    'title'     =>  'Updates',
    'type'      =>  'switch',
    'default'   =>  true,
]);

# Comments
$this->parent->options->add_field([
    'id'        =>  'comments',
    'section'   =>  'toolbar',
    'title'     =>  'Comments',
    'type'      =>  'switch',
    'default'   =>  true,
]);

# New Content
$this->parent->options->add_field([
    'id'        =>  'new_content',
    'section'   =>  'toolbar',
    'title'     =>  'New Content',
    'type'      =>  'switch',
    'default'   =>  true,
]);

# My Account
$this->parent->options->add_field([
    'id'        =>  'my_account',
    'section'   =>  'toolbar',
    'title'     =>  'My Account',
    'type'      =>  'switch',
    'default'   =>  true,
]);
