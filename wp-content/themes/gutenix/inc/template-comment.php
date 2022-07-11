<?php
/**
 * Functions for handling how comments are displayed and used on the site.
 *
 * @package Gutenix
 */

/**
 * A custom function to use to open and display each comment.
 *
 * @since 1.0.0
 * @param object $_comment Comment to display.
 * @param array  $args     An array of arguments.
 * @param int    $depth    Depth of comment.
 */
function gutenix_rewrite_comment_item( $_comment, $args, $depth ) {
	global $gutenix_comment;

	$_comment->gutenix_comment_list_args = $args;
	$gutenix_comment = $_comment;

	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li'; ?>

	<<?php echo tag_escape( $tag ); ?> <?php comment_class( $args['has_children'] ? 'parent' : '' ); ?> id="comment-<?php comment_ID(); ?>">

	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<div class="comment-body__holder">
			<?php get_template_part( 'template-parts/comment' ); ?>
		</div>
	</article><!-- .comment-body -->
<?php }

/**
 * Retrieve the avatar of the author of the current comment.
 *
 * @since  1.0.0
 * @param  array $args    Arguments.
 * @return string $output Avatar of the author of the comment.
 */
function gutenix_comment_author_avatar( $args = array() ) {
	global $gutenix_comment;

	$size = apply_filters( 'gutenix_default_comment_author_avatar_size', 60 );

	if ( ! empty( $gutenix_comment->gutenix_comment_list_args['avatar_size'] ) ) {
		$size = $gutenix_comment->gutenix_comment_list_args['avatar_size'];
	}

	if ( ! empty( $args['size'] ) ) {
		$size = intval( $args['size'] );
	}

	/**
	 * Filter the avatar of the author of the current comment.
	 *
	 * @since 1.0.0
	 * @param array $output Avatar.
	 * @param array $args   Arguments.
	 */
	return apply_filters( 'gutenix_comment_author_avatar', get_avatar( $gutenix_comment, $size ), $args );
}

/**
 * Retrieve the html link to the url of the author of the current comment.
 *
 * @since  1.0.0
 * @param  array $args    Arguments.
 * @return string $output URL of the author of the comment.
 */
function gutenix_get_comment_author_link( $args = array() ) {
	$default_args = array(
		'prefix' => '',
	);

	$args = wp_parse_args( $args, $default_args );
	$args = apply_filters( 'gutenix_get_comment_author_link_args', $args );

	if ( ! empty( $args['prefix'] ) ) {
		$args['prefix'] = $args['prefix'] . ' ';
	}

	/**
	 * Filter a URL of the author of the current comment.
	 *
	 * @since 1.0.0
	 * @param array $output URL of the author of the comment.
	 * @param array $args   Arguments.
	 */
	return apply_filters( 'gutenix_get_comment_author_link', sprintf( '<span class="fn">%2$s<strong>%1$s</strong></span>', get_comment_author_link(), $args['prefix'] ), $args );
}

/**
 * Retrieve the html-formatted comment date of the current comment.
 *
 * @since  1.0.0
 * @param  array $args    Arguments.
 * @return string $output The comment date of the current comment.
 */
function gutenix_get_comment_date( $args = array() ) {
	$default_args = array(
		'prefix'     => '',
		'format'     => '',
		'human_time' => false,
	);

	$args = wp_parse_args( $args, $default_args );
	$args = apply_filters( 'gutenix_get_comment_date_args', $args );

	$format = get_option( 'date_format' );

	if ( ! empty( $args['format'] ) ) {
		$format = esc_attr( $args['format'] );
	}

	$date   = get_comment_date( $format );
	$prefix = '';
	$suffix = '';

	if ( isset( $args[ 'human_time' ] ) && $args[ 'human_time' ] ) {
		$date   = human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) );
		$suffix = esc_html__( ' ago', 'gutenix' );
	}

	if ( ! empty( $args['prefix'] ) ) {
		$prefix = $args['prefix'] . ' ';
	}

	/**
	 * Filter a html-formatted comment date of the current comment.
	 *
	 * @since 1.0.0
	 * @param string $output The comment date.
	 * @param array  $args   Arguments.
	 */
	return apply_filters( 'gutenix_get_comment_date',
		sprintf( '<span class="comment-date">%1$s<a href="%2$s" class="comment-date__link"><time datetime="%3$s" class="comment-date__time">%4$s%5$s</time></a></span>',
			$prefix,
			get_comment_link(),
			get_comment_time( 'c' ),
			$date,
			$suffix
		),
		$args
	);
}

/**
 * Retrieve the text of a comment.
 *
 * @since  1.0.0
 * @global int   $comment_depth
 * @param  array $args    Arguments.
 * @return string $output Comment's text.
 */
function gutenix_get_comment_text( $args = array() ) {
	global $comment_depth;

	ob_start();

	comment_text( get_comment_id(), array_merge( $args, array(
		'add_below' => 'div-comment',
		'depth'     => $comment_depth,
		'max_depth' => get_option( 'thread_comments_depth' ) ? get_option( 'thread_comments_depth' ) : -1,
	) ) );

	$comment_text = ob_get_contents();
	ob_end_clean();

	/**
	 * Filter the text of a comment.
	 *
	 * @since 1.0.0
	 * @param string $comment_text Comment's text.
	 * @param array  $args         Arguments.
	 */
	return apply_filters( 'gutenix_get_comment_text', $comment_text, $args );
}

/**
 * Returns a string that can be echoed to create a `reply` link for comments.
 *
 * @since  1.0.0
 * @global int   $comment_depth
 * @param  array $args     Arguments.
 * @return string $output  `Reply` link.
 */
function gutenix_get_comment_reply_link( $args = array() ) {
	global $comment_depth;

	$args = wp_parse_args( $args, array(
		'add_below' => 'div-comment',
		'depth'     => $comment_depth,
		'max_depth' => get_option( 'thread_comments_depth' ) ? get_option( 'thread_comments_depth' ) : - 1,
		'before'    => '',
		'after'     => '',
	) );

	$reply = get_comment_reply_link( $args );

	/**
	 * Filter a `reply` link for comments.
	 *
	 * @since 1.0.0
	 * @param string $reply `reply` link.
	 * @param array  $args  Arguments.
	 */
	return apply_filters( 'gutenix_get_comment_reply_link', $reply, $args );
}

/**
 * Retrieve a link to edit the current comment, if the user is logged in and allowed to edit the comment.
 *
 * @since  1.0.0
 * @param  array $args    Arguments.
 * @return string $output HTML-link to edit the current comment.
 */
function gutenix_get_comment_link_edit( $args = array() ) {
	global $gutenix_comment;

	$text = esc_html__( 'Edit', 'gutenix' );

	if ( ! empty( $args['text'] ) ) {
		$text = esc_attr( $args['text'] );
	}

	$url = get_edit_comment_link( $gutenix_comment->comment_ID );

	if ( null === $url ) {
		return;
	}

	$link = '<a class="comment-edit-link" href="' . esc_url( $url ) . '">' . $text . '</a>';

	/**
	 * Filter the comment edit link anchor tag.
	 *
	 * @since 1.0.0
	 * @param string $link       Anchor tag for the edit link.
	 * @param int    $comment_id Comment ID.
	 * @param array  $args       Arguments.
	 */
	return apply_filters( 'gutenix_get_comment_link_edit', $link, $gutenix_comment->comment_ID, $args );
}
