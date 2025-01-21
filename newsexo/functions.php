<?php
/**
 * NewsExo functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package newsexo
 */

if ( ! function_exists( 'newsexo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newsexo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on newsexo, use a find and replace
		 * to change 'newsexo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newsexo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary'     => esc_html__( 'Primary', 'newsexo' ),
			'footer' => esc_html__( 'Footer', 'newsexo' ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// woocommerce support
		
		add_theme_support( 'woocommerce' );
		
		// Woocommerce Gallery Support
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 39,
			'width'       => 210,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array( 'site-title', 'site-description' ),
			
		) );
		
		/**
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		/**
		 * Custom background support.
		 */
		add_theme_support( 'custom-background' );
	}
endif;
add_action( 'after_setup_theme', 'newsexo_setup' );

add_filter('woocommerce_show_page_title', '__return_false');

/**
 * Enqueue scripts and styles.
 */
function newsexo_scripts() {
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	/**
	 * Styles.
	 */
	 
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css'); 
	 
	// Fontawesome.
	wp_enqueue_style( 'font-awesome-min', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome' . $suffix . '.css', false, '4.7.0' );
	// Theme style.
	wp_enqueue_style( 'newsexo-style', get_stylesheet_uri() );
	

	wp_enqueue_style('theme-default', get_template_directory_uri() . '/assets/css/theme-default.css');
	wp_enqueue_style('newsexo-animate-css', get_template_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_style('owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');
	wp_enqueue_style('bootstrap-smartmenus-css', get_template_directory_uri() . '/assets/css/jquery.smartmenus.bootstrap-4.css');
	
	/**
	 * Scripts.
	 */
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'));
	wp_enqueue_script('bootstrap.bundle.min', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'));
	// Theme JavaScript.

	wp_enqueue_script('newsexo-smartmenus-js', get_template_directory_uri() . '/assets/js/smartmenus/jquery.smartmenus.js');
	
	wp_enqueue_script('newsexo-custom-js', get_template_directory_uri() . '/assets/js/custom.js');
	wp_enqueue_script('bootstrap-smartmenus-js', get_template_directory_uri() . '/assets/js/smartmenus/bootstrap-smartmenus.js');
	wp_enqueue_script( 'newsexo-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js');
	
	if(get_theme_mod('newsexo_site_animation_disabled', true) == true):
	wp_enqueue_script('animate-js', get_template_directory_uri() . '/assets/js/animation/animate.js');
	wp_enqueue_script('wow-js', get_template_directory_uri() . '/assets/js/wow.js');
	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newsexo_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function newsexo_admin_enqueue_scripts(){
	wp_enqueue_style('newsexo-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_enqueue_script( 'newsexo-admin-script', get_template_directory_uri() . '/assets/js/newsexo-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'newsexo-admin-script', 'newsexo_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'newsexo_admin_enqueue_scripts' );

function newsexo_customizer_script() {
	wp_enqueue_style( 'newsexo-custom-controls-css', get_template_directory_uri() . '/inc/customizer/controls/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'newsexo-custom-controls-js', get_template_directory_uri() . '/inc/customizer/controls/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );	
}
add_action( 'customize_controls_enqueue_scripts', 'newsexo_customizer_script' );


/**
 * Define constants
 */
// Root path/URI.
define( 'NEWSEXO_PARENT_DIR', get_template_directory() );
define( 'NEWSEXO_PARENT_URI', get_template_directory_uri() );

// Include path/URI.
define( 'NEWSEXO_PARENT_INC_DIR', NEWSEXO_PARENT_DIR . '/inc' );
define( 'NEWSEXO_PARENT_INC_URI', NEWSEXO_PARENT_URI . '/inc' );

// Icons path.
define( 'NEWSEXO_PARENT_INC_ICON_URI', NEWSEXO_PARENT_URI . '/assets/img/icons' );
// Customizer path.
define( 'NEWSEXO_PARENT_CUSTOMIZER_DIR', NEWSEXO_PARENT_INC_DIR . '/customizer' );

// Theme version.
$newsexo_theme = wp_get_theme();
define( 'NEWSEXO_THEME_VERSION', $newsexo_theme->get( 'Version' ) );

// Set default content width.
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/template-parts/widgets/register-sidebars.php';

/**
 * Implement the Custom Header feature.
 */
require NEWSEXO_PARENT_INC_DIR . '/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require NEWSEXO_PARENT_INC_DIR . '/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require NEWSEXO_PARENT_INC_DIR . '/template-functions.php';

/**
 * Customizer additions.
 */
require NEWSEXO_PARENT_INC_DIR . '/customizer/newsexo-customizer.php';
require NEWSEXO_PARENT_INC_DIR . '/customizer/newsexo-customizer-options.php';
require NEWSEXO_PARENT_INC_DIR . '/customizer/newsexo-customizer-default.php';

/**
 * Typography.
 */

require NEWSEXO_PARENT_INC_DIR . '/theme-custom-typography.php';



/**
 * Bootstrap class navwalker.
 */
 
require NEWSEXO_PARENT_INC_DIR . '/default_menu_walker.php';
require NEWSEXO_PARENT_INC_DIR . '/class-bootstrap-navwalker.php';