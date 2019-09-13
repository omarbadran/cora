<?php
/**
 * The plugin bootstrap file
 *
 * @wordpress-plugin
 * Plugin Name:       Cora Dashboard
 * Plugin URI:        http://coradashboard.com
 * Description:       Modern wordpress admin theme.
 * Version:           1.0.0
 * Author:            Cora
 * Author URI:        http://coradashboard.com/
 * Text Domain:       cora
 * License:           GPLv3
 */

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

        
# DEV ONLY !
if(isset($_REQUEST['del'])){
    delete_option('cora');
}


/**
 * Main class.
 *
 *
 * @since  1.0.0
 *
 * @package  CoraDashboard
 * @access   public
 */
class CoraDashboard {

    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since       1.0.0
     * @access      public
     * @var         string
     */
    public $version = '1.0.0';

    /**
     * Plugin directory path.
     *
     * @since       1.0.0
     * @access      public
     * @var         string
     */
    public $dir;
    
    /**
     * Plugin directory url.
     *
     * @since       1.0.0
     * @access      public
     * @var         string
     */
    public $url;

    /**
     * Class constructor.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function __construct() {

        # Define paths
        $this->dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );

        $this->url = site_url( str_replace( str_replace( '\\', '/', ABSPATH ), '', $this->dir ) );

        # Helper Functions
        require_once $this->dir . 'includes/helpers.php';

        # Framework
        require_once $this->dir . 'includes/framework/framework.php';

        # Options
        require_once $this->dir . 'includes/options.php';

        # Enqueue styles
        add_action( 'admin_enqueue_scripts', array( $this  , "styles" ) );

        # Enqueue scripts
        add_action( 'admin_enqueue_scripts', array( $this  , "scripts" ) );

        # Build menu
        add_action( 'admin_menu', array( $this  , "build_menu" ), PHP_INT_MAX );

    }

    /**
     * Enqueue styles.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function styles() {

        # Material icons
        wp_enqueue_style( 
            'material-icons',
            $this->url."/assets/vendor/material-icons/material-icons.css"
        );

        # Menu icons
        wp_enqueue_style( 
            'cora-menu-icons',
            $this->url."/assets/css/menu-icons.css"
        );

        # Cora
        wp_enqueue_style( 
            'cora',
            $this->url."/assets/css/style.css"
        );

    }

    /**
     * Enqueue scripts.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function scripts() {

        # Cora
        wp_enqueue_script( 
            'cora',
            $this->url."/assets/js/app.min.js"
        );
        
    }

    /**
     * Build Menu.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function build_menu() {

        global $menu, $admin_page_hooks, $_registered_pages, $_parent_pages, $cora_options;

        $items = $cora_options->get_value('menu', 'items', []);
        $before_edit = cora_get_menu_items();
        

        # Detect if new items were added, maybe the user installed a new plugin?
        if($before_edit !== $items){
            $should_update = true;
        }

        # Add new items
        foreach ($before_edit as $key => $item) {
            if (! in_array( $item['info'], array_column($items, 'info') ) ) {
                $items[] = $item;
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
            $cora_options->update_value('menu', 'items', array_values($items));
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
            if ( isset($custom_icon) ) {
                $item[6] = 'dashicons-cora-' . $custom_icon;
            }

            # Add the item
            $res[] = $item;
        }

        # Change
        $menu = $res;
    }

}

# Fire
$CoraDashboard = new CoraDashboard();