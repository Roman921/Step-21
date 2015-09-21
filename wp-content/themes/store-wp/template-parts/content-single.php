<?php
/*
 * The template used for displaying page content in single.php
 *
 * @package Store WP
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('panel'); ?>>
    <header class="entry-header">
        <?php igthemes_before_post_title(); ?>
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php igthemes_after_post_title(); ?>
        <div class="entry-meta">
            <?php igthemes_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php igthemes_before_post_content(); ?>
            <?php the_content(); ?>
        <?php igthemes_after_post_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'store-wp' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php igthemes_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
