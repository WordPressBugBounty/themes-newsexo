<?php
/** 
 * Customizer sanitize class.
 *
 * @package newsexo
 *
 * @access  public
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Customizer Sanitizes Initial setup
 */
class NewsExo_Customizer_Sanitize {

	/**
	 * Instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance;

	/**
	 * Initiator
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Sanitize Background control.
	 *
	 * @param  mixed $val The value to be sanitized.
	 *
	 * @return array
	 */
	public static function sanitize_background( $val ) {

		if ( ! is_array( $val ) ) {
			return array();
		}

		return array(
			'background-color'      => ( isset( $val['background-color'] ) ) ? esc_attr( $val['background-color'] ) : '',
			'background-image'      => ( isset( $val['background-image'] ) ) ? esc_url_raw( $val['background-image'] ) : '',
			'background-repeat'     => ( isset( $val['background-repeat'] ) ) ? esc_attr( $val['background-repeat'] ) : '',
			'background-position'   => ( isset( $val['background-position'] ) ) ? esc_attr( $val['background-position'] ) : '',
			'background-size'       => ( isset( $val['background-size'] ) ) ? esc_attr( $val['background-size'] ) : '',
			'background-attachment' => ( isset( $val['background-attachment'] ) ) ? esc_attr( $val['background-attachment'] ) : '',
		);
	}

	/**
	 * Sanitize Alpha Color control.
	 *
	 * @param string $val The value to be sanitized.
	 *
	 * @return string
	 */
	public static function sanitize_alpha_color( $val ) {

		if ( '' === $val ) {
			return '';
		}

		if ( is_string( $val ) && 'transparent' === trim( $val ) ) {
			return 'transparent';
		}

		// If not, rgba color, perform hex sanitize.
		if ( false === strpos( $val, 'rgba' ) ) {
			return sanitize_hex_color( $val );
		}

		// So, it might be rgba color, sanitize it.
		// Remove spaces so that sscanf works properly.
		$color = str_replace( ' ', '', $val );
		// Assign color values in variables scanning the $color string.
		sscanf( $color, 'rgba(%d,%d,%d,%f)', $r, $g, $b, $a );

		return "rgba($r,$g,$b,$a)";

	}

	/**
	 * Sanitize Dimensions control.
	 *
	 * @param array $val The value to be sanitized.
	 *
	 * @return array
	 */
	public static function sanitize_dimensions( $val ) {

		if ( ! is_array( $val ) ) {
			return array();
		}

		// Sanitize each dimension input.
		foreach ( $val as $key => $item ) {
			$val[ $key ] = sanitize_text_field( $item );
		}

		return $val;

	}

	/**
	 * Sanitize Radio Buttonset control.
	 *
	 * @param string $val     The value to be sanitized.
	 * @param object $setting Control setting.
	 *
	 * @return string
	 */
	public static function sanitize_radio( $val, $setting ) {

		// Radio key must be slug, which can contain lowercase alphanumeric characters, dash, low dash symbols only.
		$val = sanitize_key( $val );

		// Retrieve all choices.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// Ensure the value is among the choices. If fails test, return default.
		return array_key_exists( $val, $choices ) ? $val : $setting->default;

	}

	/**
	 * Sanitize Slider control.
	 *
	 * @param array  $val     The value to be sanitized.
	 * @param object $setting Control setting.
	 *
	 * @return array
	 */
	public static function sanitize_slider( $val, $setting ) {

		$input_attrs = array();

		if ( isset( $setting->manager->get_control( $setting->id )->input_attrs ) ) {
			$input_attrs = $setting->manager->get_control( $setting->id )->input_attrs;
		}

		$val['slider'] = is_numeric( $val['slider'] ) ? $val['slider'] : '';

		$val['slider'] = isset( $input_attrs['min'] ) && ( ! empty( $val ) ) && ( $input_attrs['min'] > $val['slider'] ) ? $input_attrs['min'] : $val['slider'];
		$val['slider'] = isset( $input_attrs['max'] ) && ( ! empty( $val ) ) && ( $input_attrs['max'] < $val['slider'] ) ? $input_attrs['max'] : $val['slider'];

		$val['suffix'] = esc_attr( $val['suffix'] );

		return $val;

	}

	/**
	 * Sanitize Sortable control.
	 *
	 * @param array  $val     The value to be sanitized.
	 * @param object $setting Control setting.
	 *
	 * @return array
	 */
	public static function sanitize_sortable( $input, $setting ) {

		// Get list of choices from the control
		// associated with the setting.
		$choices    = $setting->manager->get_control( $setting->id )->choices;
		$input_keys = $input;

		foreach ( $input_keys as $key => $value ) {
			if ( ! array_key_exists( $value, $choices ) ) {
					unset( $input[ $key ] );
			}
		}

		// If the input is a valid key, return it;
		// otherwise, return the default.
		return ( is_array( $input ) ? $input : $setting->default );
	}

	/**
	 * Sanitize checkbox.
	 *
	 * @param bool $val The value to be sanitized.
	 *
	 * @return bool
	 */
	public static function sanitize_checkbox( $val ) {

		if ( '0' === $val || 'false' === $val ) {
			return false;
		}

		return (bool) $val;

	}

}

NewsExo_Customizer_Sanitize::get_instance();
