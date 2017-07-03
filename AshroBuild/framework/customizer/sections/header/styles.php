<?php
/**
 * Section:	`Styles`
 * Panel: 	`Header`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_header_styles_customizer' ) ) :

	/**
	 * inspiry_header_styles_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_header_styles_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Styles Section
		 */

		$wp_customize->add_section( 'inspiry_header_styles', array(
			'title' => __( 'Styles', 'framework' ),
			'panel' => 'inspiry_header_panel',
		) );

		/* Header Background Color */
		$wp_customize->add_setting( 'theme_header_bg_color', array(
			'type' => 'option',
			'default' => '#252A2B',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,              // WP_Customize_Manager
				'theme_header_bg_color',    // Setting id
				array(
					'label' => __( 'Header Background Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Logo Text Color */
		$wp_customize->add_setting( 'theme_logo_text_color', array(
			'type' => 'option',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_logo_text_color',
				array(
					'label' => __( 'Logo Text Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Logo Text Hover Color */
		$wp_customize->add_setting( 'theme_logo_text_hover_color', array(
			'type' => 'option',
			'default' => '#4dc7ec',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_logo_text_hover_color',
				array(
					'label' => __( 'Logo Text Hover Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Tagline Text Color */
		$wp_customize->add_setting( 'theme_tagline_text_color', array(
			'type' => 'option',
			'default' => '#8b9293',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_tagline_text_color',
				array(
					'label' => __( 'Tagline Text Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Tagline Background Color */
		$wp_customize->add_setting( 'theme_tagline_bg_color', array(
			'type' => 'option',
			'default' => '#343a3b',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_tagline_bg_color',
				array(
					'label' => __( 'Tagline Background Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Header Text Color */
		$wp_customize->add_setting( 'theme_header_text_color', array(
			'type' => 'option',
			'default' => '#929A9B',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_header_text_color',
				array(
					'label' => __( 'Header Text Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Header Links Hover Color */
		$wp_customize->add_setting( 'theme_header_link_hover_color', array(
			'type' => 'option',
			'default' => '#b0b8b9',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_header_link_hover_color',
				array(
					'label' => __( 'Header Links Hover Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Header Borders Color */
		$wp_customize->add_setting( 'theme_header_border_color', array(
			'type' => 'option',
			'default' => '#343A3B',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_header_border_color',
				array(
					'label' => __( 'Header Borders Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Main Menu Text Color */
		$wp_customize->add_setting( 'theme_main_menu_text_color', array(
			'type' => 'option',
			'default' => '#afb4b5',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_main_menu_text_color',
				array(
					'label' => __( 'Main Menu Text Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Drop Down Menu Background Color */
		$wp_customize->add_setting( 'theme_menu_bg_color', array(
			'type' => 'option',
			'default' => '#ec894d',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_menu_bg_color',
				array(
					'label' => __( 'Drop Down Menu Background Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Drop Down Menu Text Color */
		$wp_customize->add_setting( 'theme_menu_text_color', array(
			'type' => 'option',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_menu_text_color',
				array(
					'label' => __( 'Drop Down Menu Text Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Drop Down Menu Background Color on Mouse Over */
		$wp_customize->add_setting( 'theme_menu_hover_bg_color', array(
			'type' => 'option',
			'default' => '#dc7d44',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_menu_hover_bg_color',
				array(
					'label' => __( 'Drop Down Menu Background Color on Mouse Over', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		/* Header Phone Number Background Color */
		$wp_customize->add_setting( 'theme_phone_bg_color', array(
			'type' => 'option',
			'default' => '#4dc7ec',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_phone_bg_color',
				array(
					'label' => __( 'Header Phone Number Background Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		$wp_customize->add_setting( 'theme_phone_text_color', array(
			'type' => 'option',
			'default' => '#e7eff7',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_phone_text_color',
				array(
					'label' => __( 'Header Phone Number Text Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);

		$wp_customize->add_setting( 'theme_phone_icon_bg_color', array(
			'type' => 'option',
			'default' => '#37b3d9',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_phone_icon_bg_color',
				array(
					'label' => __( 'Header Phone Icon Background Color', 'framework' ),
					'section' => 'inspiry_header_styles',
				)
			)
		);


	}

	add_action( 'customize_register', 'inspiry_header_styles_customizer' );
endif;


if ( ! function_exists( 'inspiry_header_styles_defaults' ) ) :

	/**
	 * inspiry_header_styles_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_header_styles_defaults( WP_Customize_Manager $wp_customize ) {
		$header_styles_settings_ids = array(
			'theme_header_bg_color',
			'theme_logo_text_color',
			'theme_logo_text_hover_color',
			'theme_tagline_text_color',
			'theme_tagline_bg_color',
			'theme_header_text_color',
			'theme_header_link_hover_color',
			'theme_header_border_color',
			'theme_main_menu_text_color',
			'theme_menu_bg_color',
			'theme_menu_text_color',
			'theme_menu_hover_bg_color',
			'theme_phone_bg_color',
			'theme_phone_text_color',
			'theme_phone_icon_bg_color'
		);
		inspiry_initialize_defaults( $wp_customize, $header_styles_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_header_styles_defaults' );
endif;
