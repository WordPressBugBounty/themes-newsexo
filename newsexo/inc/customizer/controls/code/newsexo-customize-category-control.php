<?php
/**
 * Customize Editor control class.
 *
 * @package NewsExo
 *
 * @see     WP_Customize_Control
 * @access  public
 */
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/**
 * Class NewsExo_Customize_Category_Control
 */
 class NewsExo_Customize_Category_Control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select multiple <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
									
									
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
?>