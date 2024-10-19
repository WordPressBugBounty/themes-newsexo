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

if ( ! class_exists( 'NewsExo_Customize_General_Option' ) ) :

	class NewsExo_Customize_General_Option extends NewsExo_Customize_Base_Option {
		
		public function elements() {

			return array(
			
			
			    'newsexo_preloader_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Preloader Settings', 'newsexo' ),
						'section' => 'newsexo_theme_preloader',
					),
				),
			
					'newsexo_preloader_disabled'            => array(
						'setting' => array(
							'default'           => true,
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 2,
							'label'    => esc_html__( 'Preloader Enable/Disable', 'newsexo' ),
							'section'  => 'newsexo_theme_preloader',
						),
					),

			);

		}

	}

	new NewsExo_Customize_General_Option();

endif;
