<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newsexo
 */

?>

<article class="post wow animate fadeInUp" data-wow-delay=".3s" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php newsexo_post_thumbnail(); ?>

	<div class="post-content">
	
	    <div class="entry-content">
			<?php
			the_content();
            
			wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'newsexo' ), 'after'  => '</div>', ) );
			
			?>
		</div><!-- .entry-content -->	
		
	</div><!-- .post-content -->

</article>