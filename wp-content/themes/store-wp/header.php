<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Store WP
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'store-wp' ); ?></a>

<header id="masthead" class="site-header" role="banner">
    <div class="header-top-menu">
        <div class="grid-1200">
            <div class="row">
                <p class="nav-site-description col6"><?php do_action( 'igthemes_header_nav_text_action' ); ?></p>
                <nav class="header-menu col6 last" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'depth' => 1 ) ); ?>
                </nav>
            </div><!-- row -->
        </div><!-- .grid1200 -->
    </div><!-- .header-top-menu -->
    <div class="grid-1200">
        <div class="row">
            <?php igthemes_header(); ?>
        </div><!-- row -->
    </div><!-- .grid1200 -->
    <div class="main-menu">
        <nav id="site-navigation" class="main-navigation" role="navigation">
       <div class="grid-1200">
           <div class="col12">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="icon_menu-square_alt2"></span> <?php esc_html_e( 'Menu', 'store-wp' ); ?></button>
              <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                </div><!-- .col12 -->
            </div><!-- .grid-1200 -->
        </nav><!-- #site-navigation -->
    </div><!-- .main-menu -->
</header><!-- #masthead -->

<?php $slide = igthemes_option( 'shop_slide' );?>
<?php if (class_exists( 'WooCommerce' ) && is_shop() && $slide) { ?>
    <?php get_template_part('core-framework/partials/image-carousel') ?>
<?php } ?>

    <div id="content" class="site-content grid-1200">
<div class="row">

<?php igthemes_before_content();?>
