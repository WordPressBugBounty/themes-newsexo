<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newsexo
*/
$newsexo_top_header_social_content  = get_theme_mod( 'newsexo_top_header_social_content');
$newsexo_related_post_enable  = get_theme_mod( 'newsexo_related_post_enable ', true );
$newsexo_single_post_author_details_enable = get_theme_mod( 'newsexo_single_post_author_details_enable', true );
$newsexo_related_post_section_title = get_theme_mod( 'newsexo_related_post_section_title', 'Related Story' );
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme = $activate_theme_data->name;
if( 'News Digest' == $activate_theme ){
	$vrsn_two_class = 'vrsn-three';
}
elseif( 'Newsio' == $activate_theme || 'Seattle News' == $activate_theme || 'News Gadgets' == $activate_theme){
	$vrsn_two_class = 'vrsn-two';
}else{ $vrsn_two_class = ''; }
?>
<article class="post grid-view-news-area pb-3 wow animate fadeInUp <?php echo $vrsn_two_class; ?>" data-wow-delay=".3s" <?php post_class(); ?>>		
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
	            <?php 
					the_title( '<h2 class="entry-title">', '</h2>' );
				?>
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
				<?php if(has_post_thumbnail()){
				echo '<figure class="post-thumbnail">';
				the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
				echo '</figure>'; } ?>
				<figcaption class="post-content">
					<div class="entry-content">
						<?php the_content( __('Read More','newsexo') );
							wp_link_pages();?>
					</div>	
					<?php $theme_tag_list = get_the_tag_list();
					if(!empty($theme_tag_list)) { ?>
					<div class="entry-meta mb-0">
						<hr>					
						<span class="tag-links">
						<?php the_tags('',''); ?>
						</span>
					</div>
					<?php } ?>
				</figcaption>
</article><!-- #post-<?php the_ID(); ?> -->

<?php if($newsexo_single_post_author_details_enable == true): ?>	
<!--Blog Post Author-->
<article class="post-author-area wow animate fadeInUp <?php echo $vrsn_two_class; ?>" data-wow-delay=".3s">
		<figure class="avatar">
			<?php echo get_avatar( get_the_author_meta('ID'), 200, '', '', $args = array( 'class' => 'img-fluid rounded-circle' ) );  ?>
		</figure>
		<figcaption class="author-content">
			<h5 class="author-name"><?php the_author_link(); ?></h5>
			<p><b><?php esc_html_e('Website', 'newsexo'); ?>:</b> <a href="<?php echo esc_url(get_the_author_meta('user_url') ); ?>" target="_blank"><?php echo esc_url( get_the_author_meta('user_url') ); ?></a></p>
			<p><?php the_author_meta( 'description' ); ?></p>
					<ul class="custom-social-icons">	
					    <?php 
								if ( ! empty( $newsexo_top_header_social_content ) ) {
									
								$newsexo_top_header_social_content = json_decode( $newsexo_top_header_social_content );
								foreach ( $newsexo_top_header_social_content as $header_social ) {
								$icon = ! empty( $header_social->icon_value ) ? apply_filters( 'newsexo_translate_single_string',$header_social->icon_value, 'Theme Header Social' ) : '';
								$remove_string = 'fa-brands ' ;
								$remove_icon = str_replace($remove_string, '', $icon) ;
								
								$link = ! empty( $header_social->link ) ? apply_filters( 'newsexo_translate_single_string', $header_social->link, 'Theme Header Social' ) : '';
									if( !empty($header_social->open_new_tab)){ 
										$open_new_tab = $header_social->open_new_tab;
									} else{ $open_new_tab = 'no'; }  ?>

                                <?php if ( ! empty( $icon ) ) :?>
								    <?php if(!empty($link)){ ?>
										<li><a class="<?php echo esc_html( $remove_icon ); ?>" href="<?php echo $link; ?>" <?php if($open_new_tab =='yes'){?>target="_blank" <?php }?>><i class="fa <?php echo esc_html( $icon ); ?>"></i></a></li>
										<?php }else{ ?>
										<li><i class="fa <?php echo esc_html( $icon ); ?>"></i></li>
										<?php } ?>
								<?php endif; ?>
								
						    <?php } } else { ?>
								<li><a class="fa-square-facebook" href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
								<li><a class="fa-square-twitter" href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
								<li><a class="fa-google-plus" href="#"><i class="fa-brands fa-google-plus"></i></a></li>
								<li><a class="fa-linkedin" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
								<li><a class="fa-square-instagram" href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
								<li><a class="fa-square-youtube" href="#"><i class="fa-brands fa-square-youtube"></i></a></li>
								<li><a class="fa-skype" href="#"><i class="fa-brands fa-skype"></i></a></li>	
							<?php } ?>
						</ul>
	   </figcaption>
</article>
<!--/Blog Post Author-->
<?php endif; ?>	

<?php if($newsexo_related_post_enable == true): ?>
<div class="row pb-3 related-posts wow animate fadeInUp" data-wow-delay=".3s">
		<div class="col-12">
			<span class="news-section-title five"><h5 class="f-heading"><?php echo esc_html($newsexo_related_post_section_title);?></h5></span>
		</div>
		<?php 
		// Default arguments
		$args = array(
			'post__not_in'   => array( get_the_ID() ), // Exclude current post
			'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
		);
		// Check for current post category and add tax_query to the query arguments
		$cats = wp_get_post_terms( get_the_ID(), 'category' ); 
		$cats_ids = array();  
		foreach( $cats as $wpex_related_cat ) {
			$cats_ids[] = $wpex_related_cat->term_id; 
		}
		if ( ! empty( $cats_ids ) ) {
			$args['category__in'] = $cats_ids;
		}
		// Query posts
		$wpex_query = new wp_query( $args );
		// Loop through posts
        foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<article class="post grid-view-news-area <?php echo $vrsn_two_class; ?>">	
							<?php newsexo_post_thumbnail(); ?>								
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
								</div>
							</figcaption>				
						</article>
					</div>
			<?php
				// End loop
				endforeach;
				// Reset post data
				wp_reset_postdata(); ?>
</div>
<?php endif; ?>