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

if ( ! class_exists( 'NewsExo_Customize_Site_Animation_Option' ) ) :

	class NewsExo_Customize_Site_Animation_Option extends NewsExo_Customize_Base_Option {
		
		public function elements() {

			return array(
			
			
			    'newsexo_site_animation_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Site Animation Settings', 'newsexo' ),
						'section' => 'newsexo_theme_site_animation',
					),
				),
			
					'newsexo_site_animation_disabled'            => array(
						'setting' => array(
							'default'           => true,
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 2,
							'label'    => esc_html__( 'Site Animation Enable/Disable', 'newsexo' ),
							'section'  => 'newsexo_theme_site_animation',
						),
					),
					
				'newsexo_custom_logo_size' => array(
					'setting' => array(
						'default'           => array(
							'slider' => 210,
							'suffix' => 'px',
						),
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'priority'    => 55,
						'label'       => esc_html__( 'Logo Width', 'newsexo' ),
						'section'     => 'title_tagline',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 600,
							'step' => 3,
						),
					),
				),	

			);

		}

	}

	new NewsExo_Customize_Site_Animation_Option();

endif;
