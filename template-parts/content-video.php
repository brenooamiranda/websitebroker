<article <?php post_class(); ?>>
    <h2><?php the_title(); ?></h2>
    <?php the_post_thumbnail( array( 275, 275 ) ); ?>
    <div class="meta-info">
        <p><?php _e( 'Published in', 'wpseguros' ); ?> <?php echo get_the_date(); ?> <?php _e( 'by', 'wpseguros' ); ?> <?php the_author_posts_link(); ?></p>
        <p><?php _e( 'Categories:', 'wpseguros' ); ?> <?php the_category( ' ' ); ?></p>
        <p><?php the_tags( __( 'Tags: ', 'wpseguros' ), ', ' ); ?></p>
    </div>
    <?php the_content(); ?>
</article>