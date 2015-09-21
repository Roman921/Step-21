<?php
get_header()
?>

<?php
$categ = get_the_category($post->ID);
?><pre>
<?php // print_r($categ);?></pre>

 <?php $post_cat= $categ[0]->term_id; ?>


<!--PAGE TITLE -->
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
				<!-- post 1 -->
                                <?php if(have_posts()):while(have_posts()):the_post(); ?>
				<div class="post first_post">
                                    <h1><?php the_title()?></h1>
					
					<div class="post_meta">
						<span class="entry_date"><?php the_time('d.m.Y'); ?></span>
                                                <span class="entry_tags"><a href="<?php echo  get_category_link($post_cat) ?>"><?php echo get_cat_name($post_cat); ?></a></span>
						<span class="entry_comments"><p><?php comments_number('пока нет комментариев', '1 комменатар', '% комментарі'); ?>.</p></span>
					</div>
					
					<!--<img class="frame alignleft" src="content/210_130/1.jpg" alt="" />-->
					
                                        <p><?php the_content() ?></p>
				</div>
				<?php endwhile;?>
                                <?php endif; ?>
                                <?php comments_template()?>
				<h4>Comments:</h4>
				
				<ol>
					<li class="comment">
						<div class="comment_wrap clearfix">
							<div class="comment_meta">
								<span class="comment_author">admin</span>
								<a class="comment_reply" href="#">reply</a>
								<span class="comment_date">27 December, 2011 at 3:16 pm</span>
							</div>
					
							<div class="comment_body">
								<img alt="" src="content/40_40/1.png" class="avatar" height="40" width="40">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco!
								</p>
							</div>
						</div>
						
						<!-- Children comments -->
						<ol>
							<li class="comment">
								<div class="comment_wrap clearfix">
									<div class="comment_meta">
										<span class="comment_author">admin</span>
										<a class="comment_reply" href="#">reply</a>
										<span class="comment_date">27 December, 2011 at 3:16 pm</span>
									</div>
							
									<div class="comment_body">
										<img alt="" src="content/40_40/1.png" class="avatar" height="40" width="40">
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco!
										</p>
									</div>
								</div>
							</li>
							
							<li class="comment">
								<div class="comment_wrap clearfix">
									<div class="comment_meta">
										<span class="comment_author">admin</span>
										<a class="comment_reply" href="#">reply</a>
										<span class="comment_date">27 December, 2011 at 3:16 pm</span>
									</div>
							
									<div class="comment_body">
										<img alt="" src="content/40_40/1.png" class="avatar" height="40" width="40">
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco!
										</p>
									</div>
								</div>
							</li>
						</ol>
					</li>
				</ol>
			</div>
			
			<!-- SIDEBAR -->
			<?php get_sidebar() ?>
			
			<div class="clear"></div>
		</div>
	</div>

<br>

<?php get_footer() ?>
