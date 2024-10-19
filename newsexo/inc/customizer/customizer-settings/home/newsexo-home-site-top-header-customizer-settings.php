<?php
/**
 * Frontpage Site Top Header.
 *
 * @package newsexo
 */

defined( 'ABSPATH' ) || exit;

/**
* Site Top Header customizer options.
*/
if ( ! class_exists( 'NewsExo_Customize_Homepage_Site_Top_Header_Option' ) ) :

	class NewsExo_Customize_Homepage_Site_Top_Header_Option extends NewsExo_Customize_Base_Option {

		/**
		 * @return array
		 */
		public function elements() {

			return array(
			
			    'newsexo_site_top_header_content_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Top Header Options', 'newsexo' ),
						'section' => 'newsexo_theme_top_header_area',
					),
				),
			
				'newsexo_site_top_header_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Header Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_theme_top_header_area',
					),
				),
				
			    'newsexo_site_top_header_date'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 3,
						'label'    => esc_html__( 'Day & Date Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_theme_top_header_area',
					),
				),
				
			    'newsexo_site_top_header_social_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 4,
						'label'    => esc_html__( 'Social Icons Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_theme_top_header_area',
					),
				),

				'newsexo_topheader_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Social Icons', 'newsexo' ),
						'section'  => 'newsexo_theme_top_header_area',
					),
				),				

			);

		}

	}

	new NewsExo_Customize_Homepage_Site_Top_Header_Option();

endif;