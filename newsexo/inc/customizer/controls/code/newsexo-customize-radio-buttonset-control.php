<?php
/**
 * Customize Radio Buttonset control class.
 *
 * @package newsexo
 *
 * @see     WP_Customize_Control
 * @access  public
 */

/**
 * Class NewsExo_Customize_Radio_Buttonset_Control
 */
class NewsExo_Customize_Radio_Buttonset_Control extends NewsExo_Customize_Base_Control {

	/**
	 * Customize control type.
	 *
	 * @access public
	 * @var    string
	 */
	public $type = 'newsexo-radio-buttonset';

	/**
	 * Renders the Underscore template for this control.
	 *
	 * @see    WP_Customize_Control::print_template()
	 * @access protected
	 * @return void
	 */
	protected function content_template() {
		?>

		<# if ( data.label ) { #><span class="customize-control-title">{{{ data.label }}}</span><# } #>
		<# if ( data.description ) { #>
		<span class="description customize-control-description">{{{ data.description }}}</span><# } #>
		<div id="input_{{ data.id }}" class="buttonset">
			<# for ( key in data.choices ) { #>
			<input {{{ data.inputAttrs }}} class="switch-input screen-reader-text" type="radio" value="{{ key }}"
					name="_customize-radio-{{{ data.id }}}" id="{{ data.id }}{{ key }}" {{{ data.link }}}<# if ( key === data.value ) { #> checked="checked" <# } #>>
			<label class="switch-label switch-label-<# if ( key === data.value ) { #>on <# } else { #>off<# } #>"
					for="{{ data.id }}{{ key }}">{{ data.choices[ key ] }}</label>
			</input>
			<# } #>
		</div>
		<?php
	}

	/**
	 * Render content is still called, so be sure to override it with an empty function in your subclass as well.
	 */
	protected function render_content() {

	}


}
