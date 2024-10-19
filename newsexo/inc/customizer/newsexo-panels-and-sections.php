<?php
/**
 * Register customizer panels and sections.
 *
 * @package newsexo
 */

/* Theme Settings. */
 
$wp_customize->add_panel( new NewsExo_Customize_Panel( $wp_customize, 'newsexo_theme_settings', array(
	'priority'   => 28,
	'title'      => esc_html__( 'Theme Options', 'newsexo' ),
	'capabitity' => 'edit_theme_options',
) ) );


// Section: Preloader.
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_preloader', array(
		'title'    => esc_html__( 'Preloader', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 1,
	) ) );

// Section: Site Animation.
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_site_animation', array(
		'title'    => esc_html__( 'Site Animation', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 2,
	) ) );
	
// Section: Site Style Layout.
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_style_layout', array(
		'title'    => esc_html__( 'Site Style', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 3,
	) ) );
	
// Section: Site Layout.
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_site_layout', array(
		'title'    => esc_html__( 'Site Layout', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 4,
	) ) );
	

// Section: Menu MenuBar.
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_menu_bar', array(
		'title'    => esc_html__( 'MenuBar Options', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 6,
	) ) );


// Section: Layout Settings.

	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_blog_settings', array(
		'title'    => esc_html__( 'Layout Settings', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 7,
	) ) );
	
// Section: Blog/Archive Post.

	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_archive_post', array(
		'title'    => esc_html__( 'Blog/Archive Post', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 8,
	) ) );
	
// Section: Single Post.

	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_single_post', array(
		'title'    => esc_html__( 'Single Post', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 9,
	) ) );

// Section: Breadcrumbs.

	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_breadcrumbs', array(
		'title'    => esc_html__( 'Breadcrumbs', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 10,
	) ) );		
	
// Section: Category Colors.
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_category_colors', array(
		'title'    => esc_html__( 'Category Colors', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 13,
	) ) );	


// Section: Footer.

	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_footer', array(
		'title'    => esc_html__( 'Footer', 'newsexo' ),
		'panel'    => 'newsexo_theme_settings',
		'priority' => 14,
	) ) );
	
		$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_footer_widgets', array(
			'title'    => esc_html__( 'Footer Widgets', 'newsexo' ),
			'panel'    => 'newsexo_theme_settings',
			'section'  => 'newsexo_theme_footer',
			'priority' => 10,
		) ) );
		
		$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_footer_copyright', array(
			'title'    => esc_html__( 'Footer Copyright', 'newsexo' ),
			'panel'    => 'newsexo_theme_settings',
			'section'  => 'newsexo_theme_footer',
			'priority' => 20,
		) ) );
		
		$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_footer_scroll_to_top', array(
			'title'    => esc_html__( 'Scroll to Top', 'newsexo' ),
			'panel'    => 'newsexo_theme_settings',
			'section'  => 'newsexo_theme_footer',
			'priority' => 30,
		) ) );

/**
 * Panel: Typography.
 */
$wp_customize->add_panel( new NewsExo_Customize_Panel( $wp_customize, 'newsexo_theme_typography', array(
	'priority'   => 32,
	'title'      => esc_html__( 'Typography', 'newsexo' ),
	'capabitity' => 'edit_theme_options',
) ) );

    // Section: Typography > Base typography.
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_enable_disable_typography', array(
		'title'    => esc_html__( 'Enable Typography', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 5,
	) ) );

	// Section: Typography > Base typography.
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_base_typography', array(
		'title'    => esc_html__( 'Base Typography', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 10,
	) ) );

	// Section: Typography > Primary Menu Typography.
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_menu_bar_typography', array(
		'title'    => esc_html__( 'Menu Bar', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 30,
	) ) );

	// Section: Typography > Headings ( h1 - h6 ) Typography.
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_headings1_typography', array(
		'title'    => esc_html__( 'Headings H1', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 70,
	) ) );
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_headings2_typography', array(
		'title'    => esc_html__( 'Headings H2', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 80,
	) ) );
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_headings3_typography', array(
		'title'    => esc_html__( 'Headings H3', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 90,
	) ) );
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_headings4_typography', array(
		'title'    => esc_html__( 'Headings H4', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 100,
	) ) );
	
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_headings5_typography', array(
		'title'    => esc_html__( 'Headings H5', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 110,
	) ) );

    $wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_headings6_typography', array(
		'title'    => esc_html__( 'Headings H6', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 120,
	) ) );


	// Section: Typography > Widgets Typography.
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_widgets_typography', array(
		'title'    => esc_html__( 'Widgets', 'newsexo' ),
		'panel'    => 'newsexo_theme_typography',
		'priority' => 150,
	) ) );
	
	
/**
 * Panel: Frontpage Section Ordering.
 */
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_section_order', array(
		'title'    => esc_html__( 'Frontpage Section Ordering', 'newsexo' ),
		'priority' => 30,
	) ) );
		
/**
 * Panel: Theme Color Scheme.
 */
	$wp_customize->add_section( new NewsExo_Customize_Section( $wp_customize, 'newsexo_theme_color_scheme', array(
		'title'    => esc_html__( 'Theme Color Scheme', 'newsexo' ),
		'priority' => 31,
	) ) );