<?php
/**
 * The plugin bootstrap file
 *
 * @wordpress-plugin
 * Plugin Name:       Cora
 * Plugin URI:        http://coradashboard.com
 * Description:       Modern wordpress admin theme.
 * Version:           1.0.0
 * Author:            Cora
 * Author URI:        http://coradashboard.com/
 * Text Domain:       cora
 * License:           GPLv3
 * 
 * @fs_premium_only /modules-premium/
 * 
 */

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

# Load Freemius
// require_once dirname(__FILE__) . '/freemius.php';


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

        # Options framework
        require_once $this->dir("includes/framework/Framework.php");

        # Initialize options
        $this->options = new CoraFramework( [
            'id'         => 'cora',
            'page_title' => esc_html__('Cora Settings' , 'cora'),
            'menu_title' => esc_html__('Cora' , 'cora'),
            'display_version' => 'v1.0.0'
        ]);
        
        # Enqueue styles
        add_action( 'admin_enqueue_scripts', [ $this  , "styles" ] );

        # Enqueue scripts
        add_action( 'admin_enqueue_scripts', [ $this  , "scripts" ] );

        # Load Modules
        $this->load_modules();

    }

    /**
     * Plugin directory path.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
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
     * @return      void
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
     * @return      void
     */
    public function clean_path ( $path ) {
        $path = str_replace( '', '', str_replace( array( "\\", "\\\\" ), '/', $path ) );
        
        if ( $path[ strlen( $path ) - 1 ] === '/' ) {
            $path = rtrim( $path, '/' );
        }

        return $path;
    }

    /**
     * Load Modules.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function load_modules () {

        /**
         *  $modules = [module => premium_available]
         */
        $modules = [
            'general'           =>    false,
            'menu'              =>    false,
            'toolbar'           =>    false,
            'theme'             =>    true,
            'login'             =>    true,
            'scripts'           =>    true,
            'optimization'      =>    false,
            'advanced'          =>    false,
        ];
        
        foreach ( $modules as $module => $premium_available ) {

            $path = $this->dir("modules/$module/module.php");

            # Handling Licensing
            if ( 
                $premium_available //&& cora_fs()->is_premium() && cora_fs()->can_use_premium_code()
             ){
                $path = $this->dir("modules-premium/$module/module.php");
            }

            # Load Module
            if ( file_exists($path) ) {
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
            'cora-woocommerce',
            $this->url( "assets/css/plugin-support.css" )
        );
        
        # Cora
        wp_enqueue_style( 
            'cora',
            $this->url( "assets/css/style.css" )
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
        wp_enqueue_script( 'cora', $this->url( "assets/js/app.min.js" ) );
        
    }

    /**
     * Render a promotion block.
     *
     * @since       1.0.0
     * @access      public
     * @return      string
     */
    public function promotion_block ($title, $message, $class = 'cora-go-premium') {

        $upgrade_url    = cora_fs()->get_upgrade_url();
        $trial_url      = cora_fs()->get_trial_url();
        
        $upgrade_txt    =  __('Upgrade', 'cora');
        $trial_txt      =  __('14-day Free Trial', 'cora');

        $block  =
            "<div class='$class'>
                <h2>$title</h2>
                <p>$message</p>
                <div class='cora-actions'>
                    <a href='$upgrade_url' class='button button-small button-primary'>$upgrade_txt</a>
                    <a href='$trial_url' class='button button-small'>$trial_txt</a>
                </div>
            </div>";

        return $block;
    
    }


}

# Fire
$CoraDashboard = new Cora();