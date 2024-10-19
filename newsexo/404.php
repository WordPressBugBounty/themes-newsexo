<?php
/**
 * The template for displaying 404 pages (not found) 
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package newsexo
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
?>
	<!-- 404 Errror -->
	<section class="theme-error-page">
		<div class="container">			
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<div class="text-center">
						<h2 class="title">4<b>0</b>4</h2>
						<h3 class="sub-title"><?php esc_html_e("OOPS, SORRY WE CAN'T FIND THAT PAGE !",'newsexo');?></h3>
						<div class="mx-auto pt-4">
							<a href="<?php echo esc_url(site_url());?>" class="btn-small btn-border"><i class="fa fa-arrow-left pr-2"></i><?php esc_html_e('Go Back Now','newsexo');?></a>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</section>
	<!-- /End of 404 Errror -->
<?php
get_footer();