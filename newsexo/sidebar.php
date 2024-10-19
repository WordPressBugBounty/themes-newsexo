<?php
/**
 * The sidebar containing the main widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newsexo
 */


if ( is_active_sidebar( 'sidebar-main' ) ) : ?>

<div class="col-lg-4 col-md-6 col-sm-12">

	<div class="sidebar">
	
		<?php // call main sidebar.

		dynamic_sidebar( 'sidebar-main' ); ?>	
		
	</div>
	
</div>	


<?php endif; ?>