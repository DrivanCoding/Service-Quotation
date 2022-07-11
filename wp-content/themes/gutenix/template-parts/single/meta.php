<?php
/**
 * Post single meta
 *
 * @package Gutenix
 */


	if ( 'post' === get_post_type() ) :
	gutenix_entry_meta(
		array(
			'divider' => '<span class="meta-divider">&#8226;</span>',
		),
		array(
			'gutenix_posted_by'     => array( 'avatar' => true ),
			'gutenix_posted_on'     => array(),
			'gutenix_post_comments' => array( 'suffix' => esc_html__( 'Comment(s)', 'gutenix' ) ),
		)
	);

	echo '<div class="clear"></div>';
	endif;
