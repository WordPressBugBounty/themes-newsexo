<?php
/**
 * Title: Hero
 * Slug: newsexo/hero
 * Categories: newsexo
 * Description: A hero section with headline, text and featured categories.
 * Keywords: hero, intro, newsexo
 *
 * @package newsexo
 */

?>

<!-- wp:group {"metadata":{"categories":["newsexo"],"patternName":"newsexo/hero","name":"Hero"},"align":"full","style":{"spacing":{"blockGap":"0px","padding":{"top":"7rem","bottom":"7rem"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"light","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-light-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:7rem;padding-bottom:7rem"><!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|50"},"margin":{"bottom":"3.2rem"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-bottom:3.2rem;padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:700">
	<?php esc_html_e( 'Reflections on Love: Loss & New Beginnings', 'newsexo' ); ?>
</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size">
	<?php esc_html_e( 'Discover meaningful stories that touch the heart ❤️ and inspire growth, connection, and positive change. Explore thoughtful reflections on life, love, and new beginnings.', 'newsexo' ); ?>
</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"left":"1.4rem"},"padding":{"top":"1rem"}}}} -->
<div class="wp-block-buttons" style="padding-top:1rem"><!-- wp:button {"className":"is-btn-arrow"} -->
<div class="wp-block-button is-btn-arrow"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Explore More', 'newsexo' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"accent","className":"is-btn-arrow"} -->
<div class="wp-block-button is-btn-arrow"><a class="wp-block-button__link has-accent-background-color has-background wp-element-button"><?php esc_html_e( 'Get Started', 'newsexo' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
