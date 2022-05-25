<article <?php post_class(); ?>>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="meta-info">
        <p><?php _e( 'Published in', 'wpseguros' ); ?> <?php echo get_the_date(); ?> <?php _e( 'by', 'wpseguros' ); ?> <?php the_author_posts_link(); ?></p>
        <?php if( has_category() ):  ?>
            <p><?php _e( 'Categories:', 'wpseguros' ); ?> <?php the_category( ' ' ); ?></p>
        <?php endif; ?>
        <p><?php the_tags( __( 'Tags: ', 'wpseguros' ), ', ' ); ?></p>
    </div>
    <?php the_excerpt(); ?>
</article>