<?php
/**
 * Frontpage Trending News.
 *
 * @package newsexo
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Homepage_Trending_News_Option' ) ) :

	class NewsExo_Customize_Homepage_Trending_News_Option extends NewsExo_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

		        'newsexo_main_trending_news_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Trending News Settings', 'newsexo' ),
						'section' => 'newsexo_theme_trending_news',
					),
				),
			
			    	
				'newsexo_trending_news_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_theme_trending_news',
					),
				),
				
				'newsexo_trending_news_on_blog_page_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 50,
						'label'    => esc_html__( 'Disable Trending News section on blog page', 'newsexo' ),
						'section'  => 'newsexo_theme_trending_news',
					),
				),
				
				'newsexo_trending_news_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 100,
						'label'    => esc_html__( 'Posts', 'newsexo' ),
						'section'  => 'newsexo_theme_trending_news',
					),
				),

			);

		}

	}

	new NewsExo_Customize_Homepage_Trending_News_Option();

endif;
