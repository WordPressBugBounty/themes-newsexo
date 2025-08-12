<?php
/**
 * Functions which enhance the theme into WordPress
 *
 * @package newsexo
 */

/**
 * Theme Custom Logo
*/
function newsexo_header_logo() {
	?>
	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo">
			<?php the_custom_logo(); ?>
		</div>
	<?php endif; ?>
   <?php if ( display_header_text() ) : ?>
	<div class="site-branding">
	    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
	</div>
	<?php endif;
}

/**
 * Theme Logo Class
*/
function newsexo_header_logo_class($html)
{
	$html = str_replace('custom-logo-link', '', $html);
	return $html;
}
add_filter('get_custom_logo','newsexo_header_logo_class');

/**
 * Theme Comment Function
*/
if ( ! function_exists( 'newsexo_comment' ) ) :
function newsexo_comment( $comment, $args, $depth ) 
{ ?>
      <div <?php comment_class('media comment-box'); ?> id="comment-<?php comment_ID(); ?>">
			<a class="comment-avatar">
            <?php echo get_avatar($comment); ?>
            </a>
			<div class="comment-content-area">
			<div class="comment-detail">
				<h6 class="comment-detail-title"><?php printf(('%s'), get_comment_author_link()) ?>
				<time class="comment-date">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) );?>">
				<?php comment_date('F j, Y');?>&nbsp;<?php esc_html_e('at','newsexo');?>&nbsp;<?php comment_time('g:i a'); ?>
				</a>
				</time></h6>
				<?php comment_text() ;?>
				<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'newsexo' ); ?></em>
				<br/>
				<?php endif; ?>
			</div>
			</div>
		</div>
<?php
}
endif;
add_filter('get_avatar','newsexo_gravatar_class');
function newsexo_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-fluid comment-img", $class);
    return $class;
}

function newsexo_read_more_button_class($read_class)
	{  global $post;
	    $newsexo_read_more_button_text = get_theme_mod('newsexo_read_more_button_text', __('Read More', 'newsexo'));
		return '<p><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"more-link\">" .$newsexo_read_more_button_text." </a></p>";
	}
add_filter( 'the_content_more_link', 'newsexo_read_more_button_class' );

function newsexo_post_thumbnail() {
    if(has_post_thumbnail()){
	    echo '<figure class="post-thumbnail"><a href="'.esc_url(get_the_permalink()).'">';
		the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
		echo '</a></figure>';
	}
}

function newsexo_bootstrap_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
}
add_filter( 'wp_nav_menu', 'newsexo_bootstrap_menu_notitle' );

/**
 * Theme Breadcrumbs Url
*/
function newsexo_page_url() {
	$page_url = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$page_url .= "s";
	}
	$page_url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $page_url;
}

/**
 * Theme Breadcrumbs
*/

// theme page header breadcrumbs functions
if( !function_exists('newsexo_theme_breadcrumbs') ):
	function newsexo_theme_breadcrumbs() { 	
		global $post;
		$home_Link = home_url();
	    echo '<ul class="page-breadcrumb wow animate fadeInUp" data-wow-delay=".3s"">';			
				if (is_home() || is_front_page()) :
					echo '<li><a href="'.esc_url($home_Link).'">'.esc_html__('Home','newsexo').'</a></li>';
					    echo '<li class="active">'; echo single_post_title(); echo '</li>';
						else:
						echo '<li><a href="'.esc_url($home_Link).'">'.esc_html__('Home','newsexo').'</a></li>';
						if ( is_category() ) {
							echo '<li class="active"><a href="'. newsexo_page_url() .'">' . esc_html__('Archive by category','newsexo').' "' . single_cat_title('', false) . '"</a></li>';
						} elseif ( is_day() ) {
							echo '<li class="active"><a href="'. esc_url(get_year_link(esc_attr(get_the_time('Y')))) . '">'. esc_html(get_the_time('Y')) .'</a>';
							echo '<li class="active"><a href="'. esc_url(get_month_link(esc_attr(get_the_time('Y')),esc_attr(get_the_time('m')))) .'">'. esc_html(get_the_time('F')) .'</a>';
							echo '<li class="active"><a href="'. newsexo_page_url() .'">'. esc_html(get_the_time('d')) .'</a></li>';
						} elseif ( is_month() ) {
							echo '<li class="active"><a href="' . get_year_link(esc_attr(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a>';
							echo '<li class="active"><a href="'. newsexo_page_url() .'">'. esc_html(get_the_time('F')) .'</a></li>';
						} elseif ( is_year() ) {
							echo '<li class="active"><a href="'. newsexo_page_url() .'">'. esc_html(get_the_time('Y')) .'</a></li>';
                        } elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
						if ( get_post_type() != 'post' ) {
							$cat = get_the_category(); 
							$cat = $cat[0];
							echo '<li>';
								echo get_category_parents($cat, TRUE, '');
							echo '</li>';
							echo '<li class="active"><a href="' . newsexo_page_url() . '">'. get_the_title() .'</a></li>';
						} }  
						elseif ( is_page() && $post->post_parent ) {
							$parent_id  = $post->post_parent;
							$breadcrumbs = array();
							while ($parent_id) {
							$page = get_page($parent_id);
							$breadcrumbs[] = '<li class="active"><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
							$parent_id  = $page->post_parent;
                            }
							$breadcrumbs = array_reverse($breadcrumbs);
							foreach ($breadcrumbs as $crumb) echo $crumb;
							echo '<li class="active"><a href="' . newsexo_page_url() . '">'. get_the_title().'</a></li>';
                        }
						elseif( is_search() )
						{
							echo '<li class="active"><a href="' . newsexo_page_url() . '">'. get_search_query() .'</a></li>';
						}
						elseif( is_404() )
						{
							echo '<li class="active"><a href="' . newsexo_page_url() . '">'.esc_html__('Error 404','newsexo').'</a></li>';
						}
						else { 
						    echo '<li class="active"><a href="' . newsexo_page_url() . '">'. get_the_title() .'</a></li>';
						}
					endif;
			echo '</ul>';
        }
endif;

/*
* Edit page link
*/
if (!function_exists('newsexo_edit_link')) :

    function newsexo_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'newsexo'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    } 
endif;

/*
* Excerpt content
*/
if ( ! function_exists( 'newsexo_posted_content' ) ) :
    function newsexo_posted_content() { 
      $newsexo_blog_content  = get_theme_mod('newsexo_blog_content','excerpt');

        if ( 'excerpt' == $newsexo_blog_content ){
            $newsexo_excerpt = newsexo_the_excerpt( absint( 20 ) );
            if ( !empty( $newsexo_excerpt ) ) :                   
                echo wp_kses_post( wpautop( $newsexo_excerpt ) );
            endif; 
        } else { 
            the_content( __('Read More','newsexo') );
        }
    }
endif;

if ( ! function_exists( 'newsexo_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     */
    function newsexo_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( get_the_excerpt($post_obj) ) ) {
            $source_content = get_the_excerpt($post_obj);
        } 
        // Check if non-breaking space exists in the text with variations
        if (preg_match('/\s*(&nbsp;|\xA0)\s*/u', $source_content)) {
            // Remove non-breaking space and its variations from the text
            $source_content = preg_replace('/\s*(&nbsp;|\xA0)\s*/u', ' ', $source_content);
            
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;
    }
endif;

/*
* Import customizer options from Lite version
*/
add_action( 'after_switch_theme', 'newsexo_merge_lite_options' );
/**
 * Import lite options.
 */
function newsexo_merge_lite_options() {

	$newsexo_mods = get_option( 'theme_mods_newsexo' );

	if ( ! empty( $newsexo_mods ) ) {

		foreach ( $newsexo_mods as $newsexo_mod_k => $newsexo_mod_v ) {
			set_theme_mod( $newsexo_mod_k, $newsexo_mod_v );
		}
	}
}

/**
 * Menu 
*/
function newsexo_custom_menu_script()
{
	$custom_logo = get_theme_mod( 'custom_logo' );
	if(display_header_text()== true && $custom_logo != null && get_bloginfo( 'title' )  !== '' ){
		$toggle_value = 1; 
	}else{
		$toggle_value = 0; 
	}
?>
<script>
	// This JS added for the Toggle button to work with the focus element.
		jQuery('.navbar-toggler').click(function(){
			document.addEventListener('keydown', function(e) {
			let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
				if (!isTabPressed) {
					return;
				}
			const  focusableElements =
				'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
			const modal = document.querySelector('.navbar.navbar-expand-lg'); // select the modal by it's id

			const firstFocusableElement = modal.querySelectorAll(focusableElements)[<?php echo $toggle_value; ?>]; // get first element to be focused inside modal
			const focusableContent = modal.querySelectorAll(focusableElements);
			const lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside modal

			  if (e.shiftKey) { // if shift key pressed for shift + tab combination
				if (document.activeElement === firstFocusableElement) {
				  lastFocusableElement.focus(); // add focus for the last focusable element
				  e.preventDefault();
				}
			  } else { // if tab key is pressed
				if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
				  firstFocusableElement.focus(); // add focus for the first focusable element
				  e.preventDefault();			  
				}
			  }

			});
		});

</script>
<?php	
}
add_action('wp_footer','newsexo_custom_menu_script');

 /**
 * AJAX handler to store the state of dismissible notices.
 */
function newsexo_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

add_action( 'wp_ajax_newsexo_dismissed_notice_handler', 'newsexo_ajax_notice_handler' );

function newsexo_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
               <div class="newsexo-notice-started updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="newsexo-notice clearfix">
                    <div class="newsexo-notice-content">
                        
                        <div class="newsexo-notice_text">
                        <div class="newsexo-hello">
                            <?php esc_html_e( 'Hello, ', 'newsexo' ); 
                            $current_user = wp_get_current_user();
                            echo esc_html( $current_user->display_name );
                            ?>
                            <img draggable="false" role="img" class="emoji" alt="👋🏻" src="https://s.w.org/images/core/emoji/14.0.0/svg/1f44b-1f3fb.svg">                
                        </div>
                        <h1 Class="wlc-heading"><?php
							$theme_info = wp_get_theme();
							printf( esc_html__('Welcome to %1$s', 'newsexo'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
                        </h1>
                        
                        <p><?php 
							printf( esc_html__('Thank you for choosing %1$s theme. To take full advantage of the complete features of the theme click the Starter Sites and Install and Activate the plugin then use the demo importer and install the %1$s Demo according to your need.', 'newsexo'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); 
						?>
						</p>

                        <div class="panel-column-6">
							<a class="newsexo-btn-get-started button button-primary button-hero newsexo-button-padding" href="#" data-name="" data-slug=""><?php esc_html_e( 'Starter Sites', 'newsexo' ) ?></a>
							
							<a class="button button-primary button-hero newsexo-button-padding" href="<?php echo esc_url( admin_url( '/customize.php' ) ); ?>" data-name="" data-slug=""><?php esc_html_e( 'Customize Site', 'newsexo' ) ?></a>
                        
							<div class="newsexo-documentation">
								<span aria-hidden="true" class="dashicons dashicons-external"></span>
								<a class="newsexo-documentation" target="blank" href="<?php echo esc_url('https://helpdoc.themearile.com/?docs=newsexo-pro')?>" data-name="" data-slug=""><?php esc_html_e( 'View Documentation', 'newsexo' ) ?></a>
							</div>

							<div class="newsexo-demos">
								<span aria-hidden="true" class="dashicons dashicons-external"></span>
								<a class="newsexo-demos" target="blank" href="<?php echo esc_url('https://themearile.com/newsexo-pro-theme/#theme-project-demo')?>" data-name="" data-slug=""><?php esc_html_e( 'View Demos', 'newsexo' ) ?></a>
							</div>

                        </div>
                        </div>
                        <div class="newsexo-notice_image">
                             <img class="newsexo-screenshot" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/welcome-'.esc_html( $theme_info->get( 'TextDomain' ) ).'-theme.png' ); ?>" alt="<?php esc_attr_e( 'NewsExo', 'newsexo' ); ?>" />
                        </div>
                    </div>
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'newsexo_deprecated_hook_admin_notice' );

/* Plugin Install */

add_action( 'wp_ajax_install_act_plugin', 'newsexo_admin_info_install_plugin' );

function newsexo_admin_info_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/one-click-demo-import' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'one-click-demo-import' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'one-click-demo-import/one-click-demo-import.php' );
    }
}

function newsexo_ocdi_register_plugins( $plugins ) {
  $theme_plugins = [
    [ // A WordPress.org plugin repository example.
      'name'     => 'Contact Form 7', // Name of the plugin.
      'slug'     => 'contact-form-7', // Plugin slug - the same as on WordPress.org plugin repository.
      'required' => true,                     // If the plugin is required or not.
    ],
	[ // A WordPress.org plugin repository example.
      'name'     => 'Post Types Order', // Name of the plugin.
      'slug'     => 'post-types-order', // Plugin slug - the same as on WordPress.org plugin repository.
      'required' => true,                     // If the plugin is required or not.
    ],
  ];
 
  return array_merge( $plugins, $theme_plugins );
}
add_filter( 'ocdi/register_plugins', 'newsexo_ocdi_register_plugins' );


/**
 * Import data
*/
function newsexo_pro_ocdi_import_files() {
	
	$activate_theme_data = wp_get_theme(); // getting current theme data
	$activate_theme = $activate_theme_data->get( 'Name' );
	$athemeslug = $activate_theme_data->get( 'TextDomain' );
	
    return array(
        array(
            'import_file_name'           => ''.$activate_theme.'',
			'categories'                 => [ 'Free' ],
            'import_file_url'            => 'https://themearile.com/demo-data/'.$athemeslug.'/'.$athemeslug.'.xml',
            'import_widget_file_url'     => 'https://themearile.com/demo-data/'.$athemeslug.'/widgets.wie',
            'import_customizer_file_url' => 'https://themearile.com/demo-data/'.$athemeslug.'/customizer.dat',
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/free-themes/'.$athemeslug.'-free-theme.jpg',
            'preview_url'                => 'https://'.$athemeslug.'.themearile.com/',
        ),
		array(
            'import_file_name'           => 'NewsExo Pro',
			'categories'                 => [ 'Pro' ],
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/newsexo-pro/newsexo-pro-screenshot.jpg',
            'preview_url'                => 'https://newsexo-pro.themearile.com/',
        ),
		array(
            'import_file_name'           => 'Newsio Pro',
			'categories'                 => [ 'Pro' ],
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/newsexo-pro/newsio-pro-screenshot.jpg',
            'preview_url'                => 'https://newsexo-pro-two.themearile.com/',
        ),
		array(
            'import_file_name'           => 'News Digest Pro',
			'categories'                 => [ 'Pro' ],
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/newsexo-pro/news-digest-pro-screenshot.jpg',
            'preview_url'                => 'https://newsexo-pro-three.themearile.com/',
        ),
		array(
            'import_file_name'           => 'NewsCorn Pro',
			'categories'                 => [ 'Pro' ],
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/newsexo-pro/newscorn-pro-screenshot.jpg',
            'preview_url'                => 'https://newsexo-pro-four.themearile.com/',
        ),
		array(
            'import_file_name'           => 'Provo News Pro',
			'categories'                 => [ 'Pro' ],
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/newsexo-pro/provo-news-pro-screenshot.jpg',
            'preview_url'                => 'https://newsexo-pro-five.themearile.com/',
        ),
		array(
            'import_file_name'           => 'Seattle News Pro',
			'categories'                 => [ 'Pro' ],
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/newsexo-pro/seattle-news-pro-screenshot.jpg',
            'preview_url'                => 'https://newsexo-pro-six.themearile.com/',
        ),
		array(
            'import_file_name'           => 'News Gadgets Pro',
			'categories'                 => [ 'Pro' ],
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/newsexo-pro/news-gadgets-pro-screenshot.jpg',
            'preview_url'                => 'https://newsexo-pro-eight.themearile.com/',
        ),
		array(
            'import_file_name'           => 'Irvine News Pro',
			'categories'                 => [ 'Pro' ],
            'import_preview_image_url'   => 'https://themearile.com/wp-content/themes/themearile-pro/assets/img/newsexo-pro/irvine-news-pro-screenshot.jpg',
            'preview_url'                => 'https://newsexo-pro-nine.themearile.com/',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'newsexo_pro_ocdi_import_files' );

function newsexo_ocdi_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'Arile Demo Import' , 'newsexo' );
    $default_settings['menu_title']  = esc_html__( 'Arile Demo Importer' , 'newsexo' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'arile-demo-importer';
 
    return $default_settings;
}
add_filter( 'ocdi/plugin_page_setup', 'newsexo_ocdi_plugin_page_setup' );

function newsexo_ocdi_plugin_intro_text( $default_text ) { ?>
		<div class="ocdi__title-container heading" style="height: auto; overflow: auto;">
			<a href="<?php echo esc_url('https://themearile.com/newsexo-pro-theme/')?>"><img width="249" height="40" src="<?php echo esc_url('//themearile.com/wp-content/uploads/2019/08/themearile-logo-steaky-2.png')?>" class="custom-logo" decoding="async"></a>
			<div class="main-btn-column">
			<a class="button button-primary button-hero newsexo-button-padding" target="blank" href="<?php echo esc_url('https://themearile.com/contact/')?>" data-name="" data-slug=""><?php esc_html_e( 'Support', 'newsexo' ) ?></a>
			<a class="button button-free-pro button-hero newsexo-button-padding" target="blank" href="<?php echo esc_url('https://themearile.com/newsexo-pro-theme/#free-pro-features')?>" data-name="" data-slug=""><?php esc_html_e( 'Free vs Pro', 'newsexo' ) ?></a>
			<a class="button button-primary button-upgrade-pro button-hero newsexo-button-padding" target="blank" href="<?php echo esc_url('//themearile.com/newsexo-pro-theme/')?>"><?php esc_html_e( 'Upgrade to Pro', 'newsexo' ) ?></a>
			</div>
		</div>
 <?php
    return $default_text;
}
add_filter( 'ocdi/plugin_intro_text', 'newsexo_ocdi_plugin_intro_text' );

function newsexo_ocdi_after_import_setup() {
  wp_trash_post( $post_id = 1 );
  
    // Assign menus to their locations.
	$primary_menu = get_term_by( 'name', 'primary-menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'footer-menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $primary_menu->term_id,
			'footer' => $footer_menu->term_id,	
		)
	);
	
			$pages = array( esc_html__( 'Home', 'newsexo' ), esc_html__( 'Blog', 'newsexo' ) );
			foreach ($pages as $page){ 
			$post_data = array( 'post_author' => 1, 'post_name' => $page,  'post_status' => 'publish' , 'post_title' => $page, 'post_type' => 'page', ); 	
			if($page== 'Home'): 
				$page_option = 'page_on_front';
				$template = 'page-templates/frontpage.php';	
			else: 	
				$page_option = 'page_for_posts';
				$template = 'page.php';
			endif;
			$post_data = wp_insert_post( $post_data, false );
				if ( $post_data ){
					update_post_meta( $post_data, '_wp_page_template', $template );
					$page = get_page_by_title($page);
					update_option( 'show_on_front', 'page' );
					update_option( $page_option, $page->ID );
				}
			}
  
}
add_action( 'ocdi/after_import', 'newsexo_ocdi_after_import_setup' );
  
