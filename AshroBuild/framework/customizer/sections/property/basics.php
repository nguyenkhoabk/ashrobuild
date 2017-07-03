<?php
/**
 * Section:	`Basics`
 * Panel: 	`Property Detail Page`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_property_basics_customizer' ) ) :

	/**
	 * inspiry_property_basics_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_property_basics_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Basics Section
		 */
		$wp_customize->add_section( 'inspiry_property_basics', array(
			'title' => __( 'Basics', 'framework' ),
			'panel' => 'inspiry_property_panel',
		) );

		/* property detail variation */
		$wp_customize->add_setting( 'theme_property_detail_variation', array(
			'type' => 'option',
			'default' => 'default',
		) );
		$wp_customize->add_control( 'theme_property_detail_variation', array(
			'label' => __( 'Property Detail Page Layout Variation ?', 'framework' ),
			'type' => 'radio',
			'section' => 'inspiry_property_basics',
			'choices' => array(
				'default' => __( 'Agent info below Google Map', 'framework' ),
				'agent-in-sidebar' => __( 'Agent info in Sidebar', 'framework' ),
			)
		) );

		/* Additional Detail Title  */
		$wp_customize->add_setting( 'theme_additional_details_title', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __( 'Additional Details', 'framework' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'theme_additional_details_title', array(
			'label' 		=> __( 'Additional Details Title', 'framework' ),
			'description' 	=> __( 'This will only display if a property has additional details.', 'framework' ),
			'type' 			=> 'text',
			'section' 		=> 'inspiry_property_basics',
		) );

		/* Features Title  */
		$wp_customize->add_setting( 'theme_property_features_title', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __( 'Features', 'framework' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'theme_property_features_title', array(
			'label' 	=> __( 'Features Title', 'framework' ),
			'type' 		=> 'text',
			'section'	=> 'inspiry_property_basics',
		) );

		/* Show/Hide Social Share */
		$wp_customize->add_setting( 'theme_display_social_share', array(
			'type' => 'option',
			'default' => 'true',
		) );
		$wp_customize->add_control( 'theme_display_social_share', array(
			'label' => __( 'Social Share Icons', 'framework' ),
			'type' => 'radio',
			'section' => 'inspiry_property_basics',
			'choices' => array(
				'true' => __( 'Show', 'framework' ),
				'false' => __( 'Hide', 'framework' ),
			)
		) );

		/* Child Properties Title  */
		$wp_customize->add_setting( 'theme_child_properties_title', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __( 'Sub Properties', 'framework' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'theme_child_properties_title', array(
			'label' 		=> __( 'Child Properties Title', 'framework' ),
			'description' 	=> __( 'This will only display if a property has child properties.', 'framework' ),
			'type' 			=> 'text',
			'section' 		=> 'inspiry_property_basics',
		) );

		/* Add/Remove  Open Graph Meta Tags */
		$wp_customize->add_setting( 'theme_add_meta_tags', array(
			'type' => 'option',
			'default' => 'false',
		) );
		$wp_customize->add_control( 'theme_add_meta_tags', array(
			'label' => __( 'Open Graph Meta Tags', 'framework' ),
			'type' => 'radio',
			'section' => 'inspiry_property_basics',
			'choices' => array(
				'true' => __( 'Enable', 'framework' ),
				'false' => __( 'Disable', 'framework' ),
			)
		) );


		/* Link to Previous and Next Property */
		$wp_customize->add_setting( 'inspiry_property_prev_next_link', array(
			'type' => 'option',
			'default' => 'true',
		) );
		$wp_customize->add_control( 'inspiry_property_prev_next_link', array(
			'label' => __( 'Link to Previous and Next Property', 'framework' ),
			'type' => 'radio',
			'section' => 'inspiry_property_basics',
			'choices' => array(
				'true' => __( 'Enable', 'framework' ),
				'false' => __( 'Disable', 'framework' ),
			)
		) );

	}

	add_action( 'customize_register', 'inspiry_property_basics_customizer' );
endif;


if ( ! function_exists( 'inspiry_property_basics_defaults' ) ) :

	/**
	 * inspiry_property_basics_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_property_basics_defaults( WP_Customize_Manager $wp_customize ) {
		$property_basics_settings_ids = array(
			'theme_property_detail_variation',
			'theme_additional_details_title',
			'theme_property_features_title',
			'theme_display_social_share',
			'theme_child_properties_title',
			'theme_add_meta_tags',
			'inspiry_property_prev_next_link'
		);
		inspiry_initialize_defaults( $wp_customize, $property_basics_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_property_basics_defaults' );
endif;
