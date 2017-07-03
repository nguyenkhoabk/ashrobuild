<?php
/**
 * Section:	`Text`
 * Panel: 	`Footer`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_footer_text_customizer' ) ) :

	/**
	 * inspiry_footer_text_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_footer_text_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Footer Text Section
		 */
		$wp_customize->add_section( 'inspiry_footer_text', array(
			'title' => __( 'Text', 'framework' ),
			'panel' => 'inspiry_footer_panel',
		) );

		/* Copyright Text */
		$wp_customize->add_setting( 'theme_copyright_text', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'wp_kses_data',
		) );
		$wp_customize->add_control( 'theme_copyright_text', array(
			'label' 	=> __( 'Copyright Text', 'framework' ),
			'type' 		=> 'textarea',
			'section' 	=> 'inspiry_footer_text',
		) );

		/* Copyright Text Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'theme_copyright_text', array(
				'selector' 				=> '#footer-bottom p.copyright',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_copyright_text_render'
			) );
		}

		/* Designed By Text */
		$wp_customize->add_setting( 'theme_designed_by_text', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> 'Designed by <a href="http://www.inspirythemes.com">Inspiry Themes</a>',
			'sanitize_callback' => 'wp_kses_data',
		) );
		$wp_customize->add_control( 'theme_designed_by_text', array(
			'label' 	=> __( 'Designed by Text', 'framework' ),
			'type' 		=> 'textarea',
			'section'	=> 'inspiry_footer_text',
		) );

		/* Designed By Text Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'theme_designed_by_text', array(
				'selector' 				=> '#footer-bottom p.designed-by',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_designed_by_text_render'
			) );
		}

	}

	add_action( 'customize_register', 'inspiry_footer_text_customizer' );
endif;


if ( ! function_exists( 'inspiry_footer_text_defaults' ) ) :

	/**
	 * inspiry_footer_text_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_footer_text_defaults( WP_Customize_Manager $wp_customize ) {
		$footer_text_settings_ids = array(
			'theme_designed_by_text'
		);
		inspiry_initialize_defaults( $wp_customize, $footer_text_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_footer_text_defaults' );
endif;


if ( ! function_exists( 'inspiry_copyright_text_render' ) ) {
	function inspiry_copyright_text_render() {
		if ( get_option( 'theme_copyright_text' ) ) {
			echo get_option( 'theme_copyright_text' );
		}
	}
}


if ( ! function_exists( 'inspiry_designed_by_text_render' ) ) {
	function inspiry_designed_by_text_render() {
		if ( get_option( 'theme_designed_by_text' ) ) {
			echo get_option( 'theme_designed_by_text' );
		}
	}
}
