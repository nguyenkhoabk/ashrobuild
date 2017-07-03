<?php
get_header();
?>

<!-- Page Head -->
<?php get_template_part("banners/blog_page_banner"); ?>

<!-- Content -->
<div class="container contents blog-page">
    <div class="row">
        <div class="span12 main-wrap">
            <!-- Main Content -->
            <div class="main">

            <?php
                if ( have_posts() ) : ?>
                    <div class="property-items">
                    <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part("template-parts/video-for-listing");
                        endwhile; 
                    ?>
                    </div>
                    <?php theme_pagination( $wp_query->max_num_pages);
                else :
                    ?><p class="nothing-found"><?php _e('No Posts Found!', 'framework'); ?></p><?php
                endif;
                ?>

            </div><!-- End Main Content -->

        </div> <!-- End span9 -->

    </div><!-- End contents row -->
</div><!-- End Content -->

<?php get_footer(); ?>