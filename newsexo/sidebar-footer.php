<?php
/**
 * The sidebar containing the footer widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newsexo
 */

if ( ! is_active_sidebar( 'footer-sidebar-one' ) && ! is_active_sidebar( 'footer-sidebar-two' ) && ! is_active_sidebar( 'footer-sidebar-three' ) && ! is_active_sidebar( 'footer-sidebar-four' ) ) {
	return;
}
?>

<?php
	
// call the footer-one sidebar.
	
if ( is_active_sidebar( 'footer-sidebar-one' ) ) : ?>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<?php dynamic_sidebar( 'footer-sidebar-one' ); ?>
	</div>		
<?php endif; ?>

<?php 

// call the footer-two sidebar.

if ( is_active_sidebar( 'footer-sidebar-two' ) ) : ?>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<?php dynamic_sidebar( 'footer-sidebar-two' ); ?>
	</div>	
<?php endif; ?>

<?php 

// call the footer-three sidebar.

if ( is_active_sidebar( 'footer-sidebar-three' ) ) : ?>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<?php dynamic_sidebar( 'footer-sidebar-three' ); ?>
	</div>	
<?php endif; ?>


<?php 

// call the footer-four sidebar.

if ( is_active_sidebar( 'footer-sidebar-four' ) ) : ?>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<?php dynamic_sidebar( 'footer-sidebar-four' ); ?>
	</div>	
<?php endif; ?>