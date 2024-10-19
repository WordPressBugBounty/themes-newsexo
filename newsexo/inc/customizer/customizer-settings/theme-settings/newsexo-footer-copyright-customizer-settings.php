<?php
/**
 * Footer Copyright.
 *
 * @package     newsexo
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Footer_Copyright_Option' ) ) :

	/**
	 * Footer Copyright.
	 */
	class NewsExo_Customize_Footer_Copyright_Option extends NewsExo_Customize_Base_Option {

		public function elements() {

			return array(

				'newsexo_footer_copright_enabled'                  => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Footer Copyright Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_footer_copyright',
					),
				),			
			);

		}

	}

	new NewsExo_Customize_Footer_Copyright_Option();

endif;
