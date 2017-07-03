<?php
/**
 * Section:	`Featured Properties`
 * Panel: 	`Home`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_featured_properties_customizer' ) ) :

	/**
	 * inspiry_featured_properties_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_featured_properties_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Home Featured Properties Section
		 */
		$wp_customize->add_section( 'inspiry_home_featured_properties', array(
			'title' => __( 'Featured Properties', 'framework' ),
			'panel' => 'inspiry_home_panel'
		) );

		/* Show/Hide Featured Properties on Homepage */
		$wp_customize->add_setting( 'theme_show_featured_properties', array(
			'type' 		=> 'option',
			'default' 	=> 'true'
		) );
		$wp_customize->add_control( 'theme_show_featured_properties', array(
			'label' 	=> __( 'Featured Properties on Homepage', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_featured_properties',
			'choices' 	=> array(
				'true' 	=> __( 'Show', 'framework' ),
				'false' => __( 'Hide', 'framework' )
			)
		) );

		/* Title */
		$wp_customize->add_setting( 'theme_featured_prop_title', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'theme_featured_prop_title', array(
			'label' 	=> __( 'Title', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_home_featured_properties'
		) );

		/* Featured Properties Title Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'theme_featured_prop_title', array(
				'selector' 				=> '.featured-properties-carousel .narrative h3, #rh_featured_properties .narrative h3',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'theme_featured_prop_title_render'
			) );
		}

		/* Text */
		$wp_customize->add_setting( 'theme_featured_prop_text', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'wp_kses_data'
		) );
		$wp_customize->add_control( 'theme_featured_prop_text', array(
			'label' 	=> __( 'Description Text', 'framework' ),
			'type' 		=> 'textarea',
			'section'	=> 'inspiry_home_featured_properties'
		) );

		/* Featured Properties Description Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'theme_featured_prop_text', array(
				'selector' 				=> '.featured-properties-carousel .narrative p, #rh_featured_properties .narrative p',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'theme_featured_prop_text_render'
			) );
		}

		/* Exclude Featured Properties from Properties on Homepage */
		$wp_customize->add_setting( 'theme_exclude_featured_properties', array(
			'type' 		=> 'option',
			'default' 	=> 'false'
		) );
		$wp_customize->add_control( 'theme_exclude_featured_properties', array(
			'label' 	=> __( 'Exclude or Include Featured Properties from Recent Properties on Homepage', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_featured_properties',
			'choices' 	=> array(
				'true' 	=> 'Exclude',
				'false'	=> 'Include'
			)
		) );

		/* Featured Properties Variation */
		$wp_customize->add_setting( 'inspiry_featured_properties_variation', array(
			'type' 		=> 'option',
			'default' 	=> 'default'
		) );
		$wp_customize->add_control( 'inspiry_featured_properties_variation', array(
			'label' 	=> __( 'Select Featured Properties Variation', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_featured_properties',
			'choices' 	=> array(
				'default' 				=> 'Default',
				'one_property_slide'	=> 'Slide with single property'
			)
		) );

	}

	add_action( 'customize_register', 'inspiry_featured_properties_customizer' );
endif;


if ( ! function_exists( 'inspiry_featured_properties_defaults' ) ) :

	/**
	 * inspiry_featured_properties_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_featured_properties_defaults( WP_Customize_Manager $wp_customize ) {
		$featured_properties_settings_ids = array(
			'theme_show_featured_properties',
			'theme_exclude_featured_properties',
			'inspiry_featured_properties_variation'
		);
		inspiry_initialize_defaults( $wp_customize, $featured_properties_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_featured_properties_defaults' );
endif;


if ( ! function_exists( 'theme_featured_prop_title_render' ) ) {
	function theme_featured_prop_title_render() {
		if ( get_option( 'theme_featured_prop_title' ) ) {
			echo get_option( 'theme_featured_prop_title' );
		}
	}
}


if ( ! function_exists( 'theme_featured_prop_text_render' ) ) {
	function theme_featured_prop_text_render() {
		if ( get_option( 'theme_featured_prop_text' ) ) {
			echo get_option( 'theme_featured_prop_text' );
		}
	}
}
