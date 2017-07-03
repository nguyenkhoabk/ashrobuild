<?php
/**
 * Section:	`Home Properties`
 * Panel: 	`Home`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_home_properties_customizer' ) ) :

	/**
	 * inspiry_home_properties_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_home_properties_customizer( WP_Customize_Manager $wp_customize ) {

		/* Access the property-city terms via an Array */
		$cities_array = array();
		$city_terms = get_terms( 'property-city' );
		foreach ( $city_terms as $city_term ) {
			$cities_array[ $city_term->slug ] = $city_term->name;
		}

		/* Access the property-status terms via an Array */
		$statuses_array = array();
		$status_terms = get_terms( 'property-status' );
		foreach ( $status_terms as $status_term ) {
			$statuses_array[ $status_term->slug ] = $status_term->name;
		}

		/* Access the property-type terms via an Array */
		$types_array = array();
		$type_terms = get_terms( 'property-type' );
		foreach ( $type_terms as $type_term ) {
			$types_array[ $type_term->slug ] = $type_term->name;
		}

		/**
		 * Home Properties Section
		 */
		$wp_customize->add_section( 'inspiry_home_properties', array(
			'title' => __( 'Home Properties', 'framework' ),
			'panel' => 'inspiry_home_panel',
		) );

		/* Show or Hide Properties on Homepage */
		$wp_customize->add_setting( 'theme_show_home_properties', array(
			'type' 		=> 'option',
			'default' 	=> 'true',
		) );
		$wp_customize->add_control( 'theme_show_home_properties', array(
			'label' 	=> __( 'Show or Hide Slogan + Properties on Homepage ?', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_properties',
			'choices' 	=> array(
				'true' 	=> __( 'Show', 'framework' ),
				'false'	=> __( 'Hide', 'framework' ),
			)
		) );

		/* Properties on Homepage */
		$wp_customize->add_setting( 'theme_home_properties', array(
			'type' 		=> 'option',
			'default' 	=> 'recent',
		) );
		$wp_customize->add_control( 'theme_home_properties', array(
			'label' 	=> __( 'What Kind of Properties You Want to Display on Homepage ?', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_properties',
			'choices' 	=> array(
				'recent' 				=> __( 'Recent Properties', 'framework' ),
				'featured' 				=> __( 'Featured Properties', 'framework' ),
				'based-on-selection'	=> __( 'Properties Based on Selected Locations, Statuses and Types from Below', 'framework' )
			)
		) );

		/* Property Locations */
		$wp_customize->add_setting( 'theme_cities_for_homepage', array(
			'type' 				=> 'option',
			'default' 			=> array(),
			'sanitize_callback' => 'inspiry_sanitize_multiple_checkboxes'
		) );
		$wp_customize->add_control(
			new Inspiry_Multiple_Checkbox_Customize_Control(
				$wp_customize,
				'theme_cities_for_homepage',
				array(
					'section' 			=> 'inspiry_home_properties',
					'label' 			=> __( 'Select Property Locations', 'framework' ),
					'choices' 			=> $cities_array,
					'active_callback'	=> 'inspiry_selection_based_home_properties',
				)
			)
		);

		/* Property Statuses */
		$wp_customize->add_setting( 'theme_statuses_for_homepage', array(
			'type' 				=> 'option',
			'default' 			=> array(),
			'sanitize_callback'	=> 'inspiry_sanitize_multiple_checkboxes'
		) );
		$wp_customize->add_control(
			new Inspiry_Multiple_Checkbox_Customize_Control(
				$wp_customize,
				'theme_statuses_for_homepage',
				array(
					'section' 			=> 'inspiry_home_properties',
					'label' 			=> __( 'Select Property Statuses', 'framework' ),
					'choices' 			=> $statuses_array,
					'active_callback'	=> 'inspiry_selection_based_home_properties',
				)
			)
		);

		/* Property Types */
		$wp_customize->add_setting( 'theme_types_for_homepage', array(
			'type' 					=> 'option',
			'default' 				=> array(),
			'sanitize_callback' 	=> 'inspiry_sanitize_multiple_checkboxes'
		) );
		$wp_customize->add_control(
			new Inspiry_Multiple_Checkbox_Customize_Control(
				$wp_customize,
				'theme_types_for_homepage',
				array(
					'section' 			=> 'inspiry_home_properties',
					'label' 			=> __( 'Select Property Types', 'framework' ),
					'choices' 			=> $types_array,
					'active_callback'	=> 'inspiry_selection_based_home_properties',
				)
			)
		);

		/* Properties on Homepage */
		$wp_customize->add_setting( 'theme_sorty_by', array(
			'type' 		=> 'option',
			'default' 	=> 'recent',
		) );
		$wp_customize->add_control( 'theme_sorty_by', array(
			'label' 	=> __( 'Sort Properties By', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_properties',
			'choices' 	=> array(
				'recent' 		=> __( 'Time - Recent First', 'framework' ),
				'low-to-high' 	=> __( 'Price - Low to High', 'framework' ),
				'high-to-low'	=> __( 'Price - High to Low', 'framework' ),
				'random' 		=> __( 'Random', 'framework' ),
			)
		) );

		/* Number of Properties To Display on Home Page */
		$wp_customize->add_setting( 'theme_properties_on_home', array(
			'type' 		=> 'option',
			'default' 	=> '4',
		) );
		$wp_customize->add_control( 'theme_properties_on_home', array(
			'label' 	=> __( 'Number of Properties on Each Page', 'framework' ),
			'type' 		=> 'select',
			'section' 	=> 'inspiry_home_properties',
			'choices'	=> array(
				'1' 	=> 1,
				'2' 	=> 2,
				'3' 	=> 3,
				'4' 	=> 4,
				'5' 	=> 5,
				'6' 	=> 6,
				'7' 	=> 7,
				'8' 	=> 8,
				'9' 	=> 9,
				'10' 	=> 10,
				'11' 	=> 11,
				'12' 	=> 12,
				'13' 	=> 13,
				'14' 	=> 14,
				'15' 	=> 15,
				'16' 	=> 16,
				'17' 	=> 17,
				'18' 	=> 18,
				'19' 	=> 19,
				'20' 	=> 20,
			)
		) );

		/* AJAX Pagination */
		$wp_customize->add_setting( 'theme_ajax_pagination_home', array(
			'type' 		=> 'option',
			'default'	=> 'true',
		) );
		$wp_customize->add_control( 'theme_ajax_pagination_home', array(
			'label' 	=> __( 'AJAX Pagination', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_properties',
			'choices' 	=> array(
				'true' 	=> 'Enable',
				'false'	=> 'Disable',
			)
		) );

	}

	add_action( 'customize_register', 'inspiry_home_properties_customizer' );
endif;


if ( ! function_exists( 'inspiry_home_properties_defaults' ) ) :

	/**
	 * inspiry_home_properties_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_home_properties_defaults( WP_Customize_Manager $wp_customize ) {
		$home_properties_settings_ids = array(
			'theme_show_home_properties',
			'theme_home_properties',
			'theme_cities_for_homepage',
			'theme_statuses_for_homepage',
			'theme_types_for_homepage',
			'theme_sorty_by',
			'theme_properties_on_home',
			'theme_ajax_pagination_home'
		);
		inspiry_initialize_defaults( $wp_customize, $home_properties_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_home_properties_defaults' );
endif;


if ( ! function_exists( 'inspiry_selection_based_home_properties' ) ) {
	/**
	 * Checks if home properties are based on selection
	 * @return true|false
	 */
	function inspiry_selection_based_home_properties(){
		$theme_home_properties = get_option( 'theme_home_properties');
		if( $theme_home_properties == 'based-on-selection' ) {
			return true;
		}
		return false;
	}
}
