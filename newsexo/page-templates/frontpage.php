<?php
/**
 * Template Name: Frontpage
 *
 * Displays the Home page.
 *
 * @package newsexo
 */
?>

<?php

get_header(); 
	
			get_template_part( 'template-parts/index', 'trending-news' );
			get_template_part( 'template-parts/index', 'main-slider' );	
			get_template_part( 'template-parts/index', 'featured-news' );
			get_template_part( 'template-parts/index', 'frontpage-widgets' );
?>

<?php get_footer(); ?>
