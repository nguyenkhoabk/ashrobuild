<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="format-detection" content="telephone=no">

    <?php
    if ( !function_exists( 'has_site_icon' ) || !has_site_icon() ) {
	    $favicon = get_option( 'theme_favicon' );
	    if ( ! empty( $favicon ) ) {
		    ?><link rel="shortcut icon" href="<?php echo esc_url( $favicon ); ?>" /><?php
	    }
    }

    if ( is_singular() && pings_open( get_queried_object() ) ) {
	    ?><link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php
    }

    wp_head();
    ?>
</head>
<body <?php body_class(); ?>>

        <!-- Start Header -->
        <div class="header-wrapper">

            <div class="container"><!-- Start Header Container -->

                <?php
                /*
                 *  Header Variation
                 */
                $inspiry_header_variation = get_option( 'inspiry_header_variation' );

                // For demo purpose only
                if ( isset( $_GET[ 'header-variation' ] ) ) {
                    $inspiry_header_variation = $_GET[ 'header-variation' ];
                }

                if ( 'center' == $inspiry_header_variation ) {
	                get_template_part( 'template-parts/header/variation-center' );
                } else {
	                get_template_part( 'template-parts/header/variation-simple' );
                }
                ?>

            </div> <!-- End Header Container -->

        </div><!-- End Header -->
