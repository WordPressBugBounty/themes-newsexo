<?php /** * Template Name: Full Width Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package newsexo
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
$page_container_layout = get_theme_mod('newsexo_default_page_container_size', 'container-full');
?>
<section class="blog-grid-view-post">
	<div class="<?php echo $page_container_layout; ?>">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<?php
				while ( have_posts() ) : the_post();
						// Include the page
						get_template_part( 'template-parts/content', 'page' );
						comments_template( '', true ); // show comments 
				    endwhile;
					newsexo_edit_link();
				?>
			</div>
					
		</div>
	</div>
</section>
<?php
get_footer();