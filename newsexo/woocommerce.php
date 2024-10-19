<?php
get_header();
global $woocommerce;
$shop_page_id = get_option( 'woocommerce_shop_page_id' );
get_template_part('template-parts/site','breadcrumb');
?>
<section class="theme-block">

	<div class="container-full">
	
		<div class="row">
		
		    <?php 
               echo '<div class="col-lg-8 col-md-6 col-sm-12 wow animate fadeInUp" data-wow-delay=".3s">';
				woocommerce_content();
			   echo '</div>';

			    if ( is_active_sidebar( 'woocommerce' )  ) :
					echo '<div class="col-lg-4 col-md-6 col-sm-12"><div class="sidebar">';
							dynamic_sidebar( 'woocommerce' );
					echo '</div></div>';
                endif;
			?>
			
		</div>
		
	</div>
	
</section>
<?php get_footer(); ?>