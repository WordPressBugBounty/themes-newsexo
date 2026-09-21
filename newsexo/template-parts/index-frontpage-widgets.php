	
	<!--Frontpage Multi News Section With Sidebar-->
	<section class="multi-news-layout-section">
		<div class="container-full">		
			<div class="row">	
				<div class="col-lg-8 col-md-6 col-sm-12">
						<?php 
								if ( is_active_sidebar( 'front-page-content' ) ):
								dynamic_sidebar( 'front-page-content' );
								endif;
						?>


				</div><!--/col-lg-8 -->
				
				<?php $activate_theme_data = wp_get_theme(); // getting current theme data
					  $activate_theme = $activate_theme_data->name;

					  if( 'Medford News' == $activate_theme || 'News Mart' == $activate_theme){
						$vrsn_sidebar_class = 'vrsn-four';
					  }
					  elseif( 'Editor News' == $activate_theme || 'EditorPress' == $activate_theme){
					  $vrsn_sidebar_class = 'vrsn-five';
					  }
					  else{ $vrsn_sidebar_class = ''; } ?>
				
				<!--Sidebar -->
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="sidebar <?php echo $vrsn_sidebar_class; ?>">
						<?php 
								if ( is_active_sidebar( 'frontpage-sidebar' ) ):
								dynamic_sidebar( 'frontpage-sidebar' );
								endif;
						?>
					</div>
				</div>
				<!--/Sidebar -->	
			</div><!--/row -->
		</div>
	</section>
	<!-- /Frontpage Multi News Section With Sidebar -->







