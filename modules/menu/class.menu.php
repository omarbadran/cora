<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Menu Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Menu {
    
    /**
     * Options framework class.
     *
     * @since       1.0.0
     * @access      public
     * @var         object
     */
    public $options;

    /**
     * Class constructor.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function __construct( $parent ) {
        
        # Load Options
        $this->parent = $parent;

        require_once dirname(__FILE__) . "/options.php";

        # Build menu
        
        add_action( 'admin_menu', array( $this  , "build_menu" ), PHP_INT_MAX );
        
        add_filter( 'gettext', array( $this  , "collapse_menu_text" ), 10, 3 );

        add_filter( 'adminmenu', array( $this  , "branding" ) );

    }


    /**
     * Build Menu.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function build_menu() {

        global $menu, $admin_page_hooks, $_registered_pages, $_parent_pages;

        $items = $this->parent->options->get_value('menu', 'items', []);
        $before_edit = $this->get_menu_items();
        

        # Detect if new items were added, maybe the user installed a new plugin?
        if($before_edit !== $items){
            $should_update = true;

            # Add new items
            foreach ($before_edit as $key => $item) {
                if (! in_array( $item['info'], array_column($items, 'info') ) ) {
                    $items[] = $item;
                }
            }
        }

        
        # Removed items missing items    
        foreach ($items as $item) {
            if ( $item['type'] == 'default' && ! in_array($item['info'], array_column($before_edit, 'info') ) ) {
                unset($item);
            }
        }

        # Update the value if new items detected        
        if($should_update){
            $this->parent->options->update_value('menu', 'items', array_values($items));
        }
        
        # Build the menu
        foreach ( $items as $value ) {
            extract( $value );

            # Check user role first
            if ( isset($hide_for) && in_array( wp_get_current_user()->roles[0], (array) $hide_for)) {
                continue;
            }

            # Default item
            if ( $type == 'default' ){
                $item = $value['info'];
                $item[0] = $title;
            }
            
            # Link item
            if ( $type == 'link' ) {
                $url = isset($url) ? $url : '#';
                $item = [$title, 'read', $url, $title, 'menu-top menu-top-first', ''];
            }
            
            # Page item
            if ( $type == 'page' ) {

                $menu_slug = plugin_basename( sanitize_title( $title ) );
                $admin_page_hooks[ $menu_slug ] = sanitize_title( $title );
                $hookname = get_plugin_page_hookname( $menu_slug, '' );

                add_action( $hookname, function() use($page_content) {
                    echo
                        "<div class='wrap'>
                            <h1>Dashboard</h1>
                            $page_content
                        </div>";
                });
                
                $item = [$title, 'read', $menu_slug, $title, 'menu-top menu-top-first', $hookname];

                $_registered_pages[ $hookname ] = true;
            }
            
            # Custom Icon
            if ( isset($value['custom_icon']) ) {
                $item[6] = 'dashicons-cora-' . $value['custom_icon'];
            }

            # Add the item
            $res[] = $item;
        }

        # Change
        $menu = $res;
    }

    /**
     * Get an array current menu items to be used in the repeater field.
     *
     * @since       1.0.0
     * @access      public
     * @return      array
     */
    public function get_menu_items() {

        global $menu;

        $menu = array_filter($menu, function($v){
            return strpos( $v[4], 'wp-menu-separator' ) === false;
        });

        array_walk($menu, function(&$item){
            $item[0] = preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $item[0]);
        });

        $res = array_map(function($item) {
            return [
                'type'      =>   'default',
                'title'     =>   $item[0],
                'info'      =>   $item,
            ];
        }, $menu);

        ksort($res);

        return array_values($res);

    }

    /**
     * Get an array current menu items to be used in the repeater field.
     *
     * @since       1.0.0
     * @access      public
     * @return      array
     */
    public function get_roles() {

        if ( ! function_exists( 'get_editable_roles' ) ) {
            require_once ABSPATH . 'wp-admin/includes/user.php';
        }
        
        $editable_roles = get_editable_roles();

        foreach ($editable_roles as $role => $details) {
            $sub['id'] = esc_attr($role);
            $sub['text'] = translate_user_role($details['name']);
            
            $roles[] = $sub;
        }

        return $roles;

    }

    /**
     * Change 'Collapse menu' text.
     *
     * @since       1.0.0
     * @access      public
     * @return      array
     */
    public function collapse_menu_text($translated, $original, $domain) {

        if ($original == 'Collapse menu'){
            return 'Hide navigation'; 
        }

        return $translated;

    }

    /**
     * Branding.
     *
     * @since       1.0.0
     * @access      public
     * @return      array
     */
    public function branding() {

        $name = get_bloginfo();

        echo "<li class='cora-branding'>$name</li>";

    }


}