<?php
/**
 * Customize Text control class.
 *
 * @package newsexo
 *
 * @see     WP_Customize_Control
 * @access  public
 */

/**
 * Class NewsExo_Customize_Text_Control
 */
class NewsExo_Customize_Text_Control extends NewsExo_Customize_Base_Control {

	/**
	 * Customize control type.
	 *
	 * @access public
	 * @var    string
	 */
	public $type = 'newsexo-text';

	/**
	 * Renders the Underscore template for this control.
	 *
	 * @see    WP_Customize_Control::print_template()
	 * @access protected
	 * @return void
	 */
	protected function content_template() {
		?>

		<# if ( data.label ) { #>
		<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
		<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<div class="customize-control-content">
			<input type="text" value="{{ data.value }}" {{{ data.link }}} {{{ data.inputAttrs }}}/>
		</div>

		<?php
	}

	/**
	 * Render content is still called, so be sure to override it with an empty function in your subclass as well.
	 */
	protected function render_content() {

	}

}
