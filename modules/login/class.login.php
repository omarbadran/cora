<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Login Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Login {
    
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
        
        # Define paths
        $this->dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
        $this->url = site_url( str_replace( str_replace( '\\', '/', ABSPATH ), '', $this->dir ) );
        
        # Enqueu assets
        add_action( 'login_enqueue_scripts', array( $this->parent, "styles" ) );
        add_action( 'login_enqueue_scripts', array( $this, "scripts" ) );


        add_filter( 'login_body_class', array( $this  , "body_class" ) );
        add_action( 'login_enqueue_scripts', array( $this  , "vars" ) );

        require_once dirname(__FILE__) . "/options.php";

    }

    /**
     * Enqueue scripts.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function scripts() {
        
        wp_enqueue_script('jquery');

        # Cora
        wp_enqueue_script( 
            'cora',
            $this->url."/assets/js/login.js"
        );
        
    }

    /**
     * Body class.
     *
     * @since       1.0.0
     * @access      public
     * @return      array
     */
    public function body_class ($classes) {
        
        $layout = $this->parent->options->get_value('login', 'layout', 'standard');
        $classes[] = 'cora-' . $layout;
        
        return $classes;
    
    }

    /**
     * Inject css vars.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function vars () {

        extract($this->parent->options->get_values()['login']);

        $hide_logo = $hide_logo == 'true' ? 'none' : 'block';        
        $backgroud_image = $backgroud_type == 'image' ? $backgroud_image : '';
        
        echo "
            <style type='text/css'> 
                :root { 
                    --login_logo: $logo;
                    --hide_logo: $hide_logo;
                    --backgroud_image: url($backgroud_image);
                }
            </style>
        ";

    }

}