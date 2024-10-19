<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package newsexo
 */
 
 if ( ! function_exists( 'newsexo_sanitize_select' ) ) :
	/**
	 * Sanitize select, radio.
	 *
	 * @since BlogSlog 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function newsexo_sanitize_select( $input, $setting ) {
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
endif;

function newsexo_custom_customizer_options() { 

$newsexo_custom_logo_size = get_theme_mod('newsexo_custom_logo_size', array('slider' => 210,'suffix' => 'px',));
$newsexo_theme_header_background_color = get_theme_mod('newsexo_theme_header_background_color', 'rgba(255, 255, 255, .90)');
?>
    <style type="text/css">	
	
		<?php if($newsexo_custom_logo_size['slider'] != null){ ?>
			.site-logo img.custom-logo {
				max-width: <?php echo esc_attr($newsexo_custom_logo_size['slider']);?>px;
				height: auto;
			}
		<?php } ?>
		
		<?php if ( has_header_image() ) { ?>
			.logo-banner {
				background: #17212c url(<?php echo esc_url( get_header_image() ); ?>);
				background-attachment: scroll;
				background-position: top center;
				background-repeat: no-repeat;
				background-size: cover;
			}
		<?php } ?>
		
		<?php if(!empty($newsexo_theme_header_background_color )) { ?>
			.logo-banner-overlay::before {
				background: <?php echo esc_attr($newsexo_theme_header_background_color);?> !important;
			}
		<?php } ?>
		
		<?php if ( is_user_logged_in() && is_admin_bar_showing() ) { ?>
            @media screen and (min-width: 600px){
                .navbar.header-fixed-top { top:32px; }
            }
        <?php  } ?>
		
   </style>
<?php }
add_action('wp_footer','newsexo_custom_customizer_options');