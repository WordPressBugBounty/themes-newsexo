<?php
/**
 * Frontpage You Have Missed.
 *
 * @package newsexo
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customize_You_Have_Missed_Option' ) ) :

	class NewsExo_Customize_You_Have_Missed_Option extends NewsExo_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

			    'newsexo_you_have_missed_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'You May Have Missed Settings', 'newsexo' ),
						'section' => 'newsexo_you_may_have_missed',
					),
				),
			
			    	
				'newsexo_you_have_missed_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'NewsExo_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Section Enable/Disable', 'newsexo' ),
						'section'  => 'newsexo_you_may_have_missed',
					),
				),
				
				'newsexo_you_have_missed_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 100,
						'label'    => esc_html__( 'Posts', 'newsexo' ),
						'section'  => 'newsexo_you_may_have_missed',
					),
				),

			);

		}

	}

	new NewsExo_Customize_You_Have_Missed_Option();

endif;