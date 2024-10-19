<?php
/** 
 * NewsExo Customizer Class
 *
 * @package newsexo
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customizer' ) ) :

	// NewsExo Customizer class
	
	class NewsExo_Customizer {
		
		// Constructor customizer
		public function __construct() {

			add_action( 'customize_register', array( $this, 'newsexo_customizer_panel_control' ) );
			add_action( 'customize_register', array( $this, 'newsexo_customizer_register' ) );
			add_action( 'customize_register', array( $this, 'newsexo_customizer_selective_refresh' ) );
			add_action( 'customize_preview_init', array( $this, 'newsexo_customizer_preview_js' ) );
			add_action( 'after_setup_theme', array( $this, 'newsexo_customizer_settings' ) );

		}

		// Register custom controls
		public function newsexo_customizer_panel_control( $wp_customize ) {

			// Controls path.
			$control_dir = NEWSEXO_PARENT_INC_DIR . '/customizer/controls';
			$setting_dir = NEWSEXO_PARENT_INC_DIR . '/customizer/settings';

			// Load customizer options extending classes.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/custom-customizer/newsexo-customizer-panel.php';
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/custom-customizer/newsexo-customizer-section.php';

			// Register extended classes.
			$wp_customize->register_panel_type( 'NewsExo_Customize_Panel' );
			$wp_customize->register_section_type( 'NewsExo_Customize_Section' );

			// Load base class for controls.
			require_once $control_dir . '/code/newsexo-customize-base-control.php';
			// Load custom control classes.
			require_once $control_dir . '/code/newsexo-customize-color-control.php';
			require_once $control_dir . '/code/newsexo-customize-heading-control.php';
			require_once $control_dir . '/code/newsexo-customize-radio-image-control.php';
			require_once $control_dir . '/code/newsexo-customize-radio-buttonset-control.php';
			require_once $control_dir . '/code/newsexo-customize-slider-control.php';
			require_once $control_dir . '/code/newsexo-customize-sortable-control.php';
			require_once $control_dir . '/code/newsexo-customize-text-control.php';
			require_once $control_dir . '/code/newsexo-customize-toggle-control.php';
			require_once $control_dir . '/code/newexo-customize-upgrade-control.php';

			// Register JS-rendered control types.
			$wp_customize->register_control_type( 'NewsExo_Customize_Color_Control' );
			$wp_customize->register_control_type( 'NewsExo_Customize_Heading_Control' );
			$wp_customize->register_control_type( 'NewsExo_Customize_Radio_Image_Control' );
			$wp_customize->register_control_type( 'NewsExo_Customize_Radio_Buttonset_Control' );
			$wp_customize->register_control_type( 'NewsExo_Customize_Slider_Control' );
			$wp_customize->register_control_type( 'NewsExo_Customize_Sortable_Control' );
			$wp_customize->register_control_type( 'NewsExo_Customize_Text_Control' );
			$wp_customize->register_control_type( 'NewsExo_Customize_Toggle_Control' );
			$wp_customize->register_control_type( 'NewsExo_Customize_Upgrade_Control' );

		}

		// Customizer selective refresh.
		public function newsexo_customizer_selective_refresh() {

			require_once NEWSEXO_PARENT_INC_DIR . '/customizer/newsexo-customizer-sanitize.php';
			require_once NEWSEXO_PARENT_INC_DIR . '/customizer/newsexo-customizer-partials.php';

		}


		// Add postMessage support for site title and description for the Theme Customizer.

		public function newsexo_customizer_register( $wp_customize ) {

			// Customizer selective
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/newsexo-customizer-selective.php';

			// Register panels and sections.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/newsexo-panels-and-sections.php';

		}

        // Theme Customizer preview reload changes asynchronously.
		public function newsexo_customizer_preview_js() {

			wp_enqueue_script( 'newsexo-customizer', NEWSEXO_PARENT_INC_URI . '/customizer/assets/js/customizer.js', array( 'customize-preview' ), NEWSEXO_THEME_VERSION, true );

		}

		// Include customizer customizer settings.
	
		public function newsexo_customizer_settings() {
			
			// Base class.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/newsexo-customize-base-customizer-settings.php';
			// Frontpage Sections.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/home/newsexo-home-site-top-header-customizer-settings.php';
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/home/newsexo-home-header-banner-customizer-settings.php';
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/home/newsexo-home-trending-news-customizer-settings.php';
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/home/newsexo-home-news-slider-customizer-settings.php';
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/home/newsexo-home-featured-news-customizer-settings.php';
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/home/newsexo-home-you-have-missed-customizer-settings.php';
			

			// Preloader.
			//require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-preloader-customizer-settings.php';
			// Site Animation.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-site-animation-customizer-settings.php';
			// Header.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-header-customizer-settings.php';
			// Menu.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-menu-bar-customizer-settings.php';
			// Blog.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-blog-general-customizer-settings.php';
			// Blog.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-archive-post-customizer-settings.php';
			// Single Post.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-single-post-customizer-settings.php';
			// Footer.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-footer-copyright-customizer-settings.php';
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-footer-widget-customizer-settings.php';
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-theme-breadcrumbs-customizer-settings.php';
			// Typography.
			require NEWSEXO_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/newsexo-typography-customizer-settings.php';

		}
	

	}
endif;

new NewsExo_Customizer();