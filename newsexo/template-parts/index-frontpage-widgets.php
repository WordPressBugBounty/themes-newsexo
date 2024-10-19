	
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
				
				<!--Sidebar -->
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="sidebar">
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







