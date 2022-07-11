<?php
/**
 * Modules configuration
 *
 * Allowed to rewrite in child theme.
 *
 * Format:
 * associative array.
 * keys - module name to load,
 * values - array of child modules for this module. If module has no childs - just an empty array
 */

return apply_filters( 'gutenix_allowed_modules', array(
	'woo' 				=> array(),
	'beaver-builder' 	=> array(),
) );