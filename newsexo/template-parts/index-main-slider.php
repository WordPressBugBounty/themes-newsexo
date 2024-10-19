<?php 
$newsexo_big_news_slider_disabled = get_theme_mod('newsexo_big_news_slider_disabled', true); 
$newsexo_theme_big_news_slider_category = get_theme_mod('newsexo_theme_big_news_slider_category');
$newsexo_theme_big_static_news_category = get_theme_mod('newsexo_theme_big_static_news_category');

if($newsexo_big_news_slider_disabled == true): ?>
	<!--Big News Section -->
	<section class="big-news-section">
		
		<div class="container-full">
			<div class="row g-lg-2">
				
				<!--Slider Post -->
				<div class="col-lg-6 col-md-12 wow animate zoomIn" data-wow-delay=".3s">
					
					<div id="news-slider" class="owl-carousel owl-theme">
					
						<?php
							$post_args = array( 'post_type' => 'post', 'posts_per_page' => 5, 'category__in' => $newsexo_theme_big_news_slider_category, 'post__not_in'=>get_option("sticky_posts")) ;
								query_posts( $post_args );
								if(query_posts( $post_args ))
								{	
									while(have_posts()):the_post();
									{ ?>	
														
					
						<div class="item">
							<article class="post overlay-news-area">								
								<figure class="post-thumbnail">
								<?php $img_class =array('class' => "img-fluid");?>
									<a class="img-block" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$img_class);?></a>
									
									
									<figcaption class="post-content">
										<div class="entry-meta">
										<span class="cat-links links-space">
									<?php	
										$categories = get_the_category();
											if ( ! empty( $categories ) ) {
											foreach( $categories as $category ) {	
												echo ' <a class="links-bg '.esc_attr($category->slug).'" href="' . esc_url( get_category_link( $category->term_id ) ) . '"><span>' . esc_html( $category->name ) . '</span></a>';
											}
											}
										?>
										</span>
										</div>
										<header class="entry-header">
											<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
										</header>
										<div class="entry-meta align-self-center">
											<span class="author">
											
											<?php 
											
											 echo get_avatar( get_the_author_meta('ID'), 50, '', '', $args = array( 'class' => 'avatar-default' ) ); ?>
												<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo esc_html(get_the_author());?></a>
											</span>
											
											<span class="posted-on">
											   <i class="fa-regular fa-clock"></i>
			                                   <a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time>
									            <?php echo esc_html(get_the_date('M j, Y')); ?></time></a>
											</span>
								
											
											
											<span class="comment-links"><i class="fa-solid fa-comment-dots"></i><a href="<?php the_permalink(); ?>#respond"><?php echo esc_html( get_comments_number() ); ?></a></span>
										</div>									
									</figcaption>	
								</figure>		
							</article>
						</div>
									<?php }  
									endwhile;
									wp_reset_query();									
								} ?>

					</div>
					
					
				</div>
				<!--/Slider Post -->			
				<!--Static Post -->
				<div class="col-lg-6 col-md-12">
					<div class="row g-lg-2 align-items-start">
					
					<?php
							$post_args = array( 'post_type' => 'post', 'posts_per_page' => 4, 'category__in' => $newsexo_theme_big_static_news_category, 'post__not_in'=>get_option("sticky_posts")) ;
								query_posts( $post_args );
								if(query_posts( $post_args ))
								{	
									while(have_posts()):the_post();
									{ ?>
					
						<div class="col-lg-6">
							<article class="post overlay-news-area wow animate zoomIn" data-wow-delay=".3s">								
								<figure class="post-thumbnail">
								
								<?php $img_class =array('class' => "img-fluid");?>
									<a class="img-block" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$img_class);?></a>

									<figcaption class="post-content">
										<div class="entry-meta">
											<span class="cat-links links-space">
													<?php	
										$categories = get_the_category();
											if ( ! empty( $categories ) ) {
											foreach( $categories as $category ) {	
												echo ' <a class="links-bg '.esc_attr($category->slug).'" href="' . esc_url( get_category_link( $category->term_id ) ) . '"><span>' . esc_html( $category->name ) . '</span></a>';
											}
											}
										?>
											</span>
										</div>		
										<header class="entry-header">
											<h6 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h6>
										</header>
										<div class="entry-meta align-self-center">
											<span class="author">
											<?php echo get_avatar( get_the_author_meta('ID'), 50, '', '', $args = array( 'class' => 'avatar-default' ) ); ?>
												<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo esc_html(get_the_author());?></a>
											</span>
											<span class="posted-on"><i class="fa-regular fa-clock"></i>
											
											 <a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time>
									            <?php echo esc_html(get_the_date('M j, Y')); ?></time></a>
											</span>
										</div>	
									</figcaption>	
								</figure>		
							</article>
						</div>
						
									<?php }  
									endwhile;
									wp_reset_query();									
								} ?>
					
					</div>
				</div>
				<!--/Static Post -->	

			</div>
		</div>	
	</section>
	<!-- /End of Big News Section -->	
<?php endif; ?>



