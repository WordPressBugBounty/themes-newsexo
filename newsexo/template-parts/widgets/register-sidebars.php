<?php
/**
 * Register widget area.
 *
*/
function newsexo_widgets_init() {
	
	/**
    * Primary Sidebar widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__( 'Primary Sidebar', 'newsexo' ),
            'id'            => 'sidebar-main',
            'description'   => esc_html__( 'Add widgets in primary sidebar widget area', 'newsexo' ),
            'before_widget' => '<aside id="%1$s" data-wow-delay=".3s" class="wow animate fadeInUp widget side-bar-widget sidebar-main %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h5 class="wp-block-heading">',
            'after_title'   => '</h5>',
        )
    );

    /**
    * frontpage widget area 
    */
	
    register_sidebar(
        array(
            'name'          => esc_html__( 'FrontPage Content', 'newsexo' ),
            'id'            => 'front-page-content',
            'description'   => esc_html__( 'Add widgets in front page', 'newsexo'). esc_html__('widget area', 'newsexo' ),
            'before_widget' => '<div id="%1$s" class="widget row mb-space-20 frontpage-content %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="wp-block-heading">',
            'after_title'   => '</h5>',
        )
    );
    
    /**
    * frontpage sidebar
    */
	
    register_sidebar(
        array(
            'name'          => esc_html__( 'FrontPage Sidebar', 'newsexo' ),
            'id'            => 'frontpage-sidebar',
            'description'   => esc_html__( 'Add widgets in frontpage sidebar', 'newsexo' ) .esc_html__('widget area', 'newsexo' ),
            'before_widget' => '<div id="%1$s" data-wow-delay=".3s" class="widget frontpage-sidebar wow animate fadeInUp %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="wp-block-heading">',
            'after_title'   => '</h5>',
        )
    );
	
    /**
    * Footer Sidebar One widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Sidebar One', 'newsexo' ),
            'id'            => 'footer-sidebar-one',
            'description'   => esc_html__('Add widgets in footer widget area one', 'newsexo' ),
            'before_widget' => '<aside id="%1$s" data-wow-delay=".3s" class="widget footer-sidebar-one wow animate fadeInUp %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h5 class="wp-block-heading">',
            'after_title'   => '</h5>',
        )
    );

    /**
    * Footer Sidebar Two widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Sidebar Two', 'newsexo' ),
            'id'            => 'footer-sidebar-two',
            'description'   => esc_html__('Add widgets in footer widget area', 'newsexo' ),
            'before_widget' => '<aside id="%1$s" data-wow-delay=".3s" class="widget footer-sidebar-two wow animate fadeInUp %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h5 class="wp-block-heading">',
            'after_title'   => '</h5>',
        )
    );

    /**
    * Footer Sidebar Three widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Sidebar Three', 'newsexo' ),
            'id'            => 'footer-sidebar-three',
            'description'   => esc_html__('Add widgets in footer widget area', 'newsexo' ),
            'before_widget' => '<aside id="%1$s" data-wow-delay=".3s" class="widget footer-sidebar-three wow animate fadeInUp %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h5 class="wp-block-heading">',
            'after_title'   => '</h5>',
        )
    );

    /**
    * Footer Sidebar Four widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Sidebar Four', 'newsexo' ),
            'id'            => 'footer-sidebar-four',
            'description'   => esc_html__('Add widgets in footer widget area', 'newsexo' ),
            'before_widget' => '<aside id="%1$s" data-wow-delay=".3s" class="widget footer-sidebar-four wow animate fadeInUp %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h5 class="wp-block-heading">',
            'after_title'   => '</h5>',
        )
    );

    // Register custom widgets
    register_widget( 'NewsExo_List_View_News_Widget' );  
    register_widget( 'NewsExo_Grid_View_News_Widget' );     
	register_widget( 'NewsExo_List_View_News2_Widget' );
}

add_action('widgets_init', 'newsexo_widgets_init');


// includes widget files
get_template_part('template-parts/widgets/list-view-news');
get_template_part('template-parts/widgets/grid-view-news');
get_template_part('template-parts/widgets/list-view-news2');

require_once ( NEWSEXO_PARENT_INC_DIR . '/customizer/sanitize-callback.php' );

function newsexo_widget_register_scripts($hook) {
    if( $hook !== "widgets.php" ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_style( 'newsexo-widget', get_template_directory_uri() . '/assets/css/widgets.css', array(),'', 'all'  );
    wp_enqueue_script( 'newsexo-media-upload', get_template_directory_uri() . '/assets/js/widgets.js', array( 'jquery' ),'',true);
    wp_enqueue_script( 'owl_carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ),'',true);
}
add_action( 'admin_enqueue_scripts', 'newsexo_widget_register_scripts' );