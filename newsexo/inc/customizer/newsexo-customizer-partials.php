<?php
/**
 * NewsExo Customizer partials.
 *
 * @package newsexo
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NewsExo_Customizer_Partials' ) ) {

	/**
	 * Customizer Partials.
	 */
	class NewsExo_Customizer_Partials {

		/**
		 * Instance.
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		// site title
		public static function customize_partial_blogname() {
			return get_bloginfo( 'name' );
		}

		// Site tagline
		public static function customize_partial_blogdescription() {
			return get_bloginfo( 'description' );
		}
		
		// social icon text
		public static function customize_partial_newsexo_social_icon_text() {
			return get_theme_mod( 'newsexo_social_icon_text' );
		}
		
		// social icon text
		public static function customize_partial_newsexo_trending_news_area_title() {
			return get_theme_mod( 'newsexo_trending_news_area_title' );
		}
		
		// social icon text
		public static function customize_partial_newsexo_theme_popular_tags() {
			return get_theme_mod( 'newsexo_popular_tags_area_title' );
		}
		
		// social icon text
		public static function customize_partial_newsexo_featured_news_area_title() {
			return get_theme_mod( 'newsexo_featured_news_area_title' );
		}
		
		// social icon text
		public static function customize_partial_newsexo_featured_news_viewall_text() {
			return get_theme_mod( 'newsexo_featured_news_viewall_text' );
		}
		
		// social icon text
		public static function customize_partial_newsexo_you_have_missed_section_title() {
			return get_theme_mod( 'newsexo_you_have_missed_section_title' );
		}
		
		// read more
		public static function customize_partial_newsexo_read_more_button_text() {
			return get_theme_mod( 'newsexo_read_more_button_text' );
		}
		
		// related post
		public static function customize_partial_newsexo_related_post_section_title() {
			return get_theme_mod( 'newsexo_related_post_section_title' );
		}
		
		// footer copyright text
		public static function customize_partial_newsexo_footer_copright_text() {
			return get_theme_mod( 'newsexo_footer_copright_text' );
		}

	}
}

NewsExo_Customizer_Partials::get_instance();
