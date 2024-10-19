<?php
/**
 * MenuBar.
 *
 * @package newsexo
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_Menu_Bar_Option' ) ) :

	/**
	 * Menu option.
	 */
	class NewsExo_Customize_Menu_Bar_Option extends NewsExo_Customize_Base_Option {

		public function elements() {

			return array(
			
			    'newsexo_main_menu_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Menu Settings', 'newsexo' ),
						'section' => 'newsexo_theme_menu_bar',
					),
				),


					'newsexo_menu_style'     => array(
						'setting' => array(
							'default'           => 'sticky',
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 5,
							'is_default_type' => true,
							'label'           => esc_html__( 'Menu Style', 'newsexo' ),
							'section'         => 'newsexo_theme_menu_bar',
							'choices'         => array(
								'sticky'  => esc_html__( 'Sticky', 'newsexo' ),
								'static' => esc_html__( 'Static', 'newsexo' ),
							),
						),
					),
					
					'newsexo_search_icon_disabled'            => array(
						'setting' => array(
							'default'           => false,
							'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 35,
							'label'    => esc_html__( 'Search Icon Enable/Disable', 'newsexo' ),
							'section'  => 'newsexo_theme_menu_bar',
						),
					),

			);

		}

	}

	new NewsExo_Customize_Menu_Bar_Option();

endif;
