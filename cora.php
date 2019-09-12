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
        
        # Enqueue styles
        add_action( 'admin_enqueue_scripts', array( $this  , "styles" ) );
        
        # Enqueue scripts
        add_action( 'admin_enqueue_scripts', array( $this  , "scripts" ) );

    }

    /**
     * Enqueue styles.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function styles() {

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
$CoraDashboard = new CoraDashboard();