<?php
/**
 * Override default customizer options.
 *
 * @package newsexo
 */

// Settings.
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
	
	// site title
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_blogname' ),
		)
	);

    // site tagline
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_blogdescription' ),
		)
	);
	
	// social icons title
	$wp_customize->selective_refresh->add_partial(
		'newsexo_social_icon_text',
		array(
			'selector'        => '.custom-social-icons .followus',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_social_icon_text' ),
		)
	);
	
	// popular tags title
	$wp_customize->selective_refresh->add_partial(
		'newsexo_popular_tags_area_title',
		array(
			'selector'        => '.theme-tags-area .tags-item b',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_theme_popular_tags' ),
		)
	);
	
	
    // trending news title
	$wp_customize->selective_refresh->add_partial(
		'newsexo_trending_news_area_title',
		array(
			'selector'        => '.trending-news-area .heading h5',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_theme_trending_news' ),
		)
	);
	
	// trending news title
	$wp_customize->selective_refresh->add_partial(
		'newsexo_featured_news_area_title',
		array(
			'selector'        => '.featured-news-section .news-section-title h5',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_featured_news_area_title' ),
		)
	);
	
	// trending news title
	$wp_customize->selective_refresh->add_partial(
		'newsexo_featured_news_viewall_text',
		array(
			'selector'        => '.featured-news-section .news-section-title a',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_featured_news_viewall_text' ),
		)
	);
	
	// trending news title
	$wp_customize->selective_refresh->add_partial(
		'newsexo_you_have_missed_section_title',
		array(
			'selector'        => '.sponsored-news-section .news-section-title h5',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_you_have_missed_section_title' ),
		)
	);
	
	// trending news title
	$wp_customize->selective_refresh->add_partial(
		'newsexo_related_post_section_title',
		array(
			'selector'        => '.related-posts .news-section-title h5',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_related_post_section_title' ),
		)
	);
	
		// read more
	$wp_customize->selective_refresh->add_partial(
		'newsexo_read_more_button_text',
		array(
			'selector'        => '.entry-content .more-link',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_read_more_button_text' ),
		)
	);
	
	//Slider new
	$wp_customize->selective_refresh->add_partial( 'newsexo_big_news_slider_disabled', array(
		'selector'            => '.big-news-section #news-slider',
		'settings'            => 'newsexo_big_news_slider_disabled',
	
	) );
	
	// footer copyright text
	$wp_customize->selective_refresh->add_partial(
		'newsexo_footer_copright_text',
		array(
			'selector'        => '.site-footer .site-info',
			'render_callback' => array( 'NewsExo_Customizer_Partials', 'customize_partial_newsexo_footer_copright_text' ),
		)
	);
	
	
	
}