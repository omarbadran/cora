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
    'title'     =>  __('Toolbar' , 'cora'),
    'icon'      =>  'layers',
]);

# Add Items
$this->parent->options->add_field([
    'id'            =>  'add_items',
    'section'       =>  'toolbar',
    'title'         =>  __('Add Items' , 'cora'),
    'type'          =>  'repeater',
    'fields'        =>  [
        [
            'id'        =>  'title',
            'title'     =>  __('Title' , 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'href',
            'title'     =>  __('URL' , 'cora'),
            'type'      =>  'text',
        ],
        [
            'id'        =>  'new_tab',
            'section'   =>  'toolbar',
            'title'     =>  __('Open In New Tab ?' , 'cora'),
            'type'      =>  'switch',
            'default'   =>  false
        ],
    ],
    'new_item_default'  => [
        'title'         =>  __('New Item', 'cora'),
        'href'          =>  'http://',
        'new_tab'       =>  true,
    ],
    'description'  =>   __('Add custom links to the admin toolbar. note that links will also be displayed in the fron-end if the admin toolbar is being rendered.', 'cora'),
]);

# WP Logo
$this->parent->options->add_field([
    'id'        =>  'wp_logo',
    'section'   =>  'toolbar',
    'title'     =>  __('WP Logo', 'cora'),
    'type'      =>  'switch',
    'default'   =>  false,
    'description'  =>   __('show/hide the wordpress logo.', 'cora'),
]);

# Site Name
$this->parent->options->add_field([
    'id'        =>  'site_name',
    'section'   =>  'toolbar',
    'title'     =>  __('Site Name', 'cora'),
    'type'      =>  'switch',
    'default'   =>  true,
    'description'  =>   __('show/hide the site link.', 'cora'),
]);

# Updates
$this->parent->options->add_field([
    'id'        =>  'updates',
    'section'   =>  'toolbar',
    'title'     =>  __('Updates', 'cora'),
    'type'      =>  'switch',
    'default'   =>  true,
    'description'  =>   __('show/hide pending updates item.', 'cora'),
]);

# Comments
$this->parent->options->add_field([
    'id'        =>  'comments',
    'section'   =>  'toolbar',
    'title'     =>  __('Comments', 'cora'),
    'type'      =>  'switch',
    'default'   =>  true,
    'description'  =>   __('show/hide comments item.', 'cora'),
]);

# New Content
$this->parent->options->add_field([
    'id'        =>  'new_content',
    'section'   =>  'toolbar',
    'title'     =>  __('New Content', 'cora'),
    'type'      =>  'switch',
    'default'   =>  true,
    'description'  =>   __('show/hide the new-content item.', 'cora'),
]);

# My Account
$this->parent->options->add_field([
    'id'        =>  'my_account',
    'section'   =>  'toolbar',
    'title'     =>  __('My Account', 'cora'),
    'type'      =>  'switch',
    'default'   =>  true,
    'description'  =>   __('show/hide user profile box.', 'cora'),
]);
