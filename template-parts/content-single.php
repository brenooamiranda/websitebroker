<article id="post-<?php the_ID();?>" <?php post_class(); ?>>

    <header>
        <h1><?php the_title(); ?></h1>
        <div class="meta-info">
            <p><?php _e( 'Posted in', 'wpseguros' ); ?> <?php echo get_the_date(); ?> <?php _e( 'by', 'wpseguros' ); ?> <?php the_author_posts_link(); ?></p>
            <p><?php _e( 'Categories:', 'wpseguros' ); ?> <?php the_category( ' ' ); ?></p>
            <p><?php the_tags( __( 'Tags: ', 'wpseguros' ), ', ' ); ?></p>
        </div>
    </header>

    <div class="content">
        <?php the_content(); ?>
    </div>

</article>