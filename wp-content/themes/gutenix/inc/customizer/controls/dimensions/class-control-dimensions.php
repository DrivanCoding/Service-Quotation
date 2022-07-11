<?php
/**
 * Customizer Control: gutenix-dimensions.
 *
 * @package     Gutenix
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dimensions control
 */
class Gutenix_Customizer_Dimensions_Control extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'gutenix-dimensions';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $linked_choices = '';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $responsive = '';

	/**
	 * The unit type.
	 *
	 * @access public
	 * @var array
	 */
	public $unit_choices = array( 'px' => 'px' );

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
				'desktop'      => array(
					'top'    => $val,
					'right'  => '',
					'bottom' => $val,
					'left'   => '',
				),
				'tablet'       => array(
					'top'    => $val,
					'right'  => '',
					'bottom' => $val,
					'left'   => '',
				),
				'mobile'       => array(
					'top'    => $val,
					'right'  => '',
					'bottom' => $val,
					'left'   => '',
				),
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
		}

		/* Control Units */
		$units = array(
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);

		foreach ( $units as $unit_key => $unit_value ) {
			if ( ! isset( $val[ $unit_key ] ) ) {
				$val[ $unit_key ] = $unit_value;
			}
		}

		$this->json['value'] 			= $val;
		$this->json['choices'] 			= $this->choices;
		$this->json['link'] 			= $this->get_link();
		$this->json['id'] 				= $this->id;
		$this->json['label'] 			= esc_html( $this->label );
		$this->json['linked_choices'] 	= $this->linked_choices;
		$this->json['responsive'] 		= $this->responsive;
		$this->json['unit_choices'] 	= $this->unit_choices;
		
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

		$item_link_desc = esc_html__( 'Link Values Together', 'gutenix' );

		?>
		<label class='gutenix-dimension' for="" >

			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# }

			desktop_unit_val = 'px';
			tablet_unit_val  = 'px';
			mobile_unit_val  = 'px';

			if ( data.value['desktop-unit'] ) { 
				desktop_unit_val = data.value['desktop-unit'];
			} 

			if ( data.value['tablet-unit'] ) { 
				tablet_unit_val = data.value['tablet-unit'];
			} 

			if ( data.value['mobile-unit'] ) { 
				mobile_unit_val = data.value['mobile-unit'];
			} #>


			<div class="gutenix-dimension-outer-wrapper">
			<#
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
			<div class="input-wrapper gutenix-dimension-wrapper">

				<ul class="gutenix-spacing-wrapper desktop active"><# 
					if ( data.linked_choices ) { #>
					<li class="gutenix-spacing-input-item-link">
							<span class="dashicons dashicons-admin-links gutenix-spacing-connected wp-ui-highlight" data-element-connect="{{ data.id }}" title="<?php echo esc_html( $item_link_desc ); ?>"></span>
							<span class="dashicons dashicons-editor-unlink gutenix-spacing-disconnected" data-element-connect="{{ data.id }}" title="<?php echo esc_html( $item_link_desc ); ?>"></span>
						</li><#
					}
					_.each( data.choices, function( choiceLabel, choiceID ) {
					#><li class='gutenix-spacing-input-item'>
						<input type='number' class='gutenix-spacing-input gutenix-spacing-desktop' {{{ data.inputAttrs }}} data-id= '{{ choiceID }}' value='{{ value_desktop[ choiceID ] }}'>
						<span class="gutenix-spacing-title">{{{ data.choices[ choiceID ] }}}</span>
					</li><#
					}); #>
					<ul class="gutenix-dimension-units gutenix-spacing-desktop-responsive-units">
						<#_.each( data.unit_choices, function( unit_key ) { 
							unit_class = '';
							if ( desktop_unit_val === unit_key ) { 
								unit_class = 'active';
							}
						#><li class='single-unit {{ unit_class }}' data-unit='{{ unit_key }}' >
							<span class="unit-text">{{{ unit_key }}}</span>
						</li><# 
						});#>
					</ul>
				</ul>

				<ul class="gutenix-spacing-wrapper tablet"><# 

					if ( data.linked_choices ) { #>
					<li class="gutenix-spacing-input-item-link">
						<span class="dashicons dashicons-admin-links gutenix-spacing-connected wp-ui-highlight" data-element-connect="{{ data.id }}" title="<?php echo esc_html( $item_link_desc ); ?>"></span>
						<span class="dashicons dashicons-editor-unlink gutenix-spacing-disconnected" data-element-connect="{{ data.id }}" title="<?php echo esc_html( $item_link_desc ); ?>"></span>
					</li><#
					}
					_.each( data.choices, function( choiceLabel, choiceID ) { 
					#><li class='gutenix-spacing-input-item'>
						<input type='number' class='gutenix-spacing-input gutenix-spacing-tablet' {{{ data.inputAttrs }}} data-id='{{ choiceID }}' value='{{ value_tablet[ choiceID ] }}'>
						<span class="gutenix-spacing-title">{{{ data.choices[ choiceID ] }}}</span>
					</li><# 
					}); #>
					<ul class="gutenix-dimension-units gutenix-spacing-tablet-responsive-units">
						<#_.each( data.unit_choices, function( unit_key ) { 
							unit_class = '';
							if ( tablet_unit_val === unit_key ) { 
								unit_class = 'active';
							}
						#><li class='single-unit {{ unit_class }}' data-unit='{{ unit_key }}' >
							<span class="unit-text">{{{ unit_key }}}</span>
						</li><# 
						});#>
					</ul>
				</ul>

				<ul class="gutenix-spacing-wrapper mobile"><# 
					if ( data.linked_choices ) { #>
					<li class="gutenix-spacing-input-item-link">
						<span class="dashicons dashicons-admin-links gutenix-spacing-connected wp-ui-highlight" data-element-connect="{{ data.id }}" title="<?php echo esc_html( $item_link_desc ); ?>"></span>
						<span class="dashicons dashicons-editor-unlink gutenix-spacing-disconnected" data-element-connect="{{ data.id }}" title="<?php echo esc_html( $item_link_desc ); ?>"></span>
					</li><#
					}
					_.each( data.choices, function( choiceLabel, choiceID ) { 
					#><li class='gutenix-spacing-input-item'>
						<input type='number' class='gutenix-spacing-input gutenix-spacing-mobile' {{{ data.inputAttrs }}} data-id='{{ choiceID }}' value='{{ value_mobile[ choiceID ] }}'>
						<span class="gutenix-spacing-title">{{{ data.choices[ choiceID ] }}}</span>
					</li><# 
					}); #>
					<ul class="gutenix-dimension-units gutenix-spacing-mobile-responsive-units">
						<#_.each( data.unit_choices, function( unit_key ) { 
							unit_class = '';
							if ( mobile_unit_val === unit_key ) { 
								unit_class = 'active';
							}
						#><li class='single-unit {{ unit_class }}' data-unit='{{ unit_key }}' >
							<span class="unit-text">{{{ unit_key }}}</span>
						</li><# 
						});#>
					</ul>
				</ul>
			</div>

			<div class="gutenix-dimension-units-screen-wrap">
				<div class="unit-input-wrapper gutenix-spacing-unit-wrapper">
					<input type='hidden' class='gutenix-spacing-unit-input gutenix-spacing-desktop-unit' data-device='desktop' value='{{desktop_unit_val}}'>
					<input type='hidden' class='gutenix-spacing-unit-input gutenix-spacing-tablet-unit' data-device='tablet' value='{{tablet_unit_val}}'>
					<input type='hidden' class='gutenix-spacing-unit-input gutenix-spacing-mobile-unit' data-device='mobile' value='{{mobile_unit_val}}'>
				</div>
				
				<# if ( data.responsive ) { #>
					<ul class="gutenix-dimension-btns">
						<li class="desktop active">
							<button type="button" class="preview-desktop active" data-device="desktop">
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

			</div>

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
