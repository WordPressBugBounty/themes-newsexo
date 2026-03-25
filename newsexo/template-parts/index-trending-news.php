<?php 
$newsexo_trending_news_disabled = get_theme_mod('newsexo_trending_news_disabled', true); 
$newsexo_trending_news_area_title = get_theme_mod('newsexo_trending_news_area_title', __('TRENDING NEWS', 'newsexo'));
$newsexo_theme_trending_news_category = get_theme_mod('newsexo_theme_trending_news_category');

if($newsexo_trending_news_disabled == true): ?>
	<!-- Trending News Scroll Marquee -->
	<section id="content" class="trending-news-area news-highlights-area wow animate fadeInUp" data-wow-delay=".3s">
		<div class="container-full">
			<div class="row g-lg-3">
				<div class="col-lg-12">
					<div class="trending-news-col align-items-center"> 
						<div class="news-highlights-title">
						<?php if($newsexo_trending_news_area_title != null): ?>	
							<h5><?php echo esc_html($newsexo_trending_news_area_title);?> <i class="fa-solid fa-person-walking-arrow-right fa-flip" style="--fa-animation-duration: 3s;"></i></h5>
					    <?php endif;  ?>
						</div> 
						<div class="news-marquee-wrapper">
							<div class="news-highlights" style="animation-duration: 30s;">
							<?php
							$post_args = array( 'post_type' => 'post', 'posts_per_page' => 5 , 'category__in' => $newsexo_theme_trending_news_category, 'post__not_in'=>get_option("sticky_posts")) ;
								query_posts( $post_args );
								if(query_posts( $post_args ))
								{	
									while(have_posts()):the_post();
									{ ?>	
										<article class="news-headline-post">	
											<figure class="news-headline-post-thumbnail"><?php the_post_thumbnail(); ?></figure>	
											<div class="news-headline-post-content">
												<a href="<?php the_permalink(); ?>">
													<h6 class="news-headline-post-title"><?php the_title();?></h6>
												</a>
											</div>
										</article>
									<?php }  
									endwhile;
									wp_reset_query();									
								} ?>
				            </div>
			            </div> 
					</div> 
				</div>
			</div>
		</div>
	</section>
	<!-- End of Trending News Scroll Marquee -->
<?php endif; ?>



