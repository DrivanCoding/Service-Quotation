<?php
/**
 * Customizer Control: gutenix-alphacolor.
 *
 * @package     Gutenix
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Alpha Color Picker Customizer Control
 */

class Gutenix_Customizer_Alpha_Color_Control extends WP_Customize_Control {

	/**
	 * Official control name.
	 */
	public $type = 'gutenix-alphacolor';

	/**
	 * Enqueue scripts and styles.
	 *
	 * Ideally these would get registered and given proper paths before this control object
	 * gets initialized, then we could simply enqueue them here, but for completeness as a
	 * stand alone class we'll register and enqueue them here.
	 */
	public function enqueue() {
		wp_enqueue_script( 'gutenix-customizer-coloralpha', get_theme_file_uri( 'inc/customizer/controls/coloralpha/coloralpha.js' ), array( 'jquery', 'customize-base' ), false, true );
		wp_enqueue_style( 'gutenix-customizer-coloralpha', get_theme_file_uri( 'inc/customizer/controls/coloralpha/coloralpha.css' ), null );
	}

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
	}

	/**
	 * Render the control.
	 */
	protected function content_template() {
		?>
		
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<label>
			<input class="alpha-color-control" type="text" data-alpha="true" <?php $this->link(); ?>  />
		</label>
		<?php
	}
}