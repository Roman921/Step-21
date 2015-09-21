<div id="image-slider" class="owl-carousel">
    <?php
    $args = array(
        'posts_per_page' => 16,
        'post_type' => 'product',
        'cat' => '',
        'orderby' => 'post_date',
        'post_status'  => 'publish' );
    $product_carousel_query = new WP_Query( $args );
    if ( $product_carousel_query->have_posts() ) :
    while ( $product_carousel_query->have_posts() ) : $product_carousel_query->the_post();
    ?>
    <div class="item">
        <a href="<?php echo esc_url( get_permalink() );?>">
            <?php if (has_post_thumbnail()) {
                echo woocommerce_get_product_thumbnail('shop_catalog');
                } ?>
        </a>
        <div class="carousel-caption">
            <?php the_title( sprintf( '<h6 class="product-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
            <?php echo woocommerce_get_template( 'loop/price.php' ); ?>
            <?php echo '<p>'.wp_trim_excerpt().'</p>'; ?>
        </div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
    endif
;?>
</div><!-- /.carousel -->
