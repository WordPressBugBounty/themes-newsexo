<?php
/**
 * Frontpage Testimonial.
 *
 * @package newsexo
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Homepage_News_Slider_Option' ) ) :

	class NewsExo_Customize_Homepage_News_Slider_Option extends NewsExo_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

			    'newsexo_big_news_slider_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'News Slider Settings', 'newsexo' ),
						'section' => 'newsexo_theme_big_news_slider',
					),
				),
			
			    	
				'newsexo_big_news_slider_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Section Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_theme_big_news_slider',
					),
				),
				
				'newsexo_big_news_slider_on_blog_page_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 7,
						'label'    => esc_html__( 'Disable News Slider section on blog page', 'newsexo' ),
						'section'  => 'newsexo_theme_big_news_slider',
					),
				),
				
				'newsexo_static_news_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 35,
						'label'   => esc_html__( 'Static News', 'newsexo' ),
						'section' => 'newsexo_theme_big_news_slider',
					),
				),
								
				'newsexo_news_slider_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 100,
						'label'    => esc_html__( 'Posts', 'newsexo' ),
						'section'  => 'newsexo_theme_big_news_slider',
					),
				),	
				
			);

		}

	}

	new NewsExo_Customize_Homepage_News_Slider_Option();

endif;