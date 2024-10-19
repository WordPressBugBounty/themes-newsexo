<?php
/**
 * Footer widgets.
 *
 * @package     newsexo
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Footer_Widget_Option' ) ) :

	/**
	 * Option: Footer widget.
	 */
	class NewsExo_Customize_Footer_Widget_Option extends NewsExo_Customize_Base_Option {

		public function elements() {

			return array(

				'newsexo_footer_widgets_enabled'                  => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 10,
						'label'    => esc_html__( 'Footer Widget Area Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_footer_widgets',
					),
				),	

			);

		}

	}

	new NewsExo_Customize_Footer_Widget_Option();

endif;
