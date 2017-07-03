<?php
/**
 * Section:	`Banner`
 * Panel: 	`Header`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_banner_customizer' ) ) :

	/**
	 * inspiry_banner_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_banner_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Banner Section
		 */

		$wp_customize->add_section( 'inspiry_header_banner', array(
			'title' => __( 'Banner', 'framework' ),
			'panel' => 'inspiry_header_panel',
		) );

		$wp_customize->add_setting( 'theme_general_banner_image', array(
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'theme_general_banner_image',
				array(
					'label' => __( 'Header Banner Image', 'framework' ),
					"description" => __( 'Required minimum height is 230px and minimum width is 2000px.', 'framework' ),
					'section' => 'inspiry_header_banner',
				)
			)
		);

		$wp_customize->add_setting( 'theme_banner_titles', array(
			'type' => 'option',
			'default' => 'false',
		) );
		$wp_customize->add_control( 'theme_banner_titles', array(
			'label' => __( 'Hide Title and Subtitle From Image Banner', 'framework' ),
			'type' => 'radio',
			'section' => 'inspiry_header_banner',
			'choices' => array(
				'true' => __( 'Yes', 'framework' ),
				'false' => __( 'No', 'framework' ),
			)
		) );

		$wp_customize->add_setting( 'theme_banner_text_color', array(
			'type' => 'option',
			'default' => '#394041',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_banner_text_color',
				array(
					'label' => __( 'Banner Title Color', 'framework' ),
					'section' => 'inspiry_header_banner',
				)
			)
		);

		$wp_customize->add_setting( 'theme_banner_title_bg_color', array(
			'type' => 'option',
			'default' => '#f5f4f3',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_banner_title_bg_color',
				array(
					'label' => __( 'Banner Title Background Color', 'framework' ),
					'section' => 'inspiry_header_banner',
				)
			)
		);

		$wp_customize->add_setting( 'theme_banner_sub_text_color', array(
			'type' => 'option',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_banner_sub_text_color',
				array(
					'label' => __( 'Banner Sub Title Color', 'framework' ),
					'section' => 'inspiry_header_banner',
				)
			)
		);

		$wp_customize->add_setting( 'theme_banner_sub_title_bg_color', array(
			'type' => 'option',
			'default' => '#37B3D9',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_banner_sub_title_bg_color',
				array(
					'label' => __( 'Banner Sub Title Background Color', 'framework' ),
					'section' => 'inspiry_header_banner',
				)
			)
		);

	}

	add_action( 'customize_register', 'inspiry_banner_customizer' );
endif;


if ( ! function_exists( 'inspiry_banner_defaults' ) ) :

	/**
	 * inspiry_banner_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_banner_defaults( WP_Customize_Manager $wp_customize ) {
		$banner_settings_ids = array(
			'theme_banner_titles',
			'theme_banner_text_color',
			'theme_banner_title_bg_color',
			'theme_banner_sub_text_color',
			'theme_banner_sub_title_bg_color',
		);
		inspiry_initialize_defaults( $wp_customize, $banner_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_banner_defaults' );
endif;
