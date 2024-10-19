<?php
/**
 * General Blog.
 *
 * @package     newsexo
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Blog_General_Option' ) ) :

	/**
	 * General Blog..
	 */
	class NewsExo_Customize_Blog_General_Option extends NewsExo_Customize_Base_Option {

		public function elements() {

			return array(
			
				'newsexo_default_page_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 4,
						'label'   => esc_html__( 'Default Page', 'newsexo' ),
						'section' => 'newsexo_theme_blog_settings',
					),
				),
				
					'newsexo_default_page_layout'                    => array(
							'setting' => array(
								'default'           => 'newsexo_right_sidebar',
								'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_radio' ),
							),
							'control' => array(
								'type'            => 'radio_image',
								'priority'        => 5,
								'label'           => esc_html__( 'Layout', 'newsexo' ),
								'section'         => 'newsexo_theme_blog_settings',
								'choices'         => array(
									'newsexo_right_sidebar'   => NEWSEXO_PARENT_INC_ICON_URI . '/theme-right-sidebar.png',
									'newsexo_left_sidebar'   => NEWSEXO_PARENT_INC_ICON_URI . '/theme-left-sidebar.png',
									'newsexo_no_sidebar' => NEWSEXO_PARENT_INC_ICON_URI . '/theme-fullwidth.png',
								),
							),
						),
					
				'newsexo_general_blog_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 10,
						'label'   => esc_html__( 'Blog Page', 'newsexo' ),
						'section' => 'newsexo_theme_blog_settings',
					),
				),
				
					'newsexo_general_blog_pages_layout'                    => array(
							'setting' => array(
								'default'           => 'newsexo_right_sidebar',
								'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_radio' ),
							),
							'control' => array(
								'type'            => 'radio_image',
								'priority'        => 11,
								'label'           => esc_html__( 'Layout', 'newsexo' ),
								'section'         => 'newsexo_theme_blog_settings',
								'choices'         => array(
									'newsexo_right_sidebar'   => NEWSEXO_PARENT_INC_ICON_URI . '/theme-right-sidebar.png',
									'newsexo_left_sidebar'   => NEWSEXO_PARENT_INC_ICON_URI . '/theme-left-sidebar.png',
									'newsexo_no_sidebar' => NEWSEXO_PARENT_INC_ICON_URI . '/theme-fullwidth.png',
								),
							),
					),
				
				'newsexo_archive_blog_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 15,
						'label'   => esc_html__( 'Archive Blog', 'newsexo' ),
						'section' => 'newsexo_theme_blog_settings',
					),
				),  
				
					'newsexo_archive_blog_pages_layout'                    => array(
						'setting' => array(
							'default'           => 'newsexo_right_sidebar',
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio_image',
							'priority'        => 20,
							'label'           => esc_html__( 'Layout', 'newsexo' ),
							'section'         => 'newsexo_theme_blog_settings',
							'choices'         => array(
								'newsexo_right_sidebar'   => NEWSEXO_PARENT_INC_ICON_URI . '/theme-right-sidebar.png',
								'newsexo_left_sidebar'   => NEWSEXO_PARENT_INC_ICON_URI . '/theme-left-sidebar.png',
								'newsexo_no_sidebar' => NEWSEXO_PARENT_INC_ICON_URI . '/theme-fullwidth.png',
							),
						),
					),	
				
				'newsexo_single_blog_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 30,
						'label'   => esc_html__( 'Single Blog', 'newsexo' ),
						'section' => 'newsexo_theme_blog_settings',
					),
				),
				
				    'newsexo_single_blog_pages_layout'                    => array(
						'setting' => array(
							'default'           => 'newsexo_right_sidebar',
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio_image',
							'priority'        => 35,
							'label'           => esc_html__( 'Layout', 'newsexo' ),
							'section'         => 'newsexo_theme_blog_settings',
							'choices'         => array(
								'newsexo_right_sidebar'   => NEWSEXO_PARENT_INC_ICON_URI . '/theme-right-sidebar.png',
								'newsexo_left_sidebar'   => NEWSEXO_PARENT_INC_ICON_URI . '/theme-left-sidebar.png',
								'newsexo_no_sidebar' => NEWSEXO_PARENT_INC_ICON_URI . '/theme-fullwidth.png',
							),
						),
					),
			);

		}

	}

	new NewsExo_Customize_Blog_General_Option();

endif;
