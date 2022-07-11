<?php
/**
 * Customizer Control: gutenix-radio-image.
 *
 * @package     Gutenix
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Radio image control
 */
class Gutenix_Customizer_Radio_Image_Control extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'gutenix-radio-image';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		if ( isset( $this->default ) ) {
			$this->json['default'] 	= $this->default;
		} else {
			$this->json['default'] 	= $this->setting->default;
		}
		$this->json['value']       	= $this->value();
		$this->json['choices']     	= $this->choices;
		$this->json['link']        	= $this->get_link();
		$this->json['id']          	= $this->id;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<div id="input_{{ data.id }}" class="image">
			<# for ( key in data.choices ) { #>
				<input {{{ data.inputAttrs }}} class="image-select" type="radio" value="{{ key }}" name="_customize-radio-{{ data.id }}" id="{{ data.id }}{{ key }}" {{{ data.link }}}<# if ( data.value === key ) { #> checked="checked"<# } #>>
					<label for="{{ data.id }}{{ key }}" title="{{ data.choices[ key ]['label'] }}">
						<# if ( ! _.isUndefined( data.choices[ key ]['url'] ) ) { #>
							<img src="{{ data.choices[ key ]['url'] }}" alt="{{ data.choices[ key ]['label'] }}" />
						<# } #>
						<# if ( ! _.isUndefined( data.choices[ key ]['icon'] ) ) { #>
							<span class="dashicons dashicons-editor-{{ data.choices[ key ]['icon'] }}"></span>
						<# } #>
						<span class="image-clickable"></span>
						<span class="radio-label">{{ data.choices[ key ]['label'] }}</span>
					</label>
				</input>
			<# } #>
		</div>
		<?php
	}
}
