<?php
/**
 * Layout configuration.
 *
 * @package Gutenix
 */

return apply_filters( 'gutenix_layout_config', array(
	'boxed-full-width' => array(
		'container' => 'boxed',
		'content'   => array( 'gutenix-col-xs-12' ),
	),
	'boxed-content-sidebar' => array(
		'container' => 'boxed',
		'content'   => array( 'gutenix-col-xs-12', 'gutenix-col-md-8' ),
		'sidebar'   => array( 'gutenix-col-xs-12', 'gutenix-col-md-4' ),
	),
	'boxed-sidebar-content' => array(
		'container' => 'boxed',
		'content'   => array( 'gutenix-col-xs-12', 'gutenix-col-md-8', 'gutenix-col-md-last' ),
		'sidebar'   => array( 'gutenix-col-xs-12', 'gutenix-col-md-4', 'gutenix-col-md-first' ),
	),
	'full-width' => array(
		'container' => 'full-width',
		'content'   => array( 'gutenix-col-xs-12' ),
	),
) );
