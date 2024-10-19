<?php
/** 
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package newsexo
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
$newsexo_single_blog_pages_layout = get_theme_mod('newsexo_single_blog_pages_layout', 'newsexo_right_sidebar');   
?>
<section class="single-news-area">
	<div class="container-full">
		<div class="row <?php if($newsexo_single_blog_pages_layout == 'newsexo_left_sidebar'){echo 'sidebar-space-control';} ?>">
		<?php if($newsexo_single_blog_pages_layout == 'newsexo_left_sidebar' ||  !$newsexo_single_blog_pages_layout == 'newsexo_no_sidebar'): ?>
		<!--/Blog Section-->
		<?php get_sidebar(); ?>
		<?php endif; ?>
		<?php if($newsexo_single_blog_pages_layout == 'newsexo_no_sidebar'): ?>
		    <div class="col-lg-12 col-md-12 col-sm-12">	
        <?php else: ?>  
            <div class="col-lg-8 col-md-6 col-sm-12">
        <?php endif; ?>			

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content-single', get_post_type() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>	
		<?php if($newsexo_single_blog_pages_layout == 'newsexo_right_sidebar' || !$newsexo_single_blog_pages_layout == 'newsexo_no_sidebar'): ?>
		<!--/Blog Section-->
			<?php get_sidebar(); ?>
        <?php endif; ?>
		</div>	
	</div>
</section>
<?php
get_footer();