<?php
/**
 * Section:	`Search Form Basics`
 * Panel: 	`Properties Search`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_search_form_basics_customizer' ) ) :

	/**
	 * inspiry_search_form_basics_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_search_form_basics_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Search Form Basics
		 */
		$wp_customize->add_section( 'inspiry_properties_search_form', array(
			'title' => __( 'Search Form Basics', 'framework' ),
			'panel' => 'inspiry_properties_search_panel',
		) );

		/* Search Form Title */
		$wp_customize->add_setting( 'theme_home_advance_search_title', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
			'default' 			=> __( 'Find Your Home', 'framework' ),
		) );
		$wp_customize->add_control( 'theme_home_advance_search_title', array(
			'label' 	=> __( 'Search Form Title', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Search Form Title Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'theme_home_advance_search_title', array(
				'selector' 				=> '.search-heading',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_home_advance_search_title_render'
			) );
		}

		/* Search Fields */
		$wp_customize->add_setting( 'theme_search_fields', array(
			'type' 				=> 'option',
			'default' 			=> array( 'keyword-search', 'property-id', 'location', 'status', 'type', 'min-beds', 'min-baths', 'min-max-price', 'min-max-area', 'features' ),
			'sanitize_callback' => 'inspiry_sanitize_multiple_checkboxes'
		) );
		$wp_customize->add_control(
			new Inspiry_Multiple_Checkbox_Customize_Control(
				$wp_customize,
				'theme_search_fields',
				array(
					'section' 	=> 'inspiry_properties_search_form',
					'label' 	=> __( 'Which fields you want to display in search form ?', 'framework' ),
					'choices' 	=> array(
						'keyword-search'	=> __( 'Keyword Search', 'framework' ),
						'property-id' 	=> __( 'Property ID', 'framework' ),
						'location' 		=> __( 'Property Location', 'framework' ),
						'status' 		=> __( 'Property Status', 'framework' ),
						'type' 			=> __( 'Property Type', 'framework' ),
						'min-beds' 		=> __( 'Min Beds', 'framework' ),
						'min-baths' 	=> __( 'Min Baths', 'framework' ),
						'min-max-price'	=> __( 'Min and Max Price', 'framework' ),
						'min-max-area' 	=> __( 'Min and Max Area', 'framework' ),
						'features' 		=> __( 'Property Features', 'framework' ),
					)
				)
			)
		);

		/* Separator */
		$wp_customize->add_setting( 'inspiry_keyword_separator', array() );
		$wp_customize->add_control(
			new Inspiry_Separator_Control(
				$wp_customize,
				'inspiry_keyword_separator',
				array(
					'section' 	=> 'inspiry_properties_search_form',
				)
			)
		);

		/* Keyword Label */
		$wp_customize->add_setting( 'inspiry_keyword_label', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __( 'Keyword', 'framework' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_keyword_label', array(
			'label' 	=> __( 'Label for Keyword Search', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Keyword Placeholder Text */
		$wp_customize->add_setting( 'inspiry_keyword_placeholder_text', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __('Any', 'framework'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_keyword_placeholder_text', array(
			'label' 	=> __( 'Placeholder Text for Keyword Search', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Separator */
		$wp_customize->add_setting( 'inspiry_property_id_separator', array() );
		$wp_customize->add_control(
			new Inspiry_Separator_Control(
				$wp_customize,
				'inspiry_property_id_separator',
				array(
					'section' 	=> 'inspiry_properties_search_form',
				)
			)
		);

		/* Property ID Label */
		$wp_customize->add_setting( 'inspiry_property_id_label', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __( 'Property ID', 'framework' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_property_id_label', array(
			'label' 	=> __( 'Label for Property ID', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Property ID Placeholder Text */
		$wp_customize->add_setting( 'inspiry_property_id_placeholder_text', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __('Any', 'framework'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_property_id_placeholder_text', array(
			'label' 	=> __( 'Placeholder Text for Property ID', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Separator */
		$wp_customize->add_setting( 'inspiry_search_taxonomy_separator', array() );
		$wp_customize->add_control(
			new Inspiry_Separator_Control(
				$wp_customize,
				'inspiry_search_taxonomy_separator',
				array(
					'section' 	=> 'inspiry_properties_search_form',
				)
			)
		);

		/* Property Status Label */
		$wp_customize->add_setting( 'inspiry_property_status_label', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __('Property Status', 'framework'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_property_status_label', array(
			'label' 	=> __( 'Label for Property Status', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Property Type Label */
		$wp_customize->add_setting( 'inspiry_property_type_label', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __('Property Type', 'framework'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_property_type_label', array(
			'label' 	=> __( 'Label for Property Type', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Search Button Text */
		$wp_customize->add_setting( 'inspiry_search_button_text', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __('Search', 'framework'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_search_button_text', array(
			'label' 	=> __( 'Search Button Text', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Separator */
		$wp_customize->add_setting( 'inspiry_any_separator', array() );
		$wp_customize->add_control(
			new Inspiry_Separator_Control(
				$wp_customize,
				'inspiry_any_separator',
				array(
					'section' 	=> 'inspiry_properties_search_form',
				)
			)
		);

		/* Any Text */
		$wp_customize->add_setting( 'inspiry_any_text', array(
			'type' 				=> 'option',
			'default' 			=> __('Any', 'framework'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_any_text', array(
			'label' 	=> __( 'Any Text', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Search Features Title */
		$wp_customize->add_setting( 'inspiry_search_features_title', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __('Looking for certain features', 'framework'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_search_features_title', array(
			'label' 	=> __( 'Title for Features Toggle', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_properties_search_form',
		) );

		/* Search Features Title Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'inspiry_search_features_title', array(
				'selector' 				=> '.advance-search .more-option-trigger a',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_search_features_title_render'
			) );
		}

	}

	add_action( 'customize_register', 'inspiry_search_form_basics_customizer' );
endif;


if ( ! function_exists( 'inspiry_search_form_basics_defaults' ) ) :

	/**
	 * inspiry_search_form_basics_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_search_form_basics_defaults( WP_Customize_Manager $wp_customize ) {
		$search_form_basics_settings_ids = array(
			'theme_home_advance_search_title',
			'theme_search_fields',
			'inspiry_keyword_label',
			'inspiry_keyword_placeholder_text',
			'inspiry_property_id_label',
			'inspiry_property_id_placeholder_text',
			'inspiry_property_status_label',
			'inspiry_property_type_label',
			'inspiry_any_text',
			'inspiry_search_button_text',
			'inspiry_search_features_title',
		);
		inspiry_initialize_defaults( $wp_customize, $search_form_basics_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_search_form_basics_defaults' );
endif;


if ( ! function_exists( 'inspiry_home_advance_search_title_render' ) ) {
	function inspiry_home_advance_search_title_render() {
		if ( get_option( 'theme_home_advance_search_title' ) ) {
			echo '<i class="fa fa-search"></i>' . get_option( 'theme_home_advance_search_title' );
		}
	}
}


if ( ! function_exists( 'inspiry_search_features_title_render' ) ) {
	function inspiry_search_features_title_render() {
		if ( get_option( 'inspiry_search_features_title' ) ) {
			echo '<i class="fa fa-plus-square-o"></i>' . get_option( 'inspiry_search_features_title' );
		}
	}
}
