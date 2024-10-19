<?php
/**
 * Frontpage Main Slider.
 *
 * @package newsexo
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Homepage_Header_Banner_Option1' ) ) :

	class NewsExo_Customize_Homepage_Header_Banner_Option1 extends NewsExo_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
			
				'newsexo_header_banner_advertisement_heading1'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Banner Advertisement Settings', 'newsexo' ),
						'section' => 'newsexo_header_banner_advertisement1',
					),
				),
	
				'newsexo_header_banner_advertisement_disabled1'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Banner Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_header_banner_advertisement1',
					),
				),
				
				'newsexo_logo_center_disabled'            => array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 3,
						'label'    => esc_html__( 'Display Logo Center Enable/Disable', 'newsexo' ),
						'description'    => esc_html__( 'Logo center will be enabled when the banner is disabled', 'newsexo' ),
						'section'  => 'newsexo_header_banner_advertisement1',
					),
				),
								
				'newsexo_header_banner_advertisement_link1' => array(
					'setting' => array(
						'default'           => '#',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'control' => array(
						'type'            => 'text',
						'priority'        => 10,
						'is_default_type' => true,
						'label'           => esc_html__( 'Banner Link', 'newsexo' ),
						'section'         => 'newsexo_header_banner_advertisement1',
					),
				),

			);

		}

	}

	new NewsExo_Customize_Homepage_Header_Banner_Option1();

endif;
