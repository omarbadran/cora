<?php
/**
 * Helper functions
 *
 *
 * @package      CoraDashboard
 * @author       Omar Badran
 */

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Get an array current menu items to be used in the repeater field.
 *  
 * @since 1.0.0
 * @global array $menu
 * @return array
 */
function cora_get_menu_items() {

    global $menu;

    # Remove Sepraters
    $menu = array_filter($menu, function($v){
        return strpos( $v[4], 'wp-menu-separator' ) === false;
    });

    # Remove HTML from item title
    array_walk($menu, function(&$item){
        $item[0] = preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $item[0]);
    });

    # Build array
    $res = array_map(function($item) {
        return [
            'type'      =>   'default',
            'title'     =>   $item[0],
            'info'      =>   $item,
        ];
    }, $menu);

    # Sort by key
    ksort($res);

    # Return
    return array_values($res);

};



/**
 * Get an array of registered roles.
 *  
 * @since 1.0.0
 * @return array
 */
function cora_get_roles() {

    # Load user.php if not loaded yet
    if ( ! function_exists( 'get_editable_roles' ) ) {
        require_once ABSPATH . 'wp-admin/includes/user.php';
    }
    
    # Get Roles List
    $editable_roles = get_editable_roles();

    # Build an array ready to use in select field
    foreach ($editable_roles as $role => $details) {
        $sub['id'] = esc_attr($role);
        $sub['text'] = translate_user_role($details['name']);
        
        $roles[] = $sub;
    }

    # Return
    return $roles;

};