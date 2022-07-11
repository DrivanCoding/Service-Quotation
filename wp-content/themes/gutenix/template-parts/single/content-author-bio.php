<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gutenix
 */
?>

<?php do_action( 'gutenix_before_post_author_bio' ); ?>

<div class="post-author-bio">
	<div class="post-author-bio__header">
		<div class="post-author-bio__avatar"><?php
			echo get_avatar( get_the_author_meta( 'user_email' ), esc_attr( apply_filters( 'gutenix_author_bio_avatar_size', 80 ) ), '', esc_attr( get_the_author_meta( 'nickname' ) ) );
		?></div>
		<h4 class="post-author-bio__title"><?php
			the_author_posts_link();
		?></h4>
	</div>
	<div class="post-author-bio__content"><?php
		echo esc_html( get_the_author_meta( 'description' ) );
	?></div>
</div>

<?php do_action( 'gutenix_after_post_author_bio' ); ?>
