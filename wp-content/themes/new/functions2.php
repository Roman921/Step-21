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

