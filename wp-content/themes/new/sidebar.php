<!-- SIDEBAR -->
			<div class="grid_4 sidebar">
				<!-- Menu widget -->
				<div class="widget">
					<h4 class="widget_title">Category Menu</h4>
                                        
                                      <?php  wp_list_categories(array('hide_empty'=>'0',
                                          'child_of'=>'3',
                                          'title_li' =>''
                                          
                                          ) );?>
					<!--
					<ul class="widget_menu">
						<li><a href="#">Lorem Ipsum</a></li>
						<li><a href="#">Adispisicing</a></li>
						<li>
							<a href="#">Dolor</a>
							
						</li>
						<li><a href="#">Consectetur</a></li>
						<li><a href="#">Elite</a></li>
						<li><a href="#">Lorem Ipsum</a></li>
					</ul>-->
                                        
                                        
                                        
				</div>
                                <ul><?php dynamic_sidebar('search') ?></ul>
				<!-- Testimonials widget -->
				<div class="widget">
					<!--<h4 class="widget_title">Testimonials</h4>
					
					<ul class="testimonials">
						<!-- testimonial 1 -->
						<li class="slide">
							<p>
								Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?
							</p>
							
							<div class="author">
								<img class="frame" src="content/customers/1.jpg" width="40" height="40" alt="" />
								<span class="author_name">Customer One</span>
								Company One
							</div>
						</li>
						
						
					</ul>
					
				
				</div>-->
				
				<div class="sidebar_top"></div>
				<div class="sidebar_bottom"></div>
			</div>