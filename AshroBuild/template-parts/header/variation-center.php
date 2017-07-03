<?php
/**
 * Header Variation: Center
 *
 * @since 2.6.2
 */

?>

<header id="header" class="clearfix">

	<div class="header__top">

		<div class="row">

			<div class="span5 header__switchers">

				<?php
			        /* WPML Language Switcher */
			        if ( function_exists( 'icl_get_languages' ) ) {
			            $wpml_lang_switcher 	= get_option( 'theme_wpml_lang_switcher' );
			            if ( 'true' == $wpml_lang_switcher ) {
			            	echo '<div class="switcher__lang clearfix">';
			                	do_action( 'icl_language_selector' );
			                echo '</div>';
			            }
			        }
				?>
				<!-- /.switcher__lang -->

				<?php if ( class_exists( 'WP_Currencies' ) ) : ?>
					<div class="switcher__currency clearfix">
						<?php get_template_part( 'template-parts/header-currency-switcher' ); // Currency Switcher ?>
					</div>
					<!-- /.switcher__currency -->
				<?php endif; ?>

				<div class="social_nav clearfix" id="social_nav">
					<!-- User Navigation -->
        			<?php get_template_part( 'template-parts/social-nav' ); ?>
				</div>
				<!-- /.social_nav -->

			</div>
			<!-- /.span6 -->

			<div class="span7 header__user_nav">

				<!-- User Navigation -->
        		<?php get_template_part( 'template-parts/user-nav' ); ?>

				<?php
					// Header email.
			        $header_email = get_option( 'theme_header_email' );
			        if ( ! empty( $header_email ) ) {
			            ?>
			            <h2 id="contact-email">
			                <?php include( get_template_directory() . '/images/icon-mail.svg' ); ?>
			                <a href="mailto:<?php echo antispambot( $header_email ); ?>"><?php echo antispambot( $header_email ); ?></a>
			            </h2>
			            <?php
			        }
				?>

			</div>
			<!-- /.span6 -->

		</div>
		<!-- /.row -->

		<div class="row">

			<div class="span12 header__logo" id="logo">
				<?php
			        $logo_path 		= get_option( 'theme_sitelogo' );
			        if ( !empty( $logo_path ) ) {
			            ?>
			            <a title="<?php bloginfo( 'name' ); ?>" href="<?php echo home_url(); ?>">
			                <img src="<?php echo esc_url( $logo_path ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			            </a>
			            <h2 class="logo-heading only-for-print">
			                <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
			                    <?php bloginfo( 'name' ); ?>
			                </a>
			            </h2>
			            <?php
			        } else {
			            ?>
			            <h2 class="logo-heading">
			                <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
			                    <?php bloginfo( 'name' ); ?>
			                </a>
			            </h2>
			            <?php
			        }

			        $description 	= get_bloginfo ( 'description' );
			        if ( $description ) {
			            echo '<div class="tag-line"><span>';
			            echo esc_html( $description );
			            echo '</span></div>';
			        }
		        ?>
			</div>
			<!-- /.span12 -->

		</div>
		<!-- /.row -->

	</div>
	<!-- /.header__top -->

	<div class="header__navigation clearfix">

		<div class="header__menu">
			<!-- Start Main Menu-->
	        <nav class="main-menu">
	            <?php
	            wp_nav_menu( array(
	                'theme_location' => 'main-menu',
	                'menu_class' => 'clearfix'
	            ));
	            ?>
	        </nav>
	        <!-- End Main Menu -->
		</div>
		<!-- /.header__menu -->

		<div class="header__phone_number clearfix">
			<!-- Phone Number -->
        	<?php get_template_part( 'template-parts/header/phone-number' ); ?>
		</div>
		<!-- /.header__phone_number -->

	</div>
	<!-- /.header__navigation -->

</header>
<!-- /#header.clearfix -->
