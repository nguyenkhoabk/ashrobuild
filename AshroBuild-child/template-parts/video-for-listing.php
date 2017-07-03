<?php 
	global $post;
    $format = get_post_format();
?>

<article <?php post_class('span6'); ?>>
    <header>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </header>
    <?php get_template_part( "post-formats/$format" ); ?>
    <p><?php framework_excerpt(40);  ?></p>
    <a class="real-btn" href="<?php the_permalink(); ?>"><?php _e('Read more', 'framework'); ?></a>
</article>
