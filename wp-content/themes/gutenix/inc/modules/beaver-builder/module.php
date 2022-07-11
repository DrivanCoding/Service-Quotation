<?php
/**
 * Beaver Builder integration module
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Gutenix_Beaver_Builder_Module' ) ) {

	/**
	 * Define Gutenix_Beaver_Builder_Module class
	 */
	class Gutenix_Beaver_Builder_Module extends Gutenix_Module_Base {

		/**
		 * Module ID
		 *
		 * @return string
		 */
		public function module_id() {
			return 'beaver-builder';
		}

		/**
		 * Module filters
		 *
		 * @return void
		 */
		public function filters() {
			add_filter( 'fl_builder_register_settings_form', array( $this, 'modify_global_settings_form' ), 10, 2 );
		}

		/**
		 * Modify global settings form.
		 *
		 * @param array $form
		 * @param string $id
		 *
		 * @return array
		 */
		public function modify_global_settings_form( $form, $id ) {

			if ( 'global' !== $id ) {
				return $form;
			}

			$form['tabs']['general']['sections']['page_heading']['fields']['default_heading_selector']['default'] = '.entry-title';

			return $form;
		}

		/**
		 * Module condition callback.
		 *
		 * @return bool|callable
		 */
		public function condition_cb() {
			return class_exists( 'FLBuilder' );
		}
	}

}
