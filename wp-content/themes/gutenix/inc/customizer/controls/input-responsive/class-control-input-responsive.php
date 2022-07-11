<?php
/**
 * Customizer Control: gutenix-input-responsive
 *
 * @package     Gutenix
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * A text control with validation for CSS units.
 */
class Gutenix_Customizer_Input_Responsive_Control extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'gutenix-input-responsive';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_script( 'gutenix-input-responsive', get_theme_file_uri( 'inc/customizer/controls/input-responsive/input-responsive.js' ), array( 'jquery', 'customize-base' ), false, true );
		wp_enqueue_style( 'gutenix-input-responsive', get_theme_file_uri( 'inc/customizer/controls/input-responsive/input-responsive.css' ), null );
	}

	/**
	 * The responsive type.
	 *
	 * @access public
	 * @var string
	 */
	public $responsive = true;

	/**
	 * The control type.
	 *
	 * @access public
	 * @var array
	 */
	public $unit_choices = array();

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		$val = maybe_unserialize( $this->value() );

		if ( ! is_array( $val ) || is_numeric( $val ) ) {

			$val = array(
				'desktop'      => $val,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => '',
				'tablet-unit'  => '',
				'mobile-unit'  => '',
			);
		}

		$this->json['value']      = $val;
		$this->json['choices']    = $this->choices;
		$this->json['link']       = $this->get_link();
		$this->json['id']         = $this->id;
		$this->json['label']      = esc_html( $this->label );
		$this->json['unit_choices'] = $this->unit_choices;
		$this->json['responsive'] = $this->responsive;

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


		<label class="customizer-text" for="" >
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>

				<# if ( data.responsive ) { #>
				<ul class="gutenix-input-responsive-btns">
					<li class="desktop">
						<button type="button" class="preview-desktop" data-device="desktop">
							<i class="dashicons dashicons-desktop"></i>
						</button>
					</li>
					<li class="tablet">
						<button type="button" class="preview-tablet" data-device="tablet">
							<i class="dashicons dashicons-tablet"></i>
						</button>
					</li>
					<li class="mobile">
						<button type="button" class="preview-mobile" data-device="mobile">
							<i class="dashicons dashicons-smartphone"></i>
						</button>
					</li>
				</ul>
				<# } #>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } 

			value_desktop = '';
			value_tablet  = '';
			value_mobile  = '';

			if ( data.value['desktop'] ) { 
				value_desktop = data.value['desktop'];
			} 

			if ( data.value['tablet'] ) { 
				value_tablet = data.value['tablet'];
			} 

			if ( data.value['mobile'] ) { 
				value_mobile = data.value['mobile'];
			} #>

			<div class="input-wrapper gutenix-input-responsive-wrapper">

				<# if ( data.responsive ) { #>
					<input {{{ data.inputAttrs }}} data-id='desktop' class="gutenix-input-responsive-input desktop active" type="number" data-name="{{data.name}}" value="{{ value_desktop }}"/>
					<select class="gutenix-input-responsive-select desktop" data-name="{{data.name}}" data-id='desktop-unit' <# if ( _.size( data.unit_choices ) === 1 ) { #> disabled="disabled" <# } #>>
					<# _.each( data.unit_choices, function( value, key ) { #>
						<option value="{{{ key }}}" <# if ( data.value['desktop-unit'] === key ) { #> selected="selected" <# } #>>{{{ data.unit_choices[ key ] }}}</option>
					<# }); #>
					</select>

					<input {{{ data.inputAttrs }}} data-id='tablet' data-name="{{data.name}}" class="gutenix-input-responsive-input tablet" type="number" value="{{ value_tablet }}"/>
					<select class="gutenix-input-responsive-select tablet" data-name="{{data.name}}" data-id='tablet-unit' <# if ( _.size( data.unit_choices ) === 1 ) { #> disabled="disabled" <# } #>>
					<# _.each( data.unit_choices, function( value, key ) { #>
						<option value="{{{ key }}}" <# if ( data.value['tablet-unit'] === key ) { #> selected="selected" <# } #>>{{{ data.unit_choices[ key ] }}}</option>
					<# }); #>
					</select>

					<input {{{ data.inputAttrs }}} data-id='mobile' data-name="{{data.name}}" class="gutenix-input-responsive-input mobile" type="number" value="{{ value_mobile }}"/>
					<select class="gutenix-input-responsive-select mobile" data-name="{{data.name}}" data-id='mobile-unit' <# if ( _.size( data.unit_choices ) === 1 ) { #> disabled="disabled" <# } #>>
					<# _.each( data.unit_choices, function( value, key ) { #>
						<option value="{{{ key }}}" <# if ( data.value['mobile-unit'] === key ) { #> selected="selected" <# } #>>{{{ data.unit_choices[ key ] }}}</option>
					<# }); #>
					</select>

				<# } else { #>
					<input {{{ data.inputAttrs }}} data-id='desktop' data-name="{{data.name}}" class="gutenix-input-responsive-input gutenix-input-non-reponsive desktop active" type="number" value="{{ value_desktop }}"/>
					<select class="gutenix-input-responsive-select gutenix-input-non-reponsive desktop" data-id='desktop-unit' data-name="{{data.name}}" <# if ( _.size( data.unit_choices ) === 1 ) { #> disabled="disabled" <# } #>>
					<# _.each( data.unit_choices, function( value, key ) { #>
						<option value="{{{ key }}}" <# if ( data.value['desktop-unit'] === key ) { #> selected="selected" <# } #>>{{{ data.unit_choices[ key ] }}}</option>
					<# }); #>
					</select>
				<# } #>
			</div>
		</label>
		<?php
	}

	/**
	 * Render the control's content.
	 *
	 * @see WP_Customize_Control::render_content()
	 */
	protected function render_content() {}
}
