<?php
/**
 * Theme Category Colors.
 * @package     newsexo
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Breadcrumbs_Option' ) ) :

	class NewsExo_Customize_Breadcrumbs_Option extends NewsExo_Customize_Base_Option {

		/**
		 * Arguments for options.
		 * @return array
		 */
		public function elements() {

			return array(
				
				'newsexo_theme_breadcrumbs_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 5,
						'label'   => esc_html__( 'Breadcrumb Settings', 'newsexo' ),
						'section' => 'newsexo_theme_breadcrumbs',
					),
				),
				
					'newsexo_breadcrumbs_enable'            => array(
						'setting' => array(
							'default'           => true,
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 6,
							'label'    => esc_html__( 'Breadcrumb Enable/Disable ', 'newsexo' ),
							'section'  => 'newsexo_theme_breadcrumbs',
						),
					),
			
			);

		}

	}

	new NewsExo_Customize_Breadcrumbs_Option();

endif;
