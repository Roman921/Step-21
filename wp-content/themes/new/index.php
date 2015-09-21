<?php get_header() ?>
<br><br>
<?php if(get_locale() =='ru'){echo 'ру текст' ;}elseif(get_locale()=="en_US"){ echo " Language English";}else{ echo 'Український текст';}  ?>
	<!-- CALL TO ACTION -->
       <?php // var_dump($post)?>
	 
	<div id="cta">
		<div id="cta_inner">
			<p class="cta_text">
				Lorem ipsum dolor sit amet, <a href="#">consectetur adipisicing</a> elit, sed do eiusmod tempor incididunt ut labore et dolore!
			</p>
			
			<a class="cta_button" href="about.html">Learn More<span></span></a>
		</div>
		<div class="shadow_bottom"></div>
	</div>
        
		<!-- SLIDESHOW -->
		 <?php echo $date_pub = substr($post->post_date,0,10); ?>
		
                <?php 
    echo do_shortcode("[metaslider id=45]"); 
?>
<?php /*	<div id="slideshow_wrap">
		<div id="slideshow">
			<div class="slideshow_controls">
				<a class="prev" href="#" title="Previous"></a>
				<a class="start" href="#"></a>
				<a class="next" href="#" title="Next"></a>
			</div>
			
			<ul>
				<!-- slide 1 -->
				<li>
				
					
				</li>
				
				<!-- slide 2 -->
				<li>
					<img src="<?php bloginfo('template_url')?>/content/1600_500/2.jpg" width="1600" height="500" alt="" />
					
				</li>
				
				<!-- slide 3 -->
				<li>
					<img src="<?php bloginfo('template_url')?>/content/1600_500/3.jpg" width="1600" height="500" alt="" />
					
				</li>
				
				<!-- slide 4 -->
				<li>
					<img src="<?php bloginfo('template_url')?>/content/1600_500/2.jpg" width="1600" height="500" alt="" />
					
				</li>
			</ul>
		</div>
		
		<div id="slideshow_shadow"></div>
	</div>*/?>
	
	
	
	<!-- FEATURED -->
	<div class="section">
		<div class="container_12">
			<h2 class="grid_12 section_title">Our Works</h2>
                        <?php query_posts('cat=2&&showposts=3') ?>
                          <?php if(have_posts()):while (have_posts()) :the_post() ?>
			<div class="featured grid_4">
				
				<div class="framed_image">
					<!--<img src="<?php bloginfo('template_url')?>/content/290_180/1.jpg" width="290" height="180" alt="" />
					-->
                                        <?php the_post_thumbnail(array(220,190))?>
					<div class="lb_controls">
						<a class="lb_link" href="#" title="Link"></a>
						<a class="lb_magnify" href="content/enlarged/1.jpg" title="Picture Title"></a>
					</div>
				</div>
				<h4><?php the_title() ?></h4>
				
				<p>
					<?php the_excerpt()?>
				</p>
				
				<p>
                                    <a class="button" href="<?php the_permalink() ?>">Learn More!<span></span></a>
				</p>
			</div>
                        <?php endwhile;?>
                        <?php endif;?>
			<!--
			<div class="featured grid_4">
				<div class="framed_image">
					<img src="<?php bloginfo('template_url')?>/content/290_180/2.jpg" width="290" height="180" alt="" />
					
					<div class="lb_controls">
						<a class="lb_link" href="#" title="Link"></a>
						<a class="lb_magnify" href="content/enlarged/1.jpg" title="Picture Title"></a>
					</div>
				</div>
				
				<h4>Lorem ipsum dolor sit amet</h4>
				
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
				</p>
				
				<p>
					<a class="button" href="about.html">Learn More!<span></span></a>
				</p>
			</div>
			
			<div class="featured grid_4">
				<div class="framed_image">
					<img src="<?php bloginfo('template_url')?>/content/290_180/3.jpg" width="290" height="180" alt="" />
					
					<div class="lb_controls">
						<a class="lb_link" href="#" title="Link"></a>
						<a class="lb_magnify" href="content/enlarged/1.jpg" title="Picture Title"></a>
					</div>
				</div>
				
				<h4>Lorem ipsum dolor sit amet</h4>
				
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
				</p>
				
				<p>
					<a class="button" href="about.html">Learn More!<span></span></a>
				</p>
			</div>
			-->
			<div class="clear"></div>
		</div>
	</div>
		<?php
 wp_nav_menu( array('theme_location' => 'menu2',
'items_wrap'=>'<ul id="two"></ul>'));  ?>
	<!-- ABOUT US -->
	<div class="section grey icons_list">
		<div class="container_12">
                    
                    <!-- query_post(p=40)-->
                    <!-- loop -->
			<h2 class="grid_12 section_title">About Us<!--title--></h2>
			
			<div class="grid_12">
				<p>
					
				<!--title_exert()-->	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
				</p>
			</div>
			
			
			<div class="clear"></div>
		</div>
            <!-- end -->
		<div class="shadow_top"></div>
		<div class="shadow_bottom"></div>
	</div>
	
	<!-- OUR WORKS -->
	<div class="section">
		<div class="container_12">
			<h2 class="grid_12 section_title">Our Partners</h2>
			
			<div class="clear"></div>
                        
                     <?php echo do_shortcode('[jw_easy_logo slider_name="Logo_sl"]'); ?>
                      
			<!--
			<ul id="carousel">
			    <li>
			    	<img src="<?php bloginfo('template_url')?>/content/210_130/1.jpg" width="210" height="130" alt="" />
			    	
			    	
					
				
			    </li>
			    
			    <li>
			    	<img src="<?php bloginfo('template_url')?>/content/210_130/2.jpg" width="210" height="130" alt="" />
			    	
			    	
			    </li>
			    
			    <li>
			    	<img src="<?php bloginfo('template_url')?>/content/210_130/3.jpg" width="210" height="130" alt="" />
			    	
			    	
			    </li>
			    
			    <li>
			    	<img src="<?php bloginfo('template_url')?>/content/210_130/2.jpg" width="210" height="130" alt="" />
			    	
			    	
			    </li>
			    
			    <li>
			    	<img src="<?php bloginfo('template_url')?>/content/210_130/1.jpg" width="210" height="130" alt="" />
			    	
			    	
			    </li>
			    
			    <li>
			    	<img src="<?php bloginfo('template_url')?>/content/210_130/2.jpg" width="210" height="130" alt="" />
			    	
			    	
					
					<h3 class="fade_in_title">Title of the Work</h3>
			    </li>
			</ul>-->
		</div>
	</div>
	
	<div class="sep"></div>
	
	<!-- BLOG -->
	<div id="blog">
		<div class="container_12">
			<div class="grid_8">
                            <h2><a href="<?php echo  get_category_link(3)?>"><?php echo  get_cat_name(3); ?></a></h2>
				
				<!-- post 1 -->
                                <?php // query_posts('cat=3&&showposts=5') 
								?>
								
							<?php
                               $week = date('W');
$year = date('Y');
							//query_posts( 'year=' . $year . '&w=' . $week ); ?>
                                    <?php if(have_posts()):while (have_posts()) :the_post() ?>
									<?php// the_date('Y-m-d');?>
										 <?php // echo $date_pub = substr($post->post_date,0,10); ?>
				
					<?php//	echo (date("d = F = Y ")); ?>
									
				<div class="post image_left">
					<div class="post_image">
						<!-- Simple Slideshow -->
						<ul class="dm3_slider" style="width: 210px; height: 130px;">
							<li class="slide" >
								<?php the_post_thumbnail(array(220,180)) ?>
							</li>
							
							
						</ul>
						
						<div class="lb_controls dm3_slider_nav">
							<a class="lb_link" href="#" title="Link"></a>
							<a class="lb_magnify" href="content/enlarged/1.jpg" title="Picture Title"></a>
							<a class="lb_prev dm3_prev" href="#" title="Prev"></a>
							<a class="lb_next dm3_next" href="#" title="Next"></a>
						</div>
					</div>
					
                                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
					
					<div class="post_meta">
						<span class="entry_date">23 December 2011</span>
						<span class="entry_tags"><a href="#">News</a></span>
						<span class="entry_comments">25 comments</span>
					</div>
					
					<p>
						<?php the_excerpt() ?>
					</p>
					
					<p>
                                            <a class="button" href="<?php the_permalink() ?>">Read More!<span></span></a>
					</p>
				</div>
				<?php endwhile; ?>
                                <?php endif; ?>
				<!-- post 2 -->
				
				
				<div class="continue_reading">
					<a href="blog.html">Get More News &raquo;</a>
				</div>
			</div>
			<?php echo do_shortcode('[woocommerce_cart] ');?>
			<!-- SIDEBAR -->
			<?php get_sidebar() ?>
			
			<div class="clear"></div>
			
		</div>
	</div>
	
	<?php get_footer() ?>