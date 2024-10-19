<?php
/**
 * Typography.
 * @package     newsexo
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== TYPOGRAPHY ==========================================*/
if ( ! class_exists( 'NewsExo_Customize_Theme_Typography_Option' ) ) :

	/**
	 * Theme Typography option.
	 */
	class NewsExo_Customize_Theme_Typography_Option extends NewsExo_Customize_Base_Option {

		public function elements() {

			return array(
			
/* ---------- Enable/Disable TYPOGRAPHY -------------- */		
			
			    'newsexo_typography_disabled'            => array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Enable Typography', 'newsexo' ),
						'section'  => 'newsexo_enable_disable_typography',
					),
				),
				
			
/* ---------- Base -------------- */
				
				'newsexo_typography_base_font_size' => array(
					'setting' => array(
						'default'           => '1rem',
						'sanitize_callback' => 'newsexo_sanitize_text',
					),
					'control' => array(
						'type'            => 'text',
						'priority'        => 40,
						'label'           => esc_html__( 'Font Size', 'newsexo' ),
						'description'           => esc_html__( 'You can enter size in px or rem ', 'newsexo' ),
						'section'         => 'newsexo_base_typography',
					),
				),

			);

		}

	}

	new NewsExo_Customize_Theme_Typography_Option();

endif;
