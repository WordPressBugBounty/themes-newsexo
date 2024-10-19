<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newsexo
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
$page_sidebar_layout = get_theme_mod('newsexo_default_page_layout', 'newsexo_right_sidebar');
$page_container_layout = get_theme_mod('newsexo_default_page_container_size', 'container-full');
?>
<section class="blog-grid-view-post">
	<div class="<?php echo $page_container_layout; ?>">
		<div class="row <?php if($page_sidebar_layout == 'newsexo_left_sidebar'){echo 'sidebar-space-control';} ?>">
		
		<?php 
			
			if($page_sidebar_layout == 'newsexo_left_sidebar'):
				if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						get_sidebar('woocommerce'); 
					}
					else{ 
						get_sidebar(); 
                    }	
				}
			    else{ 
					get_sidebar(); 
				}	
			 endif;
		    
			if($page_sidebar_layout == 'newsexo_no_sidebar'):
			
		     	if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						echo '<div class="col-lg-12 col-md-12 col-sm-12">'; 
					}
					else{ 
						echo '<div class="col-lg-12 col-md-12 col-sm-12">';
					}
				}
				else{ 
					echo '<div class="col-lg-12 col-md-12 col-sm-12">';
				}
				
			else:

                if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						echo '<div class="col-lg-'.( !is_active_sidebar( "woocommerce" ) ?"12" : '8' ).' col-md-'.( !is_active_sidebar( "woocommerce" ) ?"12" : '6' ).' col-sm-12">'; 
					}
					else{ 
						echo '<div class="col-lg-'.( !is_active_sidebar( "sidebar-main" ) ?"12" : '8' ).' col-md-'.( !is_active_sidebar( "sidebar-main" ) ?"12" : '6' ).' col-sm-12">';
					}
				}
				else{ 
					echo '<div class="col-lg-'.( !is_active_sidebar( "sidebar-main" ) ?"12" : '8' ).' col-md-'.( !is_active_sidebar( "sidebar-main" ) ?"12" : '6' ).' col-sm-12">';
				}
			
			endif;
					
				if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						while ( have_posts() ) : the_post();
						// Include the page
						get_template_part( 'template-parts/content', 'page' );
						comments_template( '', true ); // show comments
						endwhile;	
				    } 
					else
					{
						while ( have_posts() ) : the_post();
							// Include the page
							get_template_part( 'template-parts/content', 'page' );
							comments_template( '', true ); // show comments
						endwhile;
					}
				}
				else 
				{
					while ( have_posts() ) : the_post();
						// Include the page
						get_template_part( 'template-parts/content', 'page' );
						comments_template( '', true ); // show comments 
				    endwhile;
					newsexo_edit_link();
				}
				?>
			</div>	
			
			<?php if($page_sidebar_layout == 'newsexo_right_sidebar' || empty($page_sidebar_layout)):	
					if ( class_exists( 'WooCommerce' ) ) {
							if( is_account_page() || is_cart() || is_checkout() ) {
									get_sidebar('woocommerce'); 
							}
							else{ 
							get_sidebar();
							}
					}
					else{ 
					get_sidebar(); 
					}
			endif; ?>
					
		</div>
	</div>
</section>
<!--/Blog & Sidebar-->

<?php
get_footer();