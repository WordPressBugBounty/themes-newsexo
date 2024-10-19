<?php
/**
 * Frontpage Project.
 *
 * @package newsexo
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Homepage_Featured_News_Option' ) ) :

	class NewsExo_Customize_Homepage_Featured_News_Option extends NewsExo_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

	            'newsexo_featured_news_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Featured News Settings', 'newsexo' ),
						'section' => 'newsexo_theme_featured_news_section',
					),
				),
				
				'newsexo_featured_news_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Featured News Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_theme_featured_news_section',
					),
				),
				
				'newsexo_featured_news_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 100,
						'label'    => esc_html__( 'Posts', 'newsexo' ),
						'section'  => 'newsexo_theme_featured_news_section',
					),
				),
				
			);

		}

	}

	new NewsExo_Customize_Homepage_Featured_News_Option();

endif;
