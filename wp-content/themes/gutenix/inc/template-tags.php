<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Gutenix
 */

if ( ! function_exists( 'gutenix_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	function gutenix_post_thumbnail( $args = array() ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return false;
		}

		$default_args = array(
			'size'       => 'post-thumbnail',
			'link'       => false,
			'class'      => 'post-thumbnail',
			'link-class' => 'post-thumbnail__link',
			'echo'       => true,
			'visible'    => true,
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_post_thumbnail_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		if ( ! $visible ) {
			return false;
		}

		$thumb_format = '<figure class="%2$s">%1$s</figure><!-- .post-thumbnail -->';

		if ( $args['link'] ) {
			$thumb_format = '<figure class="%2$s"><a class="%3$s" href="%4$s" aria-hidden="true" tabindex="-1">%1$s</a></figure><!-- .post-thumbnail -->';
		}

		$thumb_format = apply_filters( 'gutenix_post_thumbnail_format', $thumb_format, $args );

		$thumb_output = apply_filters( 'gutenix_post_thumbnail_output', sprintf(
			$thumb_format,
			get_the_post_thumbnail( null, esc_attr( $args['size'] ) ),
			esc_attr( $args['class'] ),
			esc_attr( $args['link-class'] ),
			esc_url( get_the_permalink() )
		) );

		return Gutenix_Utils::output_method( $thumb_output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_post_excerpt' ) ) :
	/**
	 * Prints HTML with excerpt.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	function gutenix_post_excerpt( $args = array() ) {
		$default_args = array(
			'before'  => '<div class="entry-content clearfix"><p>',
			'after'   => '</p></div><!-- .entry-content -->',
			'echo'    => true,
			'visible' => true,
			'length'  => gutenix_theme()->customizer->get_value( 'blog_post_excerpt_words_count' ),
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_post_excerpt_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		if ( ! $visible ) {
			return false;
		}

		$words_count 		= ! empty( $args['length'] ) ? (int) $args['length'] : 20;
		$more 				= apply_filters( 'gutenix_post_excerpt_more_text', '&hellip;' );
		$blog_post_content 	= gutenix_theme()->customizer->get_value( 'blog_post_content', 'excerpt' );

		if ( 'full-content' != $blog_post_content ) {
			$excerpt = wp_trim_words( get_the_excerpt(), $words_count, $more );
		} else if ( is_search() ) {
			$excerpt = wp_trim_words( get_the_excerpt(), 20 );
		} else if ( is_singular( 'post' ) ) {
			$excerpt = wp_trim_words( get_the_excerpt(), $words_count );
		} else {
			$excerpt = the_content( '' );
			$excerpt = strip_shortcodes( $excerpt );
			$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
			$excerpt = wp_trim_words( $excerpt, $words_count, $more );
		}

		if ( ! $excerpt ) {
			return false;
		}

		$excerpt_output = apply_filters(
			'gutenix_post_excerpt_output',
			$args['before'] . $excerpt . $args['after']
		);

		return Gutenix_Utils::output_method( $excerpt_output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	function gutenix_posted_on( $args = array() ) {
		if ( 'post' !== get_post_type() ) {
			return false;
		}

		$single_post_meta 	= get_theme_mod( 'single_post_meta', array( 'categories', 'author', 'date', 'comments' ) );
		$blog_post_meta 	= get_theme_mod( 'blog_post_meta', array( 'categories', 'author', 'date', 'comments', 'tags' ) );
		$date 				= ! is_singular( 'post' ) ? $blog_post_meta : $single_post_meta;

		$visible = ( in_array( 'date', $date) ) ? true : false;

		$default_args = array(
			'prefix'  => esc_html_x( 'Posted', 'post date prefix', 'gutenix' ),
			'format'  => '',
			'before'  => '<span class="posted-on">',
			'after'   => '</span>',
			'echo'    => true,
			'visible' => $visible
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_posted_on_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		if ( ! $visible ) {
			return false;
		}

		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$format = esc_attr( $args['format'] );

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( $format ) )
		);

		$time = get_the_time( 'Y-m-d\TH:i:sP' );

		preg_match_all( '/(\d+)/mi', $time, $date_array );
		$link = get_day_link( (int) $date_array[0][0], (int) $date_array[0][1], (int) $date_array[0][2] );

		$posted_on = sprintf(
			'<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( $link ),
			$time_string
		);

		if ( ! empty( $args['prefix'] ) ) {
			$args['prefix'] = $args['prefix'] . ' ';
		}

		$posted_on_output = apply_filters(
			'gutenix_posted_on_output',
			$args['before'] . $args['prefix'] . $posted_on . $args['after']
		);

		return Gutenix_Utils::output_method( $posted_on_output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	function gutenix_posted_by( $args = array() ) {
		if ( 'post' !== get_post_type() ) {
			return false;
		}

		$single_post_meta 	= get_theme_mod( 'single_post_meta', array( 'categories', 'author', 'date', 'comments' ) );
		$blog_post_meta 	= get_theme_mod( 'blog_post_meta', array( 'categories', 'author', 'date', 'comments', 'tags' ) );
		$author 			= ! is_singular( 'post' ) ? $blog_post_meta : $single_post_meta;

		$visible = ( in_array( 'author', $author) ) ? true : false;

		$default_args = array(
			'prefix'      => esc_html_x( 'by', 'post author prefix', 'gutenix' ),
			'before'      => '<span class="byline">',
			'after'       => '</span>',
			'avatar'      => false,
			'avatar_size' => 60,
			'echo'        => true,
			'visible'     => $visible
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_posted_by_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		if ( ! $visible ) {
			return false;
		}

		$avatar = '';

		if ( $args['avatar'] ) {
			$avatar = get_avatar( get_the_author_meta( 'user_email' ), esc_attr( $args['avatar_size'] ), '', esc_attr( get_the_author_meta( 'nickname' ) ) );
		}

		if ( ! empty( $args['prefix'] ) ) {
			$args['prefix'] = $args['prefix'] . ' ';
		}

		$byline_format = apply_filters(
			'gutenix_posted_byline_format',
			'<span class="author vcard">%3$s<a class="url fn n" href="%1$s">%2$s</a></span>'
		);

		$byline = sprintf(
			$byline_format,
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() ),
			$args['prefix']
		);

		$posted_by_output = apply_filters(
			'gutenix_posted_by_output',
			$args['before'] . $avatar . $byline . $args['after']
		);

		return Gutenix_Utils::output_method( $posted_by_output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_post_cats' ) ) :
	/**
	 * Prints HTML with meta information for the current categories.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	function gutenix_post_cats( $args = array() ) {
		if ( 'post' !== get_post_type() ) {
			return false;
		}

		$single_post_meta 	= get_theme_mod( 'single_post_meta', array( 'categories', 'author', 'date', 'comments' ) );
		$blog_post_meta 	= get_theme_mod( 'blog_post_meta', array( 'categories', 'author', 'date', 'comments', 'tags' ) );
		$categories 		= ! is_singular( 'post' ) ? $blog_post_meta : $single_post_meta;

		$visible = ( in_array( 'categories', $categories) ) ? true : false;

		$default_args = array(
			'prefix'    => '',
			'delimiter' => ', ',
			'before'    => '<span class="cat-links">',
			'after'     => '</span>',
			'echo'      => true,
			'visible'   => $visible
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_post_cats_args', $args );

		if ( empty( $args['delimiter'] ) ) {
			$args['delimiter'] = ' ';
		}

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		if ( ! $visible ) {
			return false;
		}

		$cats_list = get_the_category_list( esc_html( $args['delimiter'] ) );

		if ( ! $cats_list ) {
			return false;
		}

		if ( ! empty( $args['prefix'] ) ) {
			$args['prefix'] = $args['prefix'] . ' ';
		}

		$output = apply_filters(
			'gutenix_post_cats_output',
			$args['before'] . $args['prefix'] . $cats_list . $args['after']
		);

		return Gutenix_Utils::output_method( $output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_post_tags' ) ) :
	/**
	 * Prints HTML with meta information for the current tags.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	function gutenix_post_tags( $args = array() ) {
		if ( 'post' !== get_post_type() ) {
			return false;
		}

		$single_post_meta 	= apply_filters( 'gutenix_single_post_order', array( 'title', 'meta', 'thumbmnail', 'content', 'tags', 'share', 'author_bio', 'post_navigation', 'related_posts', 'comments' ) );
		$blog_post_meta 	= get_theme_mod( 'blog_post_meta', array( 'categories', 'author', 'date', 'comments', 'tags' ) );
		$tags 				= ! is_singular( 'post' ) ? $blog_post_meta : $single_post_meta;

		$visible = ( in_array( 'tags', $tags) ) ? true : false;

		$default_args = array(
			'prefix'    => esc_html_x( 'Tags:', 'post tags prefix', 'gutenix' ),
			'delimiter' => ', ',
			'before'    => '<div class="tags-links">',
			'after'     => '</div>',
			'echo'      => true,
			'visible'   => $visible
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_post_tags_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		if ( ! $visible ) {
			return false;
		}

		$tags_list = get_the_tag_list( '', esc_html( $args['delimiter'] ) );

		if ( ! $tags_list ) {
			return false;
		}

		if ( ! empty( $args['prefix'] ) ) {
			$args['prefix'] = $args['prefix'] . ' ';
		}

		$output = apply_filters(
			'gutenix_post_tags_output',
			$args['before'] . $args['prefix'] . $tags_list . $args['after']
		);

		return Gutenix_Utils::output_method( $output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_post_comments' ) ) :
	/**
	 * Prints HTML with meta information for the current comments.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	/**
	 * @param array $args
	 *
	 * @return bool|string
	 */
	function gutenix_post_comments( $args = array() ) {
		if ( 'post' !== get_post_type() ) {
			return false;
		}

		$single_post_meta 	= get_theme_mod( 'single_post_meta', array( 'categories', 'author', 'date', 'comments' ) );
		$blog_post_meta 	= get_theme_mod( 'blog_post_meta', array( 'categories', 'author', 'date', 'comments', 'tags' ) );
		$comments 			= ! is_singular( 'post' ) ? $blog_post_meta : $single_post_meta;

		$visible = ( in_array( 'comments', $comments) ) ? true : false;

		$default_args = array(
			'prefix'  => '',
			'suffix'  => esc_html__( 'Comment(s)', 'gutenix' ),
			'before'  => '<span class="comments-link">',
			'after'   => '</span>',
			'echo'    => true,
			'visible' => $visible
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_post_comments_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		$post_comments_visible = $visible && ! post_password_required() && ( comments_open() || get_comments_number() );
		$post_comments_visible = apply_filters( 'gutenix_post_comments_visible', $post_comments_visible, $args );

		if ( ! $post_comments_visible ) {
			return false;
		}

		global $post;

		$suffix = $args['suffix'];
		$count  = $post->comment_count . ' ' . $suffix;

		$count_link = sprintf( '<a href="%2$s">%1$s</a>',
			$count,
			esc_url( get_comments_link() )
		);

		if ( ! empty( $args['prefix'] ) ) {
			$args['prefix'] = $args['prefix'] . ' ';
		}

		$comments_output = apply_filters(
			'gutenix_post_comments_output',
			$args['before'] . $args['prefix'] . $count_link . $args['after']
		);

		return Gutenix_Utils::output_method( $comments_output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_get_button_markup' ) ) :
	/**
	 * Get button markup.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string
	 */
	function gutenix_get_button_markup( $args = array() ){
		$default_args = array(
			'text'        => '',
			'icon'        => '',
			'url'         => '',
			'is_external' => false,
			'class'       => 'btn',
			'before'      => '',
			'after'       => '',
			'echo'        => false,
			'visible'     => true,
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_button_markup_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		if ( ! $visible || ! $args['url'] ) {
			return false;
		}

		$target = $args['is_external'] ? ' target="_blank"' : '';

		$format = apply_filters( 'gutenix_button_format', '<a class="%3$s" href="%4$s"%5$s><span class="btn__text">%1$s</span>%2$s</a>' );
		$button = sprintf( $format, $args['text'], $args['icon'], esc_attr( $args['class'] ), esc_url( $args['url'] ), $target );

		$output = apply_filters(
			'gutenix_button_output',
			$args['before'] . $button . $args['after']
		);

		return Gutenix_Utils::output_method( $output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_post_button' ) ) :
	/**
	 * Prints HTML with post button.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	function gutenix_post_button( $args = array() ) {
		$default_args = array(
			'icon'    => '',
			'text'    => gutenix_theme()->customizer->get_value( 'blog_read_more_text' ),
			'url'     => get_permalink(),
			'class'   => 'post-button btn btn-default',
			'before'  => '<div class="post-button-wrap">',
			'after'   => '</div>',
			'echo'    => true,
			'visible' => gutenix_theme()->customizer->get_value( 'blog_read_more' ),
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_post_button_args', $args );

		return gutenix_get_button_markup( $args );
	}
endif;

if ( ! function_exists( 'gutenix_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and etc.
	 *
	 * @since  1.0.0
	 * @param  array $args         Arguments.
	 * @param  array $post_modules Modules list: 'post_cats' => array(), 'post_tags' => array(), 'posted_on' => array(), 'posted_by' => array(), 'post_comments' => array(), ...
	 * @return string|bool
	 */
	function gutenix_entry_meta( $args = array(), $post_modules = array() ) {
		if ( empty( $post_modules ) ) {
			return false;
		}

		$default_args = array(
			'before'  => '<div class="entry-meta">',
			'after'   => '</div><!-- .entry-meta -->',
			'divider' => '',
			'echo'    => true,
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_entry_meta_args', $args );

		$output_array = array();

		foreach ( (array) $post_modules as $cb => $cb_args ) {
			$html = '';

			if ( is_callable( $cb ) ) {
				$cb_args = (array) $cb_args;
				$cb_args = wp_parse_args( array( 'echo' => false ), $cb_args );

				$html = call_user_func( $cb, $cb_args );
			}

			if ( ! empty( $html ) ) {
				$output_array[] = $html;
			}
		}

		if ( empty( $output_array ) ) {
			return false;
		}

		$output = join( $args['divider'], $output_array );

		$output = apply_filters( 'gutenix_entry_meta_output',
			$args['before'] . $output . $args['after']
		);

		return Gutenix_Utils::output_method( $output, $args['echo'] );
	}
endif;

if ( ! function_exists( 'gutenix_sticky_label' ) ) :
	/**
	 * Get sticky label HTML grabbed from options.
	 *
	 * @since  1.0.0
	 * @return string|bool
	 */
	function gutenix_get_sticky_label() {
		if ( ! is_sticky() || ! is_home() || is_paged() ) {
			return false;
		}

		$sticky_type = gutenix_theme()->customizer->get_value( 'blog_sticky_type' );

		$icon = apply_filters(
			'gutenix_sticky_label_icon',
			gutenix_get_icon_svg( 'sticky' )
		);

		$label_text   = gutenix_theme()->customizer->get_value( 'blog_sticky_label' );
		$label_format = apply_filters( 'gutenix_sticky_label_text_format', '<span class="sticky-label__text">%s</span>' );
		$label        = sprintf( $label_format, $label_text );

		$content = '';

		switch ( $sticky_type ) {

			case 'icon':
				$content = $icon;
				break;

			case 'label':
				$content = $label;
				break;

			case 'both':
				$content = $icon . $label;
				break;
		}

		if ( empty( $content ) ) {
			return false;
		}

		$format = apply_filters( 'gutenix_sticky_label_format', '<span class="sticky-label sticky-label-type--%2$s">%1$s</span>' );

		return sprintf( $format, $content, $sticky_type );
	}
endif;

if ( ! function_exists( 'gutenix_post_author_bio' ) ) :
	/**
	 * Display box with information about author.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_post_author_bio() {

		if ( ! is_singular( 'post' ) ) {
			return;
		}

		if ( is_customize_preview() && ! Gutenix_Utils::is_render_partials() ) {
			echo '<div class="post-author-bio-customize-partial">';
		}

		$single_post_meta = apply_filters( 'gutenix_single_post_order', array( 'title', 'meta', 'thumbmnail', 'content', 'tags', 'share', 'author_bio', 'post_navigation', 'related_posts', 'comments' ) );
		$is_enabled = in_array( 'author_bio', $single_post_meta);

		if ( $is_enabled && get_the_author_meta( 'description' ) ) {
			get_template_part( 'template-parts/single/content-author-bio' );
		} elseif ( is_customize_preview() ) {
			echo '<div class="customize-partial-placeholder">' . esc_html__( 'Author Bio Block Placeholder', 'gutenix' ) . '</div>';
		}

		if ( is_customize_preview() && ! Gutenix_Utils::is_render_partials() ) {
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'gutenix_post_edit_link' ) ) :
	/**
	 * Prints HTML with edit post link.
	 *
	 * @since  1.0.0
	 * @param  array $args Arguments.
	 * @return string|bool
	 */
	function gutenix_post_edit_link( $args = array() ) {
		$default_args = array(
			'class' => 'btn btn-default',
			'echo'  => true,
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'gutenix_post_edit_link_args', $args );

		$classes = array( 'post-edit-link' );

		if ( ! empty( $args['class'] ) ) {
			$classes[] = $args['class'];
		}

		ob_start();

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'gutenix' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>',
			null,
			esc_attr( join( ' ', $classes ) )
		);

		$output = apply_filters(
			'gutenix_post_edit_link_output',
			ob_get_clean()
		);

		return Gutenix_Utils::output_method( $output, $args['echo'] );
	}
endif;

/**
 * Get post template part slug.
 *
 * @since  1.0.0
 * @return string
 */
function gutenix_get_post_template_part_slug() {
	return apply_filters( 'gutenix_post_template_part_slug', 'template-parts/content' );
}

if ( ! function_exists( 'gutenix_site_branding' ) ) :
/**
 * Display the site logo and site description at the header.
 *
 * @since  1.0.0
 * @return void
 */
function gutenix_site_branding() {
	
	$tagline_position 	= gutenix_theme()->customizer->get_value( 'tagline_position' );
	$class 				= ! empty( $tagline_position ) ? 'position-' . $tagline_position : '';

	echo '<div class="site-branding ' . esc_attr( $class ) . '">';
		
		gutenix_header_logo();
		gutenix_site_description();

	echo '</div>';

}
endif;

if ( ! function_exists( 'gutenix_header_logo' ) ) :
	/**
	 * Display the header logo.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_header_logo() {

		$class_logo = '';

		if ( has_custom_logo() ) {
			$logo = get_custom_logo();
			$type = 'image';

			$hidden = '';
		} else {
			$hidden = ( display_header_text() == false ) ? ' hidden="hidden"' : '';

			$logo = sprintf( '<a class="site-logo__link" href="%1$s" rel="home">%2$s</a>', esc_url( home_url( '/' ) ), esc_attr( get_bloginfo( 'name', 'display' ) ) );
			$type = 'text';
		}

		if ( is_front_page() && is_home() ) {
			$tag = 'h1';
		} else {
			$tag = 'div';
		}

		$class_logo 				.= $type . ' ';
		$sticky_logo_id 			= gutenix_theme()->customizer->get_value( 'sticky_header_logo' );
		$transparent_logo_enabled 	= gutenix_theme()->customizer->get_value( 'different_logo_transparent_header' );
		$transparent_logo_id 		= gutenix_theme()->customizer->get_value( 'transparent_header_logo' );
		
		if( isset( $sticky_logo_id ) && ! empty( $sticky_logo_id ) ) {
			$class_logo .= 'has_sticky_logo ';
		}

		if( $transparent_logo_enabled != false && isset( $transparent_logo_id ) && ! empty( $transparent_logo_id ) ) {
			$class_logo .= 'has_transparent_logo ';
		}

		// if svg
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$attach_data = array();
		$attach_data = wp_get_attachment_image_src( $custom_logo_id, 'full' );

		if( ! empty( $attach_data ) ) {
			if ( isset( $attach_data[0] ) ) {
				$attr['src'] = $attach_data[0];
			}

			$file_type      = wp_check_filetype( $attr['src'] );
			$file_extension = $file_type['ext'];

			if ( 'svg' == $file_extension ) {
				$class_logo .= ' gutenix-logo-svg ';
			}
		}
		

		$logo .= apply_filters( 'gutenix_header_logo_format', false );

		$logo .= apply_filters( 'gutenix_sticky_header_logo_format', false );

		printf( '<%1$s class="site-logo site-logo--%3$s"%4$s>%2$s</%1$s>', esc_attr( $tag ), wp_kses_post( wp_unslash( $logo ) ), esc_attr( $class_logo ), esc_attr( $hidden ) );

	}
endif;

if ( ! function_exists( 'gutenix_site_description' ) ) :
	/**
	 * Display the site description.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_site_description() {
		$show_desc 			= gutenix_theme()->customizer->get_value( 'show_tagline' );
		$description 		= get_bloginfo( 'description', 'display' );

		$visible = $show_desc && $description;

		if ( ! $visible && ! is_customize_preview() ) {
			return;
		}

		$hidden = ! $visible ? ' hidden="hidden"' : '';

		printf( '<div class="site-description"%2$s><span class="site-description__text">%1$s</span></div>', esc_html( $description ), esc_attr( $hidden ) );
	}
endif;


if ( ! function_exists( 'gutenix_get_page_preloader' ) ) :
/**
 * Display the page preloader.
 *
 * @since  1.0.0
 * @return void
 */
function gutenix_get_page_preloader() {
	
	$page_preloader 		= gutenix_theme()->customizer->get_value( 'page_preloader_type' );
	$page_preloader_html 	= gutenix_theme()->customizer->get_value( 'page_preloader_html' );
	$page_preloader_str 	= str_replace('\"', '', $page_preloader_html);

	if ( '' != $page_preloader ) {

		echo '<div class="page-preloader-cover">';
				
			if( 'custom' != $page_preloader ) {
				echo gutenix_header_logo();
				echo '<div class="bar"></div>';
			} else {
				echo wp_specialchars_decode( $page_preloader_str );
			}

		echo '</div>';
	}
}
add_action( 'gutenix_body_start', 'gutenix_get_page_preloader' );

endif;


if ( ! function_exists( 'gutenix_header_buttons' ) ) :
	/**
	 * Show header buttons.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_header_buttons(){
		$btn_1 = gutenix_get_button_markup( array(
			'visible'     => gutenix_theme()->customizer->get_value( 'show_header_btn_1' ),
			'text'        => gutenix_theme()->customizer->get_value( 'header_btn_text_1' ),
			'url'         => gutenix_theme()->customizer->get_value( 'header_btn_url_1' ),
			'is_external' => gutenix_theme()->customizer->get_value( 'header_btn_external_1' ),
			'class'       => 'btn header-btn header-btn-1',
			'echo'        => false,
		) );

		$btn_2 = gutenix_get_button_markup( array(
			'visible'     => gutenix_theme()->customizer->get_value( 'show_header_btn_2' ),
			'text'        => gutenix_theme()->customizer->get_value( 'header_btn_text_2' ),
			'url'         => gutenix_theme()->customizer->get_value( 'header_btn_url_2' ),
			'is_external' => gutenix_theme()->customizer->get_value( 'header_btn_external_2' ),
			'class'       => 'btn header-btn header-btn-2',
			'echo'        => false,
		) );

		$visible = $btn_1 || $btn_2;

		if ( ! $visible ) {
			return;
		}

		$hidden = ! $visible ? ' hidden="hidden"' : '';

		printf( '<div class="header-buttons"%3$s>%1$s%2$s</div>', wp_kses_post( wp_unslash( $btn_1 ) ), wp_kses_post( wp_unslash( $btn_2 ) ), esc_attr( $hidden ) );
	}
endif;


if ( ! function_exists( 'gutenix_header_search_toggle' ) ) :
	/**
	 * Show header search toggle.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_header_search_toggle() {
		$visible = gutenix_theme()->customizer->get_value( 'header_search_visible' );

		if ( ! $visible ) {
			return;
		}
		
		echo '<button class="header-search-toggle btn-initial">' . gutenix_get_icon_svg( 'search' ) . '</button>';

	}
endif;

if ( ! function_exists( 'gutenix_header_logged_in' ) ) :
	/**
	 * Show header search toggle.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_header_logged_in() {
		$header_login_visible 	= gutenix_theme()->customizer->get_value( 'header_login_visible' );
		$visible 				= class_exists( 'Gutenix_Pro' ) ? $header_login_visible : false;
		$text1 					= gutenix_theme()->customizer->get_value( 'header_login_text1' );
		$text2 					= gutenix_theme()->customizer->get_value( 'header_login_text2' );

		if ( ! $visible ) {
			return;
		}
		
		if( !is_user_logged_in() ) :
			$url = 'javascript:void(0);';
			$text = $text1;
			
		else :
			$url = esc_url( wp_logout_url( get_permalink() ) );
			$text = $text2;
		
		endif;

		printf( '<a class="gutenix-header-login-toggle" href="%2$s">%1$s</a>', esc_html( $text ), wp_kses_post( wp_unslash( $url ) ) );

	}
endif;

if ( ! function_exists( 'gutenix_header_login_popup' ) ) :
	/**
	 * Show header login popup.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_header_login_popup() {
		$visible 	= gutenix_theme()->customizer->get_value( 'header_login_visible' );

		if ( ! $visible ) {
			return;
		}

		get_template_part( 'template-parts/header/login-popup' );
	}
endif;
add_action( 'gutenix_after_header_bar', 'gutenix_header_login_popup' );

if ( ! function_exists( 'gutenix_header_search_popup' ) ) :
	/**
	 * Show header search popup.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_header_search_popup() {
		$visible = gutenix_theme()->customizer->get_value( 'header_search_visible' );

		if ( ! $visible ) {
			return;
		}

		get_template_part( 'template-parts/header/search-popup' );
	}
endif;

if ( ! function_exists( 'gutenix_top_message' ) ) :
	/**
	 * Show top panel message.
	 *
	 * @since  1.0.0
	 * @param  string $format Output formatting.
	 * @return void
	 */
	function gutenix_top_message() {
		$message = gutenix_theme()->customizer->get_value( 'top_panel_text' );

		if ( ! $message ) {
			return;
		}

		printf( '<div class="top-panel__message">%s</div>', wp_kses_post( wp_unslash( $message ) ) );
	}
endif;


if ( ! function_exists( 'gutenix_footer_logo' ) ) :
	/**
	 * Show footer logo, uploaded from customizer.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_footer_logo(){
		$visible = gutenix_theme()->customizer->get_value( 'footer_logo_visible' );

		if ( ! $visible ) {
			return;
		}

		$logo_src = gutenix_theme()->customizer->get_value( 'footer_logo' );

		if ( ! $logo_src ) {
			return;
		}

		$url      = home_url( '/' );
		$alt      = get_bloginfo( 'name' );

		if ( ! $logo_src ) {
			return;
		}

		$logo_format = apply_filters(
			'gutenix_footer_logo_format',
			'<div class="footer-logo"><a href="%2$s" class="footer-logo__link"><img src="%1$s" class="footer-logo__img" alt="%3$s"%4$s></a></div>'
		);

		printf( '<div class="footer-logo"><a href="%2$s" class="footer-logo__link"><img src="%1$s" class="footer-logo__img" alt="%3$s"></a></div>', esc_url( $logo_src ), esc_url( $url ), esc_attr( $alt ) );
	}
endif;

if ( ! function_exists( 'gutenix_footer_copyright' ) ) :
	/**
	 * Show footer copyright text.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_footer_copyright() {
		$copyright = gutenix_theme()->customizer->get_value( 'footer_copyright' );

		if ( empty( $copyright ) ) {
			return;
		}

		printf( '<div class="footer-copyright">%s</div>', wp_kses_post( Gutenix_Utils::render_macros( wp_unslash( $copyright ) ) ) );
	}
endif;

if ( ! function_exists( 'gutenix_share_buttons' ) ) :
/**
 * Print HTML with a share buttons.
 *
 * @since  1.0.0
 * @return array
 */
function gutenix_share_buttons( $config = array() ) {

	$args = array();

	// Single Blog Post Share Networks
	if ( class_exists( 'Gutenix_Pro' ) && is_singular( 'post' ) ) {
		$args = gutenix_theme()->customizer->get_value( 'single_post_share_networks' );
	}

	// Single Product Share Networks
	if ( class_exists( 'Gutenix_Pro' ) && class_exists( 'woocommerce' ) && is_singular( 'product' ) ) {
		$args = gutenix_theme()->customizer->get_value( 'woo_product_share_networks' );
	}
	
	/**
	 * Default social networks.
	 *
	 * @since 1.0.0
	 *
	 * $1%s - `id`
	 * $2%s - `type`
	 * $3%s - `url`
	 * $4%s - `title`
	 * $5%s - `summary`
	 * $6%s - `thumbnail`
	 */
	$defaults = apply_filters( 'gutenix_default_args_share_buttons', array(
		'facebook' => array(
			'icon'      => gutenix_get_icon_svg( 'facebook' ),
			'name'      => esc_html__( 'Facebook', 'gutenix' ),
			'share_url' => 'https://www.facebook.com/sharer/sharer.php?u=%3$s&t=%4$s',
		),
		'twitter' => array(
			'icon'      => gutenix_get_icon_svg( 'twitter' ),
			'name'      => esc_html__( 'Twitter', 'gutenix' ),
			'share_url' => 'https://twitter.com/intent/tweet?url=%3$s&text=%4$s',
		),
		'linkedin' => array(
			'icon'      => gutenix_get_icon_svg( 'linkedin' ),
			'name'      => esc_html__( 'LinkedIn', 'gutenix' ),
			'share_url' => 'http://www.linkedin.com/shareArticle?mini=true&url=%3$s&title=%4$s&summary=%5$s&source=%3$s',
		),
		'pinterest' => array(
			'icon'      => gutenix_get_icon_svg( 'pinterest' ),
			'name'      => esc_html__( 'Pinterest', 'gutenix' ),
			'share_url' => 'https://www.pinterest.com/pin/create/button/?url=%3$s&description=%4$s&media=%6$s',
		),
		'tumblr' => array(
			'icon'      => gutenix_get_icon_svg( 'tumblr' ),
			'name'      => esc_html__( 'Tumblr', 'gutenix' ),
			'share_url' => 'http://www.tumblr.com/share/link?url=%3$s&name=%4$s&description=%5$s',
		),
		'vk' => array(
			'icon'      => gutenix_get_icon_svg( 'vk' ),
			'name'      => esc_html__( 'VKontakte', 'gutenix' ),
			'share_url' => 'https://vkontakte.ru/share.php?url=%3$s&title=%4$s&description=%5$s',
		),
		'whatsapp' => array(
			'icon'      => gutenix_get_icon_svg( 'whatsapp' ),
			'name'      => esc_html__( 'WhatsApp', 'gutenix' ),
			'share_url' => 'https://api.whatsapp.com/send?text=%4$s - %3$s',
		),
		'email' => array(
			'icon'      => gutenix_get_icon_svg( 'email' ),
			'name' 		=> esc_html__( 'Email', 'gutenix' ),
			'share_url' => 'mailto:?subject=%4$s&body=' . esc_attr( sprintf( esc_html__( 'Check out what I just spotted: %s', 'gutenix' ), '%3$s' ) ),
		),
		'print' => array(
			'icon'      => gutenix_get_icon_svg( 'print' ),
			'name' 		=> esc_html__( 'Print', 'gutenix' ),
			'share_url' => 'javascript:window.print();',
		)
	) );

	$default_config = apply_filters( 'gutenix_default_config_share_buttons', array(
		'http'         => is_ssl() ? 'https' : 'http',
		'custom_class' => '',
	) );

	$config = wp_parse_args( $config, $default_config );

	// Prepare a data for sharing.
	$id           = get_the_ID();
	$type         = get_post_type( $id );
	$url          = get_permalink( $id );
	$title        = get_the_title( $id );
	$summary      = get_the_excerpt();
	$thumbnail_id = get_post_thumbnail_id( $id );
	$thumbnail    = '';

	if ( ! empty( $thumbnail_id ) ) {
		$thumbnail = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		$thumbnail = $thumbnail[0];
	}

	$share_item_html = apply_filters( 'gutenix_share_button_html',
		'<div class="share-btns__item %2$s-item"><a class="share-btns__link" href="%1$s" target="_blank" rel="nofollow" title="%3$s">%4$s</a></div>'
	);
	$share_buttons = '';

	foreach ( (array) $defaults as $id => $network ) :

		if( in_array( $id, $args ) ){

			$share_url = sprintf( $network['share_url'],
				urlencode( $id ),
				urlencode( $type ),
				urlencode( $url ),
				urlencode( $title ),
				urlencode( $summary ),
				urlencode( $thumbnail )
			);

			$share_buttons .= sprintf(
				$share_item_html,
				htmlentities( $share_url ),
				sanitize_html_class( $id ),
				esc_html__( 'Share on ', 'gutenix' ) . $network['name'],
				$network['icon'],
				esc_attr( $network['name'] )
			);

		}

	endforeach;

	$share_before_html = apply_filters( 'gutenix_share_toggle_html', null );

	printf(
		'<div class="share-btns__list %1$s">%2$s%3$s</div>',
		esc_attr( $config['custom_class'] ),
		$share_before_html,
		$share_buttons
	);
		
}
endif;

if ( ! function_exists( 'gutenix_print_404_page_thumbnail' ) ) :
	/**
	 * Print thumbnail for 404 page.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_print_404_page_thumbnail(){
		$path_404_svg = apply_filters( 'gutenix_404_svg_path', get_theme_file_path( 'assets/images/404.svg' ) );

		if ( ! apply_filters( 'gutenix_show_404_svg_image', true ) || ! file_exists( $path_404_svg ) ) {
			return;
		}

		ob_start();

		include $path_404_svg;

		$svg_404 = ob_get_clean();

		printf( '<figure class="page-thumbnail">%s</figure>', $svg_404 );
	}
endif;
add_action( 'gutenix_error_404_start', 'gutenix_print_404_page_thumbnail' );

if ( ! function_exists( 'gutenix_blog_page_title' ) ) :
	/**
	 * Show blog page title text.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_blog_page_title() {
		
		$title 		= '';
		$subtitle 	= '';

		$blog_page_visible 			= gutenix_theme()->customizer->get_value( 'blog_page_title' );
		$archive_page_visible 		= gutenix_theme()->customizer->get_value( 'archive_page_title' );
		$search_page_visible 		= gutenix_theme()->customizer->get_value( 'search_page_title' );

		
		if ( $blog_page_visible && is_home() && ! is_front_page() ) :
			
			$title = get_the_title( get_option('page_for_posts', true) );
			
		elseif ( $archive_page_visible && is_archive() ) :
			
			$title 		= get_the_archive_title();
			$subtitle 	= get_the_archive_description( '<div class="archive-description">', '</div>' );
			
		elseif ( $search_page_visible && is_search() ) :
			
			$title = esc_html__( 'Search Results for ', 'gutenix' ) . '<span class="primary_color">“' . get_search_query() . '”</span>';
					
		endif;

		if( empty( $title ) ) {
			return;
		}

		$format = apply_filters(
			'gutenix-theme/blog/page-title-format',
			'<header class="page-header"><h1 class="page-title h2-style">%1$s</h1>%2$s</header>'
		);

		printf( $format, $title, $subtitle );
	}
endif;