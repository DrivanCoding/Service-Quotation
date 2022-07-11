<?php
/**
 * The template for displaying comments.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy
 *
 * @package Gutenix
 */
?>
<div class="comment-author vcard">
	<?php echo wp_kses_post( wp_unslash( gutenix_comment_author_avatar() ) ); ?>
</div>
<div class="comment-content-wrap">
	<div class="comment-meta-wrap">
		<?php
		gutenix_entry_meta(
			array(
				'before'  => '<footer class="comment-meta">',
				'after'   => '</footer>',
				'divider' => '<span class="meta-divider">&#8226;</span>',
			),
			array(
				'gutenix_get_comment_author_link' => array( 'prefix' => esc_html_x( 'by', 'post author prefix', 'gutenix' ) ),
				'gutenix_get_comment_date'        => array( 'prefix' => esc_html_x( 'Posted', 'post date prefix', 'gutenix' ) ),
			)
		);

		echo wp_kses_post( wp_unslash( gutenix_get_comment_reply_link( array(
			'before'     => '<div class="comment-reply">',
			'after'      => '</div>',
			'reply_text' => esc_html__( 'Reply', 'gutenix' ),
		) ) ) );
		?>
	</div>
	<div class="comment-content">
		<?php echo wp_kses_post( wp_unslash( gutenix_get_comment_text() ) ); ?>
	</div>
</div>
