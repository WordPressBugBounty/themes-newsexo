<?php
/**
 * Extend default customizer section.
 *
 * @package newsexo
 *
 * @see     WP_Customize_Section
 * @access  public
 */

require NEWSEXO_PARENT_INC_DIR . '/customizer/webfont.php';
require NEWSEXO_PARENT_INC_DIR . '/customizer/controls/code/newsexo-customize-typography-control.php';
require NEWSEXO_PARENT_INC_DIR . '/customizer/controls/code/newsexo-customize-category-control.php';
require NEWSEXO_PARENT_INC_DIR . '/customizer/controls/code/newexo-customize-section-upsell.php';
$repeater_control = trailingslashit( get_template_directory() ) . '/inc/customizer/customizer-repeater/functions.php';
if ( file_exists( $repeater_control ) ) { require_once( $repeater_control ); }
function newsexo_frontpage_sections_settings( $wp_customize ){
	
	$active_callback    	= isset( $array['active_callback'] ) ? $array['active_callback'] : null;
	
	$wp_customize->get_section( 'header_image' )->panel = 'newsexo_theme_settings';
	$wp_customize->get_section( 'header_image' )->title    = __( 'Header Options', 'newsexo' );
    $wp_customize->get_section( 'header_image' )->priority = 5;
			
	/* Register frontpage panel */
	$wp_customize->add_panel( 'newsexo_frontpage_settings', array(
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
		'title'      => __('Frontpage Sections', 'newsexo'),
	) );
	
    /* Site Top Header */
	$wp_customize->add_section( 'newsexo_theme_top_header_area' , array(
		'title'      => __('Site Top Header', 'newsexo'),
		'panel'  => 'newsexo_frontpage_settings',
		'priority'   => 1,
	) );
	
	    if ( class_exists( 'newsexo_Repeater' ) ) {
			$wp_customize->add_setting( 'newsexo_top_header_social_content', array( 'sanitize_callback' => 'sanitize_text_field', ) );
			$wp_customize->add_control( new newsexo_Repeater( 
			$wp_customize, 'newsexo_top_header_social_content', array(
						'label'                            => esc_html__( 'Social Items Content', 'newsexo' ),
						'section'                          => 'newsexo_theme_top_header_area',
						'add_field_label'                  => esc_html__( 'Add new icon', 'newsexo' ),
						'item_name'                        => esc_html__( 'Social Icon', 'newsexo' ),
						'customizer_repeater_icon_control'  => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_checkbox_control' => true,
					)
				)
			);
		}

	/* Header Banner */
	$wp_customize->add_section( 'newsexo_header_banner_advertisement1' , array(
		'title'      => __('Header Banner', 'newsexo'),
		'panel'  => 'newsexo_frontpage_settings',
		'priority'   => 2,
   	) ); 
	
		// Header Banner Image
		$wp_customize->add_setting( 'newsexo_header_banner_advertisement_image1', array(
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'newsexo_header_banner_advertisement_image1',
			array(
				'label'       => esc_html__( 'Banner Image', 'newsexo' ),
				'description' => esc_html__( 'Best Recommended Size is (980px*90px).', 'newsexo' ),
				'section'  => 'newsexo_header_banner_advertisement1',
				'settings' => 'newsexo_header_banner_advertisement_image1',
				'priority'        => 4,
			) 
		));
	
	/* Trending News */
	$wp_customize->add_section( 'newsexo_theme_trending_news' , array(
		'title'      => __('Trending News', 'newsexo'),
		'panel'  => 'newsexo_frontpage_settings',
		'priority'   => 4,
	) ); 
	        $wp_customize->add_setting( 'newsexo_theme_trending_news_category',array('capability'     => 'edit_theme_options', 'default'           => 0, 'sanitize_callback' => 'newsexo_sanitize_array') );$wp_customize->add_control( new NewsExo_Customize_Category_Control( $wp_customize, 'newsexo_theme_trending_news_category', array(
				'label'   => __('Blog/News Category','newsexo'),
				'section' => 'newsexo_theme_trending_news',
				'settings'   => 'newsexo_theme_trending_news_category',
			) ) );			
			
	/* Big News Slider */
	$wp_customize->add_section( 'newsexo_theme_big_news_slider' , array(
		'title'      => __('News Slider', 'newsexo'),
		'panel'  => 'newsexo_frontpage_settings',
		'priority'   => 5,
	) ); 
	
		$wp_customize->add_setting( 'newsexo_theme_big_news_slider_category',array('capability'     => 'edit_theme_options', 'default'           => 0, 'sanitize_callback' => 'newsexo_sanitize_array') );	
		$wp_customize->add_control( new NewsExo_Customize_Category_Control( $wp_customize, 'newsexo_theme_big_news_slider_category', array(
				'label'   => __('Slider News Category','newsexo'),
				'section' => 'newsexo_theme_big_news_slider',
				'settings'   => 'newsexo_theme_big_news_slider_category',
				'priority'        => 10,
		) ) );	
		
		$activate_theme_data = wp_get_theme(); // getting current theme data
		$activate_theme = $activate_theme_data->name;

	if( 'News Digest' != $activate_theme && 'NewsCorn' != $activate_theme){
		
		$wp_customize->add_setting( 'newsexo_theme_big_static_news_category',array('capability'     => 'edit_theme_options', 'default'           => 0, 'sanitize_callback' => 'newsexo_sanitize_array') );	$wp_customize->add_control( new NewsExo_Customize_Category_Control( $wp_customize, 'newsexo_theme_big_static_news_category', array(
				'label'   => __('Static News Category','newsexo'),
				'section' => 'newsexo_theme_big_news_slider',
				'settings'   => 'newsexo_theme_big_static_news_category',
				'priority'        => 36,
		) ) );	
		
	}
	
	
    /* Featured News */
	$wp_customize->add_section( 'newsexo_theme_featured_news_section' , array(
		'title'      => __('Featured News', 'newsexo'),
		'panel'  => 'newsexo_frontpage_settings',
		'priority'   => 6,
	) ); 
	
		$wp_customize->add_setting( 'newsexo_theme_featured_news_category',array('capability'     => 'edit_theme_options', 'default'           => 0, 'sanitize_callback' => 'newsexo_sanitize_array',) );	
		$wp_customize->add_control( new NewsExo_Customize_Category_Control( $wp_customize, 'newsexo_theme_featured_news_category', array(
				'label'   => __('Featured News Category','newsexo'),
				'section' => 'newsexo_theme_featured_news_section',
				'settings'   => 'newsexo_theme_featured_news_category',
				'priority'        => 4,
		) ) );

   /* You May Have Missed */
	$wp_customize->add_section( 'newsexo_you_may_have_missed' , array(
		'title'      => __('You May Have Missed', 'newsexo'),
		'panel'  => 'newsexo_frontpage_settings',
		'priority'   => 8,
	) ); 
		
		$wp_customize->add_setting( 'newsexo_you_have_missed_news_category',array('capability'     => 'edit_theme_options', 'default'           => 0, 'sanitize_callback' => 'newsexo_sanitize_array') );$wp_customize->add_control( new NewsExo_Customize_Category_Control( $wp_customize, 'newsexo_you_have_missed_news_category', array(
				'label'   => __('News Category','newsexo'),
				'section' => 'newsexo_you_may_have_missed',
				'settings'   => 'newsexo_you_have_missed_news_category',
				'priority'        => 4,
		) ) );
					
		$wp_customize->add_setting( 'newsexo_typography_base_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Open Sans',
		) );
		$wp_customize->add_control( new NewsExo_Customizer_Typography_Control( $wp_customize,'newsexo_typography_base_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'newsexo' ),
			'section' 			=> 'newsexo_base_typography',
			'settings' 			=> 'newsexo_typography_base_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	
					
		$wp_customize->add_setting( 'newsexo_typography_h1_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Open Sans',
		) );
		$wp_customize->add_control( new NewsExo_Customizer_Typography_Control( $wp_customize,'newsexo_typography_h1_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'newsexo' ),
			'section' 			=> 'newsexo_headings1_typography',
			'settings' 			=> 'newsexo_typography_h1_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );

        $wp_customize->add_setting( 'newsexo_typography_h2_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Open Sans',
		) );
		$wp_customize->add_control( new NewsExo_Customizer_Typography_Control( $wp_customize,'newsexo_typography_h2_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'newsexo' ),
			'section' 			=> 'newsexo_headings2_typography',
			'settings' 			=> 'newsexo_typography_h2_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	

        $wp_customize->add_setting( 'newsexo_typography_h3_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Open Sans',
		) );
		$wp_customize->add_control( new NewsExo_Customizer_Typography_Control( $wp_customize,'newsexo_typography_h3_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'newsexo' ),
			'section' 			=> 'newsexo_headings3_typography',
			'settings' 			=> 'newsexo_typography_h3_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	
		
		$wp_customize->add_setting( 'newsexo_typography_h4_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Open Sans',
		) );
		$wp_customize->add_control( new NewsExo_Customizer_Typography_Control( $wp_customize,'newsexo_typography_h4_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'newsexo' ),
			'section' 			=> 'newsexo_headings4_typography',
			'settings' 			=> 'newsexo_typography_h4_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );		

        $wp_customize->add_setting( 'newsexo_typography_h5_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Open Sans',
		) );
		$wp_customize->add_control( new NewsExo_Customizer_Typography_Control( $wp_customize,'newsexo_typography_h5_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'newsexo' ),
			'section' 			=> 'newsexo_headings5_typography',
			'settings' 			=> 'newsexo_typography_h5_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	

        $wp_customize->add_setting( 'newsexo_typography_h6_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Open Sans',
		) );
		$wp_customize->add_control( new NewsExo_Customizer_Typography_Control( $wp_customize,'newsexo_typography_h6_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'newsexo' ),
			'section' 			=> 'newsexo_headings6_typography',
			'settings' 			=> 'newsexo_typography_h6_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );
		
		// Upsell Section.
		$wp_customize->add_section(
			new NewsExo_Upsell_Section(
				$wp_customize,
				'upsell_section',
				array(
					'title'            => __( 'NewsExo Pro Available!', 'newsexo' ),
					'button_text'      => __( 'Upgrade Pro', 'newsexo' ),
					'url'              => 'https://themearile.com/newsexo-pro-theme/',
					'background_color' => '#0058ff',
					'text_color'       => '#fff',
					'priority'         => 0,
				)
			)
		);
		
}
add_action( 'customize_register', 'newsexo_frontpage_sections_settings' );


function newsexo_customizer_selective_refresh_settings($wp_customize) {
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	
    // Social Icon Text

		$wp_customize->add_setting( 'newsexo_social_icon_text',
		array(
            'default' => __('Follow Us', 'newsexo'),
			'sanitize_callback' => 'newsexo_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'newsexo_social_icon_text',
		array(
			'label'   => esc_html__( 'Social Icons Text', 'newsexo' ),
			'section' => 'newsexo_theme_top_header_area',
			'priority'        => 6,
			'type' => 'text',
		));	
		
	// Trending News Title
	
		$wp_customize->add_setting( 'newsexo_trending_news_area_title',
		array(
            'default' => __('Trending News', 'newsexo'),
			'sanitize_callback' => 'newsexo_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'newsexo_trending_news_area_title',
		array(
			'label'   => esc_html__( 'Title', 'newsexo' ),
			'section' => 'newsexo_theme_trending_news',
			'priority'        => 4,
			'type' => 'text',
		));	
		
	// Featured News Title
	
		$wp_customize->add_setting( 'newsexo_featured_news_area_title',
		array(
            'default' => __('FEATURED NEWS', 'newsexo'),
			'sanitize_callback' => 'newsexo_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'newsexo_featured_news_area_title',
		array(
			'label'   => esc_html__( 'Title', 'newsexo' ),
			'section' => 'newsexo_theme_featured_news_section',
			'priority'        => 3,
			'type' => 'text',
		));	
		
	// You Have Missed 
	
		$wp_customize->add_setting( 'newsexo_you_have_missed_section_title',
		array(
            'default' => __('You May Have Missed', 'newsexo'),
			'sanitize_callback' => 'newsexo_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'newsexo_you_have_missed_section_title',
		array(
			'label'   => esc_html__( 'Title', 'newsexo' ),
			'section' => 'newsexo_you_may_have_missed',
			'priority'        => 3,
			'type' => 'text',
		));	
		
	// Read More Button Text
	
		$wp_customize->add_setting( 'newsexo_read_more_button_text',
		array(
            'default' => __('Read More', 'newsexo'),
			'sanitize_callback' => 'newsexo_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'newsexo_read_more_button_text',
		array(
			'label'   => esc_html__( 'Read More Button Text', 'newsexo' ),
			'section' => 'newsexo_theme_archive_post',
			'priority'        => 10,
			'type' => 'text',
		));	
		
	// Related Post
	
		$wp_customize->add_setting( 'newsexo_related_post_section_title',
		array(
			'sanitize_callback' => 'newsexo_sanitize_text',
            'default' => __('Related Story', 'newsexo'),
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'newsexo_related_post_section_title',
		array(
			'label'   => esc_html__( 'Title', 'newsexo' ),
			'section' => 'newsexo_theme_single_post',
			'priority'        => 16,
			'type' => 'text',
		));
		
	// Footer copyright
		
		$wp_customize->add_setting( 'newsexo_footer_copright_text',
		array(
			'sanitize_callback' =>  'newsexo_sanitize_text',
			'default' => __('Copyright &copy; 2025 | Powered by <a href="//wordpress.org/">WordPress</a>', 'newsexo'),
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'newsexo_footer_copright_text',
		array(
			'label'   => esc_html__( 'Copyright Text', 'newsexo' ),
			'section' => 'newsexo_footer_copyright',
			'priority'        => 10,
			'type' => 'textarea',
		));
}
add_action( 'customize_register', 'newsexo_customizer_selective_refresh_settings' );