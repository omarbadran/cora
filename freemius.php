<?php
/**
 * initialize Freemius
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */

if ( ! function_exists( 'cora_fs' ) ) {

    function cora_fs() {
        global $cora_fs;

        if ( ! isset( $cora_fs ) ) {
            require_once dirname(__FILE__) . '/includes/freemius/start.php';

            $cora_fs = fs_dynamic_init( array(
                'id'                  => '4920',
                'slug'                => 'cora',
                'type'                => 'plugin',
                'public_key'          => 'pk_ad853ee408af80f6c440b64f984e2',
                'is_premium'          => true,
                'premium_suffix'      => 'Professional',
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'trial'               => array(
                    'days'               => 14,
                    'is_require_payment' => true,
                ),
                'menu'                => array(
                    'slug'           => 'cora',
                    'support'        => false,
                ),
                // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
                'secret_key'          => 'sk_eQ-%:#:m1IUP~!vVEBSlfBYMR;T6j',
            ) );
        }

        return $cora_fs;
    }

    cora_fs();
    do_action( 'cora_fs_loaded' );
    
}
