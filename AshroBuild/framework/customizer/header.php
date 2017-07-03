<?php
/**
 * Customizer settings for Header
 */

if ( ! function_exists( 'inspiry_header_customizer' ) ) :
	function inspiry_header_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Header Panel
		 */

		$wp_customize->add_panel( 'inspiry_header_panel', array(
			'title' 	=> __( 'Header', 'framework' ),
			'priority'	=> 121
		) );

	}

	add_action( 'customize_register', 'inspiry_header_customizer' );
endif;


/**
 * Social Icons
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/header/social-icons.php' );


/**
 * User Navigation
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/header/user-navigation.php' );


/**
 * Contact Information
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/header/contact-information.php' );


/**
 * Banner
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/header/banner.php' );


/**
 * Others
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/header/others.php' );


/**
 * Styles
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/header/styles.php' );


// if ( ! function_exists( 'inspiry_header_defaults' ) ) :
// 	/**
// 	 * Set default values for header settings
// 	 *
// 	 * @param WP_Customize_Manager $wp_customize
// 	 */
// 	function inspiry_header_defaults( WP_Customize_Manager $wp_customize ) {
// 		$header_settings_ids = array(
// 		);
// 		inspiry_initialize_defaults( $wp_customize, $header_settings_ids );
// 	}

// 	add_action( 'customize_save_after', 'inspiry_header_defaults' );
// endif;
