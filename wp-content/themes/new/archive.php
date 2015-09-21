<?php get_header()?>
	
	<?php $thisCat = get_category(get_query_var('cat'),false); //Дані теперішньої категорії
		//print_r($thisCat );
		 $term_taxonomy_id  =  $thisCat->term_taxonomy_id;
		  $images_raw  = get_option( 'taxonomy_image_plugin' );
		   $term_taxonomy_image_full = wp_get_attachment_image( $images_raw[ $term_taxonomy_id ], 'full' );
		?>
		<div class="container_12">
		<div style="display:inline-block;width:20%;">
		<?php echo  $term_taxonomy_image_full; ?>
			
			</div>
		<div style="width:50%;margin-left:3%;display:inline-block;vertical-align:top;">
		
		<h1><?php single_cat_title(); ?> </h1>
		<?php echo category_description($term_taxonomy_id); ?>
</div>
		</div>
		
		
		
	<!-- CALL TO ACTION -->
	<div id="cta">
		<div id="cta_inner">
			<p class="cta_text">
				Lorem ipsum dolor sit amet, <a href="#">consectetur adipisicing</a> elit, sed do eiusmod tempor incididunt ut labore et dolore!
			</p>
			
			<a class="cta_button" href="about.html">Learn More<span></span></a>
		</div>
		<div class="shadow_bottom"></div>
	</div>
	
	
	
	
	<!-- FEATURED -->
	<div class="section">
		
	
	
	
	<div class="sep"></div>
	
	<!-- BLOG -->
	<div id="blog">
		<div class="container_12">
			<div class="grid_8">
                            <h2><?php single_cat_title() ?></h2>
				
				<!-- post 1 -->
                            
                                    <?php if(have_posts()):while (have_posts()) :the_post() ?>
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
					<?php echo paginate_links() ?>
				</div>
			</div>
			
			<?php get_sidebar()?>
			
			<div class="clear"></div>
		</div>
	</div>
	
	<?php  get_footer() ?>