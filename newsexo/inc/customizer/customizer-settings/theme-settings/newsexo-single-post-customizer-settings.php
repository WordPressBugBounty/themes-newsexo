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

if ( ! class_exists( 'NewsExo_Customize_Single_Post_Option' ) ) :

	class NewsExo_Customize_Single_Post_Option extends NewsExo_Customize_Base_Option {
		
		public function elements() {

			return array(
			
			
			    'newsexo_single_post_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Single Post Settings', 'newsexo' ),
						'section' => 'newsexo_theme_single_post',
					),
				),

					'newsexo_single_post_author_details_enable'            => array(
						'setting' => array(
							'default'           => true,
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 7,
							'label'    => esc_html__( 'Post Author Enable/Disable', 'newsexo' ),
							'section'  => 'newsexo_theme_single_post',
						),
					),
					
				'newsexo_related_post_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 15,
						'label'   => esc_html__( 'Related Post Settings', 'newsexo' ),
						'section' => 'newsexo_theme_single_post',
					),
				),

			);

		}

	}

	new NewsExo_Customize_Single_Post_Option();

endif;
