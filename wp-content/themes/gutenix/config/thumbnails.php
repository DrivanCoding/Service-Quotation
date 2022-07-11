<?php
/**
 * Thumbnails configuration.
 *
 * @package Gutenix
 */

return apply_filters( 'gutenix_register_image_sizes', array(
	'post-thumbnail' 			=> array( 'width' => 370, 'height' => 250, 'crop' => true ),
	'gutenix-thumb-s' 			=> array( 'width' => 300, 'height' => 200, 'crop' => true ),
	'gutenix-thumb-m' 			=> array( 'width' => 770, 'height' => 520, 'crop' => true ),
	'gutenix-thumb-post' 		=> array( 'width' => 820, 'height' => 9999, 'crop' => true ),
	'gutenix-thumb-l' 			=> array( 'width' => 1170, 'height' => 650, 'crop' => true ),
	'gutenix-thumb-xl' 			=> array( 'width' => 1920, 'height' => 1080, 'crop' => true ),

	'gutenix-thumb-grid-2col' 	=> array( 'width' => 570, 'height' => 385, 'crop' => true ),

	'gutenix-thumb-masonry' 	=> array( 'width' => 370, 'height' => 9999, 'crop' => true ),
	'gutenix-thumb-masonry-2col' => array( 'width' => 570, 'height' => 9999, 'crop' => true ),
	'gutenix-thumb-justify' 	=> array( 'width' => 770, 'height' => 250, 'crop' => true ),
) );
