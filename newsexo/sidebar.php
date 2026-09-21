<?php
/**
 * The sidebar containing the main widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newsexo
 */


if ( is_active_sidebar( 'sidebar-main' ) ) : 

$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme = $activate_theme_data->name;

if( 'Medford News' == $activate_theme || 'News Mart' == $activate_theme){
	$vrsn_sidebar_class = 'vrsn-four';
}
elseif( 'Editor News' == $activate_theme || 'EditorPress' == $activate_theme){
	$vrsn_sidebar_class = 'vrsn-five';
}
else{ $vrsn_sidebar_class = ''; }
?>

<div class="col-lg-4 col-md-6 col-sm-12">

	<div class="sidebar <?php echo $vrsn_sidebar_class; ?>">
	
		<?php // call main sidebar.

		dynamic_sidebar( 'sidebar-main' ); ?>	
		
	</div>
	
</div>	


<?php endif; ?>