<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php do_action( 'gutenix_before_comments_area' ); ?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h3 class="comments-title">
			<?php
			printf( // WPCS: XSS OK.
				esc_html( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'gutenix' ) ),
				number_format_i18n( get_comments_number() )
			);
			?>
		</h3><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<?php do_action( 'gutenix_before_comments_list' ); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( apply_filters( 'gutenix_wp_list_comments_args', array(
				'style'       => 'ol',
				'avatar_size' => 60,
				'short_ping'  => true,
				'callback'    => 'gutenix_rewrite_comment_item',
			) ) );
			?>
		</ol><!-- .comment-list -->

		<?php do_action( 'gutenix_after_comments_list' ); ?>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gutenix' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	do_action( 'gutenix_before_comment_form' );

	comment_form();

	do_action( 'gutenix_after_comment_form' );
	?>

</div><!-- #comments -->

<?php do_action( 'gutenix_after_comments_area' ); ?>
