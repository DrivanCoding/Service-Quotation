<?php
/**
 * Blog single tags
 *
 * @package Gutenix
 */

	gutenix_entry_meta(
		array(
			'before' => '<footer class="entry-footer">',
			'after'  => '</footer><!-- .entry-footer -->',
		),
		array(
			'gutenix_post_tags' => array(
				'delimiter' => ' ',
				'prefix'    => '<span class="tags-links__prefix">' . esc_html_x( 'Tags:', 'post tags prefix', 'gutenix' ) . '</span>',
				'before'    => '<div class="tags-links tags-links--primary">',
				'after'     => '</div>',
			)
		)
	);
