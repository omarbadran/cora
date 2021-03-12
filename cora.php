<?php
/**
 * The plugin bootstrap file.
 *
 * @wordpress-plugin
 * Plugin Name:       Cora
 * Plugin URI:        http://plugincube.com
 * Description:       A clean and modern WordPress admin theme.
 * Version:           1.1.0
 * Author:            PluginCube
 * Author URI:        http://plugincube.com/
 * Text Domain:       cora
 * License:           GPLv3
 * 
 * 
 */

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


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
        # Require files
        require_once $this->dir("includes/framework/framework.php");

        # Load textdomain
        add_action( 'plugins_loaded', [$this, "load_textdomain"] );

        # Initialize cora framework
        $this->options = new CF([
            'id'                =>  'cora',
            'page_title'        =>  __('Cora Settings' , 'cora'),
            'menu_title'        =>  __('Cora' , 'cora'),
            'display_version'   =>  'v1.0.0'
        ]);

        # Enqueue styles
        add_action( 'admin_enqueue_scripts', [$this, "styles"] );

        # Enqueue scripts
        add_action( 'admin_enqueue_scripts', [$this, "scripts"] );

        # Load modules
        $this->load_modules();
        
        # Redirect after activation
        add_action('activated_plugin', function($plugin) {
            if( $plugin == plugin_basename( __FILE__ ) ) {
                exit( wp_redirect( admin_url( 'admin.php?page=cora' ) ) );
            }        
        });
    }

    /**
     * Plugin directory path.
     *
     * @since       1.0.0
     * @access      public
     * @return      string
     */
    public function dir ( $append = false ) {
        $dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );

        if ( $append ) {
            $dir .= $append;
        }

        return $this->clean_path($dir);
    }

    /**
     * Plugin directory url.
     *
     * @since       1.0.0
     * @access      public
     * @return      string
     */
    public function url ( $append = false ) {
        $url = site_url( str_replace( str_replace( '\\', '/', ABSPATH ), '', $this->dir() ) ) . '/';

        if ( $append ) {
            $url .= $append;
        }

        return $this->clean_path($url);
    }

    /**
     * Clean any path used in the file system.
     *
     * @since       1.0.0
     * @access      public
     * @return      string
     */
    public function clean_path ( $path ) {
        $path = str_replace( '', '', str_replace( array( "\\", "\\\\" ), '/', $path ) );
        
        if ( $path[ strlen( $path ) - 1 ] === '/' ) {
            $path = rtrim( $path, '/' );
        }

        return $path;
    }

    /**
     * Load Text Domain.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function load_textdomain () {
        load_plugin_textdomain( 'cora', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
     * Load Modules.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function load_modules () {
        $modules = [ 'general', 'menu', 'toolbar', 'theme', 'login', 'scripts', 'optimization', 'advanced' ];
        
        foreach ( $modules as $module ) {
            $path = $this->dir("modules/$module/module.php");

            if ( file_exists( $path ) ) {
                require_once $path;
                $module_class = "Cora_$module"; 
                new $module_class($this);
            }
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
            $this->url( "assets/vendor/material-icons/material-icons.css" )
        );

        # Menu icons
        wp_enqueue_style( 
            'cora-menu-icons',
            $this->url( "assets/css/menu-icons.css" )
        );

        # Settings page
        if ( $this->options->in_view() ) {
            wp_enqueue_style( 
                'cora-settings',
                $this->url( "assets/css/settings.css" )
            );
        }
        
        # Plugins Support
        wp_enqueue_style( 
            'cora-plugin-support',
            $this->url( "assets/css/plugin-support.css" )
        );
        
        # Main Style
        wp_enqueue_style( 
            'cora',
            $this->url( "assets/css/style.css" )
        );

        # RTL Support
        if ( is_rtl() ) {
            wp_enqueue_style( 
                'cora-rtl',
                $this->url( "assets/css/rtl.css" )
            );
        }
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
        wp_enqueue_script( 'cora', $this->url( "assets/js/app.min.js" ) );
    }
    
}

# Fire
$CoraDashboard = new Cora();
