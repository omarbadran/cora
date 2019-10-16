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
 * Plugin Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora {

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
     * Options framework instance.
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
    public function __construct() {

        # Define paths
        $this->dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
        $this->url = site_url( str_replace( str_replace( '\\', '/', ABSPATH ), '', $this->dir ) );


        # Options framework
        require_once $this->dir . 'includes/framework/framework.php';

        # Initialize options
        $this->options = new CoraFramework( array(
            'id'         => 'cora',
            'page_title' => esc_html__('Cora Settings' , 'cora'),
            'menu_title' => esc_html__('Cora' , 'cora'),
            'display_version' => 'v1.0.0'
        ));
        
        # Enqueue styles
        add_action( 'admin_enqueue_scripts', array( $this  , "styles" ) );
        add_action( 'login_enqueue_scripts', array( $this  , "styles" ) );

        # Enqueue scripts
        add_action( 'admin_enqueue_scripts', array( $this  , "scripts" ) );

        # Load modules
        foreach (['menu', 'login', 'dashboard', 'appearance', 'media', 'optimization'] as $module) {

            require_once $this->dir . "modules/$module/class.$module.php";

            $module_class = "Cora_$module"; 
            new $module_class($this->options);

        }
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

        # Settings page
        wp_enqueue_style( 
            'cora-settings',
            $this->url."/assets/css/settings.css"
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

}

# Fire
$CoraDashboard = new Cora();