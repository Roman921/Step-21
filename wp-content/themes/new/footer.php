<!-- FOOTER -->
	<div id="footer">
		<div class="container_12">
			
			<div class="grid_4">
				<div class="widget">
                                    <!--
					<h4>Links</h4>
					
					<ul>
						<li><a href="#">Lorem Ipsum</a></li>
						<li><a href="#">Adispisicing</a></li>
						<li><a href="#">Consectetur</a></li>
						<li><a href="#">Lorem Ipsum</a></li>
						<li><a href="#">Elite</a></li>
						<li><a href="#">Consectetur</a></li>
					</ul>
                                    -->
                                    <?php dynamic_sidebar( 'sidebar_first' ); ?>
				</div>
                            	
                          
			</div>
			<div class="grid_4">
				<div class="widget">
                                   
                                     <?php dynamic_sidebar('sidebar_2') ?>
                                    <!--
					<h4>About Us</h4>
					
					<div>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
				</div>
				
				-->
			</div>
			
		
			</div>
			<div class="grid_4">
				<div class="widget">
                                     <?php dynamic_sidebar('sidebar_last') ?>
                                    <!--
					<h4>Links</h4>
					
					<ul>
						<li><a href="#">Lorem Ipsum</a></li>
						<li><a href="#">Adispisicing</a></li>
						<li><a href="#">Consectetur</a></li>
						<li><a href="#">Lorem Ipsum</a></li>
						<li><a href="#">Elite</a></li>
					</ul>
                                        -->
				</div>
			</div>
			
			
			
			<div class="clear"></div>
			<div id="first_column_bg"></div>
		</div>
		<div id="footer_border_inner"></div>
		<div id="footer_border_outer"></div>
	</div>
	
	<!-- COPYRIGHT INFO -->
	<div id="copyright">
		<div class="container_12 clearfix">
			<p class="grid_6">&copy; <a href="#">dm3studio.com</a> &mdash; All rights reserved, 2011. <a class="scroll_to" href="body.html">top</a></p>
			
			<ul class="social_icons">
				<li>
					<a href="#" title="Facebook"><img src="<?php bloginfo('template_url')?>/images/icons/facebook.png" alt="" /></a>
				</li>
				
				<li>
					<a href="#" title="Twitter"><img src="<?php bloginfo('template_url')?>/images/icons/twitter.png" alt="" /></a>
				</li>
				
				<li>
					<a href="#" title="Rss"><img src="<?php bloginfo('template_url')?>/images/icons/rss.png" alt="" /></a>
				</li>
			</ul>
		</div>
	</div>
	
<?php wp_footer() ?>


          
	<!-- JAVASCRIPTS 
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/dm3Slideshow.jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/dm3FadeSlider.jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/prettyPhoto/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery.dmTabs.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/custom.js"></script>-->
</body>
</html>