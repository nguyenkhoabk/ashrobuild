<section id="comments">

    <?php if ( post_password_required() ): ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view comments.', 'framework' ); ?></p>
</section><!-- end of comments -->
<?php return; endif; ?>

<?php if ( comments_open() ){ ?>

    <div class="fb-comments" data-href="<?php get_the_permalink(); ?>" data-width="100%" data-numposts="10" data-order-by="social" data-colorscheme="light"></div>

<?php } else { ?>

    <p class="nocomments"><?php _e( 'Comments are closed.', 'framework' ); ?></p>

<?php } ?>

</section><!-- end of comments -->