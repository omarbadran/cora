<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Advanced Module
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Advanced {
    
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

        require_once $this->parent->dir("modules/advanced/options.php");
        
        # Schedule updates check.
        if( ! wp_next_scheduled( 'cora_check_updates' ) ) {  
            wp_schedule_event( time(), 'hourly', 'cora_check_updates' );
        }
        
        add_action( 'cora_check_updates', [$this, 'check_updates']);

        if( get_option('cora_outdated') ) {
            add_action( 'admin_notices', [$this, 'update_notice']);
        }
    }
    
    /**
     * Get the api ID.
     *
     * @since       1.0.0
     * @access      public
     * @return      string
     */
    public function site_api_id() {
        $id = get_option('cora_api_id');
        
        if(!$id) {
            $id = uniqid();
            update_option('cora_api_id', $id);
        }
        
        return $id;
    }


    /**
     * Check the latest version available.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     * @todo        Add an auto updates option using envato api.
     * 
     */
    public function check_updates() {
        $params = [
            "body" => [
                "action" => "check-version",
                "license_user" => get_site_url(),
                "license_id" => $this->site_api_id()
            ]
        ];

        // Make the POST request
        $request = wp_remote_post("https://coradashboard.com/api.php", $params);
     
        // Check if response is valid
        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
            $response = json_decode( $request['body'], true );
            $plugin_data = get_plugin_data( $this->parent->dir('cora.php') );

            // Compare versions
            if ( version_compare( $response['version'], $plugin_data['Version'], ">" ) ) {
                update_option('cora_outdated', true);
            } else {
                update_option('cora_outdated', false);
            }
        }
    }


    /**
     * Get plugin download url.
     *
     * @since       1.0.0
     * @access      public
     * @return      string
     */
    public function download_url() {
        $params = [
            'body'  => [
                "action" => "get-download-url",
                "license_user" => get_site_url(),
                "license_id" => $this->site_api_id()
            ]
        ];

        // Make the GET request
        $request = wp_remote_get("https://coradashboard.com/api.php", $params);
        
        // Check if response is valid
        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
            $response = json_decode( $request['body'], true );
            return $response['download_url'];
        }

        return "";
    }

    /**
     * Notify the admin.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function update_notice() {                
        ?>
            <div class="notice notice-warning is-dismissible">
                <p>Your are running an outdated version of Cora, please download the latest version and re-upload it to you website.</p>
                <p>Log into your envato account & download it from: <?php echo $this->download_url() ?> </p>
            </div>
        <?php
    }

}
