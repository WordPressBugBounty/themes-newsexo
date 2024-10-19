<?php
/**
 * Header Settings.
 *
 * @package newsexo
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
* Header Settings.
*/

if ( ! class_exists( 'NewsExo_Customize_Header_Option' ) ) :

	class NewsExo_Customize_Header_Option extends NewsExo_Customize_Base_Option {
		
		public function elements() {

			return array(
			
			
			    'newsexo_main_header_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Header Options', 'newsexo' ),
						'section' => 'header_image',
					),
				),
				
				'newsexo_theme_header_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Header Enable/Disable', 'newsexo' ),
						'section'  => 'header_image',
					),
				),
				
								
				'newsexo_theme_header_background_color' => array(
					'setting' => array(
						'default'           => 'rgba(255, 255, 255, .90)',
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 7,
						'label'           => esc_html__( 'Background color', 'newsexo' ),
						'section'         => 'header_image',
						'choices'         => array(
							'alpha' => true,
						),
					),
				),

			);

		}

	}

	new NewsExo_Customize_Header_Option();

endif;
