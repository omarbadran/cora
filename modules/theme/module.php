<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Theme Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Theme {

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

        require_once $this->parent->dir("modules/theme/options.php");

        add_filter( 'admin_body_class', [$this  , "shadows"]);
        add_filter( 'login_body_class', [$this  , "shadows"]);
    }

    /**
     * Shadows.
     *
     * @since       1.0.0
     * @access      public
     * @return      array|string
     */
    public function shadows( $classes ) {
        if ( is_array($classes) ) {
            $classes[] = 'cora-shadows';
        } else {
            $classes .= 'cora-shadows';
        }
    
        return $classes;
    }
}