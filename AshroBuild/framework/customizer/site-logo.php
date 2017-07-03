<?php
/**
 * Customizer:	`Site Logo`
 *
 * @since 2.6.3
 */


if ( ! function_exists( 'inspiry_site_logo_customizer' ) ) :
	function inspiry_site_logo_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Site Identity
		 */
		/* Logo */
		$wp_customize->add_setting( 'theme_sitelogo', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_sitelogo', array(
			'label' 	=> __( 'Site Logo', 'framework' ),
			'section' 	=> 'title_tagline',   // id of site identity section - Ref: https://developer.wordpress.org/themes/advanced-topics/customizer-api/
			'settings' 	=> 'theme_sitelogo',
			'priority'	=> 1,
		) ) );

		/* Site Logo Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'theme_sitelogo', array(
				'selector' 				=> '#logo',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_site_logo_render'
			) );
		}

		// Site Name
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		/* Site Name Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' 				=> '#logo',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_site_logo_render'
			) );
		}

		// Site Description
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		/* Site Description Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' 				=> '#logo .tag-line span',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_site_desc_render'
			) );
		}

	}

	add_action( 'customize_register', 'inspiry_site_logo_customizer' );
endif;


if ( ! function_exists( 'inspiry_site_logo_render' ) ) {
	function inspiry_site_logo_render() {
		if ( get_option( 'theme_sitelogo' ) ) {
			echo '<a href="' . home_url() . '"><img src="' . get_option( 'theme_sitelogo' ) . '" alt=""></a>';
		} elseif ( get_bloginfo( 'name' ) ) {
			echo '<h2 class="logo-heading"><a href="' . home_url() . '">';
			bloginfo( 'name' );
			echo '</a></h2>';
		}
		$description 	= get_bloginfo ( 'description' );
        if ( $description ) {
            echo '<div class="tag-line"><span>';
            echo esc_html( $description );
            echo '</span></div>';
        }
	}
}


if ( ! function_exists( 'inspiry_site_desc_render' ) ) {
	function inspiry_site_desc_render() {
		$description 	= get_bloginfo ( 'description' );
        if ( $description ) {
            echo esc_html( $description );
        }
	}
}
