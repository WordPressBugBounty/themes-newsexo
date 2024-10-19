<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newsexo
 */

get_header();

$newsexo_general_blog_pages_layout = get_theme_mod('newsexo_general_blog_pages_layout', 'newsexo_right_sidebar');
$newsexo_popular_tags_on_blog_page_disabled = get_theme_mod('newsexo_popular_tags_on_blog_page_disabled', true); 
$newsexo_trending_news_on_blog_page_disabled = get_theme_mod('newsexo_trending_news_on_blog_page_disabled', true); 
$newsexo_big_news_slider_on_blog_page_disabled = get_theme_mod('newsexo_big_news_slider_on_blog_page_disabled', true); 
if($newsexo_popular_tags_on_blog_page_disabled == true ){
	get_template_part( 'template-parts/index', 'popular-tags' );
}
if($newsexo_trending_news_on_blog_page_disabled == true ){
	get_template_part( 'template-parts/index', 'trending-news' );
}
if($newsexo_big_news_slider_on_blog_page_disabled == true ){
	get_template_part( 'template-parts/index', 'main-slider' );
}
?>
<section class="blog-list-view-post">		
	<div class="container-full">
		<div class="row <?php if($newsexo_general_blog_pages_layout == 'newsexo_left_sidebar'){echo 'sidebar-space-control';} ?>">
		
			<?php if($newsexo_general_blog_pages_layout == 'newsexo_left_sidebar'):
				get_sidebar();
			endif; ?>
			
			<?php if($newsexo_general_blog_pages_layout == 'newsexo_no_sidebar'): ?>
				<div class="col-lg-12 col-md-12 col-sm-12">		
			<?php else: ?>
			<div class="<?php if( is_active_sidebar('sidebar-main')) { echo 'col-lg-8 col-md-6'; } else { echo "col-lg-12 col-md-12"; } ?> col-sm-12">
			<?php endif; ?>
			<div class="list-view-news-area">
					<?php 
					if ( have_posts() ) :
					// Start the loop.
					while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				 
						get_template_part( 'template-parts/content', get_post_type() );
						
					endwhile;
					
				// End the loop.
				
				// Pgination.
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );
						
				    else :
					
				// If no content, include the "No posts found" template.	
					
			            get_template_part( 'template-parts/content', 'none' );
						
	        	    endif; ?>
						</div>
			</div>
			<?php if($newsexo_general_blog_pages_layout == 'newsexo_right_sidebar' || !$newsexo_general_blog_pages_layout == 'newsexo_left_sidebar'):
				get_sidebar();
			endif; ?>
		</div>	
	</div>
</section>

<?php
get_footer();