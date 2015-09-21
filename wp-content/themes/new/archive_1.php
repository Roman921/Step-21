<?php get_header()?>
	
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
				<div class="post image_left">
					<div class="post_image">
						<!-- Simple Slideshow -->
						<ul class="dm3_slider" style="width: 210px; height: 130px;">
							<li class="slide" data-enlargeurl="content/enlarged/1.jpg">
								<img src="<?php bloginfo('template_url')?>/content/210_130/1.jpg" width="210" height="130" alt="" />
							</li>
							
							<li class="slide" data-enlargeurl="content/enlarged/2.jpg">
								<img src="<?php bloginfo('template_url')?>/content/210_130/2.jpg" width="210" height="130" alt="" />
							</li>
						</ul>
						
						<div class="lb_controls dm3_slider_nav">
							<a class="lb_link" href="#" title="Link"></a>
							<a class="lb_magnify" href="content/enlarged/1.jpg" title="Picture Title"></a>
							<a class="lb_prev dm3_prev" href="#" title="Prev"></a>
							<a class="lb_next dm3_next" href="#" title="Next"></a>
						</div>
					</div>
					
					<h3><a href="#">Lorem ipsum dolor sit amet</a></h3>
					
					<div class="post_meta">
						<span class="entry_date">23 December 2011</span>
						<span class="entry_tags"><a href="#">News</a></span>
						<span class="entry_comments">25 comments</span>
					</div>
					
					<p>
						Donec a odio massa, eget malesuada libero. Donec tempor nisl at quam imperdiet in accumsan nunc bibendum. Donec magna elit, scelerisque nec interdum ac, ullamcorper at lorem. Vestibulum cursus arcu eu lorem feugiat at rutrum erat facilisis.
					</p>
					
					<p>
						<a class="button" href="about.html">Read More!<span></span></a>
					</p>
				</div>
				
				<!-- post 2 -->
				<div class="post image_left">
					<div class="post_image">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/content/210_130/2.jpg" width="210" height="130" alt="" />
						</a>
						
						<div class="lb_controls">
							<a class="lb_link" href="#" title="Link"></a>
							<a class="lb_magnify" href="content/enlarged/1.jpg" title="Picture Title"></a>
						</div>
					</div>
					
					<h3><a href="#">Lorem ipsum dolor sit amet</a></h3>
					
					<div class="post_meta">
						<span class="entry_date">23 December 2011</span>
						<span class="entry_tags"><a href="#">News</a></span>
						<span class="entry_comments">25 comments</span>
					</div>
					
					<p>
						Donec a odio massa, eget malesuada libero. Donec tempor nisl at quam imperdiet in accumsan nunc bibendum. Donec magna elit, scelerisque nec interdum ac, ullamcorper at lorem. Vestibulum cursus arcu eu lorem feugiat at rutrum erat facilisis.
					</p>
					
					<p>
						<a class="button" href="about.html">Read More!<span></span></a>
					</p>
				</div>
				
				<div class="continue_reading">
					<a href="blog.html">Get More News &raquo;</a>
				</div>
			</div>
			
			<?php get_sidebar()?>
			
			<div class="clear"></div>
		</div>
	</div>
	
	<?php  get_footer() ?>