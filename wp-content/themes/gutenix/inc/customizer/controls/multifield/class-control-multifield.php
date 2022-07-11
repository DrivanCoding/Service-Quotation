<?php
/**
 * Customizer Control: gutenix-multi-field.
 *
 * @package     Gutenix
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Multi field control
 */
class Gutenix_Customizer_Multifield_Control extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'gutenix-multi-field';

	/**
	 * Control method
	 *
	 * @since 1.0.0
	 */
	public function content_template() {
		?>
		<label class="gutenix_customize_multi_input">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="gutenix_customize_multi_value_field" <?php $this->link(); ?> />
			<div class="gutenix_customize_multi_fields">
				<div class="set">
					<input type="text" value="" class="gutenix_customize_multi_single_field"/>
					<span class="gutenix_customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span>
				</div>
			</div>
			<a href="#" class="button button-primary gutenix_customize_multi_add_field"><?php esc_html_e( 'Add More', 'gutenix' ) ?></a>
		</label>
		<?php
	}
}
