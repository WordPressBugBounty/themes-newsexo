<?php 
$newsexo_theme_header_disabled = get_theme_mod('newsexo_theme_header_disabled', true);
$newsexo_menu_style = get_theme_mod('newsexo_menu_style', 'sticky');     
$newsexo_search_icon_disabled = get_theme_mod('newsexo_search_icon_disabled', false);
$newsexo_header_banner_advertisement_disabled1 = get_theme_mod('newsexo_header_banner_advertisement_disabled1', true); 
$newsexo_logo_center_disabled = get_theme_mod('newsexo_logo_center_disabled', false);
$newsexo_header_banner_advertisement_link1 = get_theme_mod('newsexo_header_banner_advertisement_link1', '#');
$newsexo_header_banner_advertisement_image1 = get_theme_mod('newsexo_header_banner_advertisement_image1');
 ?>
 
 <?php if($newsexo_theme_header_disabled == true) { ?>
 	<!--Site Branding & Advertisement-->
	<section class="logo-banner logo-banner-overlay">
		<div class="container-full">
			<div class="row">
				<div class="<?php if($newsexo_logo_center_disabled == true && $newsexo_header_banner_advertisement_disabled1 == false) { echo 'col-lg-12 col-md-12';} else { echo 'col-lg-4 col-md-12'; } ?> align-self-center">
					<?php echo newsexo_header_logo(); ?>
				</div>

			<?php if($newsexo_header_banner_advertisement_disabled1 == true && $newsexo_header_banner_advertisement_image1 != null) {?>
				<div class="col-lg-8 col-md-12">
					<div class="site-advertisement">	
						<a href="<?php echo esc_url($newsexo_header_banner_advertisement_link1); ?>"><img src="<?php echo esc_attr($newsexo_header_banner_advertisement_image1); ?>" class="img-fluid float-end" alt="Advertisement"></a>
					</div>								
				</div>
			<?php } ?>	
			</div>
		</div>
	</section>	
	<!--End of Site Branding & Advertisement-->
    <?php } ?>
	
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark <?php if($newsexo_menu_style == 'sticky'){echo 'header-sticky'; }?>">
		<div class="container-full">
			<div class="row">
			    <div class="<?php if($newsexo_search_icon_disabled == false){ echo 'col-lg-12'; } else { echo 'col-lg-11'; } ?> col-md-12"> 
				
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
					</button>
					<div id="navbarSupportedContent" class="navbar-collapse collapse">
						<?php
							wp_nav_menu( array(
								 'theme_location'  => 'primary',
								 'menu_class'      => 'nav navbar-nav',
								 'fallback_cb'     => 'newsexo_fallback_page_menu',
								 'walker'          => new wp_bootstrap_navwalker()
							) );
							
						?>
					</div>
				</div>
				<?php if($newsexo_search_icon_disabled == true){ ?>
				<div class="col-lg-1 col-md-12">
					<div class="theme-search-block desk-view">
						<a href="#search-popup" title="<?php esc_attr_e( 'Search here', 'newsexo' ); ?>"><i class="fa-solid fa-magnifying-glass"></i></a>						
					</div>	
				</div>
				<?php } ?>
			</div>
		</div>
	</nav>
	<!-- /End of Navbar -->

	<div id="search-popup">
		<button type="button" class="close">×</button>
		<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="search" placeholder="<?php esc_attr_e( 'Search here', 'newsexo' ); ?>" name="s" id="s" />
			<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Search', 'newsexo' ); ?></button>
		</form>
	</div>
	