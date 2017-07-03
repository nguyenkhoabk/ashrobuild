<?php
/**
 * Home Customizer
 */


if ( ! function_exists( 'inspiry_home_customizer' ) ) :
	function inspiry_home_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Home Panel
		 */
		$wp_customize->add_panel( 'inspiry_home_panel', array(
			'title' => __( 'Home Page', 'framework' ),
			'priority' => 122,
		) );
		
	}

	add_action( 'customize_register', 'inspiry_home_customizer' );
endif;


/**
 * Sections Manager
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/home/sections-manager.php' );

/**
 * Slider Area
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/home/slider-area.php' );

/**
 * Search Form
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/home/search-form.php' );

/**
 * Slogan
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/home/slogan.php' );

/**
 * Home Properties
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/home/home-properties.php' );

/**
 * Features Section
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/home/features-section.php' );

/**
 * Featured Properties
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/home/featured-properties.php' );

/**
 * News or Blog Posts
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/home/news-posts.php' );
