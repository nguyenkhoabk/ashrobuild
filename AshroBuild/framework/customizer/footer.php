<?php
/**
 * Footer Customizer Settings
 */

if ( ! function_exists( 'inspiry_footer_customizer' ) ) :
	function inspiry_footer_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Footer Panel
		 */

		$wp_customize->add_panel( 'inspiry_footer_panel', array(
			'title' 	=> __( 'Footer', 'framework' ),
			'priority' 	=> 125,
		) );

	}

	add_action( 'customize_register', 'inspiry_footer_customizer' );
endif;


/**
 * Partners
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/footer/partners.php' );


/**
 * Text
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/footer/text.php' );

/**
 * Text
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/footer/styles.php' );
