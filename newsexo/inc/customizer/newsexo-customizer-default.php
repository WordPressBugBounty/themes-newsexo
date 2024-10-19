<?php 
/* Top header social icons  */
if ( ! function_exists( 'newsexo_theme_header_social_default_content' ) ) :		
    function newsexo_theme_header_social_default_content( $wp_customize ){
			$newsexo_theme_top_header_social_content_control = $wp_customize->get_setting( 'newsexo_top_header_social_content' );
				if ( ! empty( $newsexo_theme_top_header_social_content_control ) ) {
					$newsexo_theme_top_header_social_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa-brands fa-square-facebook',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b37',
						),
						array(
						'icon_value' => 'fa-brands fa-square-twitter',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b47',
						),
						array(
						'icon_value' => 'fa-brands fa-google-plus',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b57',
						),
						array(
						'icon_value' => 'fa-brands fa-linkedin',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b57',
						),
					) );

				}
	    }
add_action( 'customize_register', 'newsexo_theme_header_social_default_content' );
endif;