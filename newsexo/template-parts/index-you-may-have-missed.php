<?php 
$newsexo_you_have_missed_disabled = get_theme_mod('newsexo_you_have_missed_disabled', true);
$newsexo_you_have_missed_news_category = get_theme_mod('newsexo_you_have_missed_news_category');
$newsexo_you_have_missed_section_title = get_theme_mod('newsexo_you_have_missed_section_title', __('YOU MAY HAVE MISSED', 'newsexo'));
$missed_post = '4';
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme = $activate_theme_data->name;
if( 'News Digest' == $activate_theme ){
	$vrsn_two_class = 'vrsn-three';
}
elseif( 'Newsio' == $activate_theme || 'Seattle News' == $activate_theme || 'News Gadgets' == $activate_theme){
	$vrsn_two_class = 'vrsn-two';
}else{ $vrsn_two_class = ''; }
if($newsexo_you_have_missed_disabled == true): ?>
	
	<!-- Sponsored News Section-->
	<section class="sponsored-news-section">
		<div class="container-full">
			
			<!--Grid View Post -->
			<div class="row mb-space-20">
				
				<div class="col-12">
					<span class="news-section-title wow animate fadeInUp" data-wow-delay=".3s">
						<h5 class="f-heading"><?php echo esc_html($newsexo_you_have_missed_section_title);?> <i class="fa-solid fa-bullhorn"></i></h5>
					</span>
				</div>
				
				<div class="col-12">
					<div class="row">
						
				<?php
					$post_args = array( 'post_type' => 'post', 'category__in' => $newsexo_you_have_missed_news_category, 'post__not_in'=>get_option("sticky_posts"), 'posts_per_page'      => $missed_post,) ;
						query_posts( $post_args );
							if(query_posts( $post_args ))
								{	
									while(have_posts()):the_post();
								{ ?>
						
						
							<div class="col-lg-3 col-md-6 col-sm-12">
								<article class="post grid-view-news-area wow animate zoomIn <?php echo $vrsn_two_class; ?>" data-wow-delay=".3s">
									<figure class="post-thumbnail">
										<?php $img_class =array('class' => "img-fluid");?>
										<a class="img-block" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$img_class);?></a>
									</figure>	
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
											<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
										</header>									
										<div class="entry-meta meta-two align-self-center">
											<span class="author">
											<?php 
												
												 echo get_avatar( get_the_author_meta('ID'), 50, '', '', $args = array( 'class' => 'avatar-default' ) ); ?>
													<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo esc_html(get_the_author());?></a>
											</span>
											<span class="posted-on"><i class="fa-regular fa-clock"></i>
												<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time>
													<?php echo esc_html(get_the_date('M j, Y')); ?></time></a>
											</span>
										</div>	
									</figcaption>	
								</article>
							</div>
							
							<?php }  
							endwhile; 
							wp_reset_query();
					} ?>
					</div>
				</div>
				
			</div><!--/row -->	
			<!--/Grid View Post -->	
			
		</div>
	</section>
	<!-- /Sponsored News Section-->	
<?php endif; ?>



