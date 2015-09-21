<?php get_header() ?>
	<!-- PAGE TITLE -->
	<div id="cta">
		<div id="cta_inner">
			<h2>Blog</h2>
			
			<p class="page_meta">
				Like this template? <a href="#">Buy Now!</a>
			</p>
		</div>
		<div class="shadow_bottom"></div>
	</div>
	
	<!-- BLOG -->
	<div id="blog">
		<div class="container_12">
			<div class="grid_8">
			<?php //var_dump($post) ?>
			<?php $post_cat = get_the_category($post->ID); ?>
			
			
			
			<?php $tern_id =  $post_cat[0]->term_id;?>
			<div class="woocommerce">
                              <?php woocommerce_content(); ?>
							  </div>
				</div>
			
				
					
								</div>
							</li>
						</ol>
					</li>
				</ol>
			</div>
			
			<!-- SIDEBAR -->
			<?php get_sidebar()?>
			
			<div class="clear"></div>
		</div>
	</div>
	
	<!-- FOOTER -->
		<?php get_footer() ?>