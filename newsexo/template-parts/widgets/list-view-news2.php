<?php
/**
* Widget API: List View Widget Class
* @package NewsExo
*/
class NewsExo_List_View_News2_Widget extends WP_Widget {

    //construct part
    function __construct()
    {
        parent::__construct(
        //Base ID of widget
        'newsexo_list_view_news2',

        //widget name will appear in UI
        esc_html__('NewsExo : List View News 2','newsexo'),

        // Widget description
        array( 'description' => esc_html__('Display your blog in a grid view with a list layout','newsexo'))  
        );

    }

    //Widget Front End
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) { $args['widget_id'] = $this->id; }
        $title    = isset( $instance['title'] ) ? $instance['title'] : '';
        $category = isset( $instance['category'] ) ? $instance['category'] : '';
        if ( ! is_numeric($category) && !empty($category) ) {  $term = get_term_by('slug', $category, 'category'); $category = $term->term_id; }
        $number   = 5;
        echo wp_kses_post($args['before_widget']);
        if ( $title ) { echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);}
	   
		?>
		<div class="list-view-post-widget">
                    <?php
                        $query_args = new WP_Query( apply_filters( 'widget_posts_args', array(
                            'no_found_rows'       => true,
                            'post_status'         => 'publish',
                            'cat'                 => $category,
                            'posts_per_page'      => $number,
                            'order'               => 'DESC',
                            'ignore_sticky_posts' => true
                        ) ) );
                        if ( $query_args->have_posts() ) { 
                            while ( $query_args->have_posts() ) {
                            $query_args->the_post();?>
					
								<article class="post">							
									<figure class="post-thumbnail"> 
								<?php $img_class =array('class' => "img-fluid");
								the_post_thumbnail('',$img_class);?>
									</figure>
									<figcaption class="post-content">
										<header class="entry-header">
											<h6 class="entry-title">
											   <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
											</h6>
										</header>	
										<div class="entry-meta">
											<span class="posted-on">
											<i class="fa-regular fa-clock"></i>
											   <a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time>
									            <?php echo esc_html(get_the_date('M j, Y')); ?></time></a>
											</span>
										</div>	
									</figcaption>	
								</article>
											
                            <?php }
                            wp_reset_postdata();
                        } ?>
						
		</div>		
                      
        <?php
        echo wp_kses_post($args['after_widget']);
    }

    //Widget Back End
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ])){ $title = $instance[ 'title' ]; } else { $title = esc_html__("Widget title","newsexo" ); }
        if ( isset( $instance[ 'category' ])){ $category = $instance[ 'category' ]; }
        if ( ! is_numeric($category) ) { $category = get_term_by('slug', $category, 'category'); $category =$category->term_id; }
        ?>
            <!-- Heading -->
            <p class="newsexo-widet-area">
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Widget Title','newsexo' ); echo ':'; ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <!-- Category -->
            <p class="newsexo-widet-area">
                <label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php echo esc_html__( 'Categories','newsexo' ); echo ':'; ?></label>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'category' )); ?>">
                    <option value=""><?php echo esc_html__( 'All Category', 'newsexo' );?></option>
                    <?php  
                    $categories = get_categories(); 
                    foreach( $categories as $cat ): ?>
                    <option  value="<?php echo esc_attr($cat->term_id);?>" <?php if($cat->term_id == $category) { echo 'selected'; } ?>><?php echo esc_html($cat->name). ' (' .esc_html($cat->count). ') ';?></option>
                    <?php endforeach;?>
                </select>
            </p>
        <?php
    }

    //save or uption option
    public function update( $new_instance, $old_instance)
    {
      $instance = $old_instance;
      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
      $instance['category'] = ( ! empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
      return $instance;
    }

}