<?php
/**
 * Optimization options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->options->add_section([
    'id'        =>  'optimization',
    'title'     =>  esc_html__('Optimization' , 'cora'),
    'icon'      =>  'memory',
]);

# WP Version Meta-Tag
$this->options->add_field([
    'id'            =>  'wp_version_meta_tag',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP Version Meta-Tag' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP Emoji
$this->options->add_field([
    'id'            =>  'wp_emoji',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP Emoji' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP RSS Feed
$this->options->add_field([
    'id'            =>  'rss_feed',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('RSS Feed' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP RSD
$this->options->add_field([
    'id'            =>  'wp_rsd',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP RSD' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP Wlwmanifest
$this->options->add_field([
    'id'            =>  'wp_wlwmanifest',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP Wlwmanifest' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP Shortlink
$this->options->add_field([
    'id'            =>  'wp_shortlink',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP Shortlink' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP REST API
$this->options->add_field([
    'id'            =>  'wp_rest_api',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP REST API' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP oEmbed
$this->options->add_field([
    'id'            =>  'wp_oEmbed',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP oEmbed' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP XML-RPC / X-Pingback
$this->options->add_field([
    'id'            =>  'wp_pingback',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP XML-RPC / X-Pingback' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP Heartbeat
$this->options->add_field([
    'id'            =>  'wp_heartbeat',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP Heartbeat' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);

# WP Rel Links
$this->options->add_field([
    'id'            =>  'wp_rel_links',
    'section'       =>  'optimization',
    'title'         =>  esc_html__('WP Rel Links' , 'cora'),
    'type'          =>  'switch',
    'default'       =>  true,
]);