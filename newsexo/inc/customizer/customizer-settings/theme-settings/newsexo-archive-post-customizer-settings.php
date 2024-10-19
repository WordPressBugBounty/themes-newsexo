<?php
/**
 * General Settings.
 *
 * @package newsexo
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
* General Settings.
*/

if ( ! class_exists( 'NewsExo_Customize_Archive_Post_Option' ) ) :

	class NewsExo_Customize_Archive_Post_Option extends NewsExo_Customize_Base_Option {
		
		public function elements() {

			return array(
			
			
			    'newsexo_archive_post_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Blog/Archive Settings', 'newsexo' ),
						'section' => 'newsexo_theme_archive_post',
					),
				),
			
					'newsexo_blog_content'     => array(
						'setting' => array(
							'default'           => 'excerpt',
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 5,
							'is_default_type' => true,
							'label'           => esc_html__( 'Post Content', 'newsexo' ),
							'section'         => 'newsexo_theme_archive_post',
							'choices'         => array(
								'excerpt'  => esc_html__( 'Excerpt', 'newsexo' ),
								'full-content' => esc_html__( 'Full Content', 'newsexo' ),
							),
						),
					),

			);

		}

	}

	new NewsExo_Customize_Archive_Post_Option();

endif;
