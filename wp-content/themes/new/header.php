<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	
	<title>Theme Title</title>
	
	<!-- STYLES -->
	<link type="text/css" rel="stylesheet" media="all" href="<?php bloginfo('template_url') ?>/css/blue2.css" />
	<link type="text/css" rel="stylesheet" media="all" href="<?php bloginfo('template_url') ?>/js/prettyPhoto/css/prettyPhoto.css" />
		<link type="text/css" rel="stylesheet" media="all" href="<?php bloginfo('template_url') ?>/style.css" />
        <!--[if IE 7]><link type="text/css" rel="stylesheet" media="screen" href="css/ie7.css" /><![endif]-->
	<!--[if IE 8]><link type="text/css" rel="stylesheet" media="screen" href="css/ie8.css" /><![endif]-->
	       <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		   <script scr="wp-content/plugins/ml-slider/assets/sliders/nivoslider/jquery.nivo.slider.pack.js"></script>
             
              
	<!-- FONT -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
<?php wp_head() ?>
</head>
  <script>
     

       $(function(){
           
             
       })
            
  
      
        </script>
<body class="homepage">

  <?php  /*query_posts( 'p=36' ); ?>
    <?php if(have_posts()):while (have_posts()) :the_post() ?>
<?php the_title() ?>
    
    <?php //the_excerpt()?>
    
	<?php the_content()?>
    <h1><a href="<?php the_permalink() ?>"><?php the_title()?></a></h1>
<?php endwhile;?>
    
     <?php endif; ?>
    */
    ?>
	<!-- NAVIGATION -->
	<div id="header">
		<div id="header_inner">
                    <a id="logo" href="<?php echo home_url();?>">
				<img src="<?php bloginfo('template_url')?>/images/logo.png" alt="Logo" />
			</a>
			
	<!--menu - назва з адмінки
        theme_location  - ключ з functions.php
        -->		

<?php wp_nav_menu( array('menu' => 'Main_menu',
'items_wrap'=>'<ul id="nav" class="%2$s">%3$s</ul>' ));  

?><!--
                   <br> <br>                   <br> <br>

                    <?php  wp_nav_menu( array('menu' => 'Menu 3',
                        'items_wrap'=>'<ul id="2">%3$s</ul>'));   //Вивід меню по назві з адмінки ?>
			 <br> <br> 
  <?php  wp_nav_menu( array('theme_location' => 'menu2',
                             'items_wrap'        => '<ul id="nav" >%3$s</ul>',
                             )); ////Вивід меню по ключу (functions.php)?>
                       -->
		</div>
		<?php qtrans_generateLanguageSelectCode($type='image'); ?>
	</div>
	<?php 
    echo do_shortcode("[metaslider id=64]"); 
    
?>

