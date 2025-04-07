<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newsexo
 */	
?>
<article class="post wow animate fadeInUp" data-wow-delay=".3s" <?php post_class(); ?>>		
			   <?php 
				if(has_post_thumbnail()){
				echo '<figure class="post-thumbnail"><a href="'.esc_url(get_the_permalink()).'">';
				the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
				echo '</a></figure>';
				} 
		?>		
				<figcaption class="post-content">
					<div class="entry-meta">
						<span class="cat-links links-space">
							<?php	
								$categories = get_the_category();
								if ( ! empty( $categories ) ) {
								foreach( $categories as $category ) {	
								echo ' <a class="links-bg '.esc_attr($category->slug).'" href="' . esc_url( get_category_link( $category->term_id ) ) . '"><span>' . esc_html( $category->name ) . '</span></a>';
								}
							}
							?>
						</span>
					</div>					
					<header class="entry-header">
						<?php 
						the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' );
						?>
					</header>
					<div class="entry-meta align-self-center">
						<span class="author">
						<?php 
							echo get_avatar( get_the_author_meta('ID'), 50, '', '', $args = array( 'class' => 'avatar-default' ) ); ?>
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo esc_html(get_the_author());?></a>
						</span>							
						<span class="posted-on">
							<i class="fa-regular fa-clock"></i>
							<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time>
							<?php echo esc_html(get_the_date('M j, Y')); ?></time></a>
						</span>
						<span class="comment-links"><i class="fa-solid fa-comment-dots"></i><a href="<?php the_permalink(); ?>#respond"><?php echo esc_html( get_comments_number() ); ?></a></span>
					</div>	
					<div class="entry-content">
						<?php newsexo_posted_content(); ?>
						<?php if (get_theme_mod('newsexo_blog_content','excerpt') == "excerpt") { ?>
						<a href="<?php the_permalink();?>" class="more-link"><?php echo esc_html(get_theme_mod('newsexo_read_more_button_text', __('Read More', 'newsexo'))); ?></a>
						<?php } ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'newsexo' ), 'after'  => '</div>', ) ); ?>
					</div>
				</figcaption>	
	</article><!-- #post-<?php the_ID(); ?> -->