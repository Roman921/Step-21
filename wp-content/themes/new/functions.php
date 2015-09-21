<?php
wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );


register_nav_menus( array(
	'primary' => 'Головне',
	'menu2' => 'Меню в подвале'
) );

function register_my_widgets(){
	register_sidebar( array(
		'name' => "Футер 1",
		'id' => 'sidebar_first',
		'description' => 'в футері  сайту',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	) );
        
   	register_sidebar( array(
		'name' => "Футер 2",
		'id' => 'sidebar_2',
		'description' => 'в футері  сайту',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	) );
        
        register_sidebar( array(
		'name' => "Футер 3",
		'id' => 'sidebar_last',
		'description' => ' в футері  сайту',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	) );
        
       /* register_sidebar(3, array(
		'name' => "Футер 1",
		'id' => 'sidebar_%d',
		'description' => 'в футері  сайту',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	) );
        */
        
        register_sidebar( array(
		'name' => "sss",
		'id' => 'search',
		
	) );
        
}

add_action( 'widgets_init', 'register_my_widgets' );


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section  class="container container_12 woocommerce">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}


add_theme_support( 'woocommerce' ); 

