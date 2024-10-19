<?php 
$newsexo_breadcrumbs_enable = get_theme_mod('newsexo_breadcrumbs_enable', true);
?>
<?php if($newsexo_breadcrumbs_enable == true): ?>
<!-- Theme Breadcrumb Area -->

		<section class="theme-breadcrumb-area">
				<div id="content" class="container-full">
					<div class="row g-lg-3">
						<div class="col-md-12 col-sm-12">						
							<?php 						
								newsexo_theme_breadcrumbs();	
							?>
						</div>
					</div>
				</div>
		</section>
	
<?php endif; ?>