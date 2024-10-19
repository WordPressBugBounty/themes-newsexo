<?php 
$newsexo_trending_news_disabled = get_theme_mod('newsexo_trending_news_disabled', true); 
$newsexo_trending_news_area_title = get_theme_mod('newsexo_trending_news_area_title', __('TRENDING NEWS', 'newsexo'));
$newsexo_theme_trending_news_category = get_theme_mod('newsexo_theme_trending_news_category');

if($newsexo_trending_news_disabled == true): ?>
	<!-- Trending News Scroll Marquee -->
	<section id="content" class="trending-news-area wow animate fadeInUp" data-wow-delay=".3s">
		<div class="container-full">
			<div class="row g-lg-3">
				<div class="col-lg-12">
					<div class="trending-news-col align-items-center"> 
						<div class="heading">
						<?php if($newsexo_trending_news_area_title != null): ?>	
							<h5><?php echo esc_html($newsexo_trending_news_area_title);?> <i class="fa-solid fa-person-walking-arrow-right fa-flip" style="--fa-animation-duration: 3s;"></i></h5>
					    <?php endif;  ?>
						</div> 
						<div class="news-content-area align-items-center"> 
							<marquee behavior="scroll" direction="left" scrollamount="7" class="trending-news-content" onmouseover="this.stop();" onmouseout="this.start();">
							<?php
							$post_args = array( 'post_type' => 'post', 'posts_per_page' => 5 , 'category__in' => $newsexo_theme_trending_news_category, 'post__not_in'=>get_option("sticky_posts")) ;
								query_posts( $post_args );
								if(query_posts( $post_args ))
								{	
									while(have_posts()):the_post();
									{ ?>	
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>	
											<h6 class="aft-flashnews-title"><?php the_title();?></h6>
										</a>
									<?php }  
									endwhile;
									wp_reset_query();									
								} ?>
				                </marquee>
			            </div> 
					</div> 
				</div>
			</div>
		</div>
	</section>
	<!-- End of Trending News Scroll Marquee -->
<?php endif; ?>



