<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Gutenix
 */

//	Custom 404 Template
$get_id 		= gutenix_theme()->customizer->get_value( 'page404_template' );
$get_content 	= gutenix_404page_template_content();
/*$post 		= get_post( $get_id );
$output 		= apply_filters( 'the_content', $post->post_content );*/
?>

<div class="site-content__container gutenix-container">
	<div class="gutenix-row">

		<?php do_action( 'gutenix_before_primary_area', '404' ); ?>

		<div id="primary" class="content-area gutenix-col-xs-12">

			<?php do_action( 'gutenix_before_site_main_area', '404' ); ?>

			<main id="main" class="site-main"><?php
				
				if ( ! empty( $get_id ) ) {
					
					if ( has_blocks( $get_content ) ) {
						echo do_blocks( $get_content );
					} else {
						echo do_shortcode( $get_content );
					}

				} else { 
					get_template_part( 'template-parts/content-404' );
				}

			?></main><!-- #main -->

			<?php do_action( 'gutenix_after_site_main_area', '404' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'gutenix_after_primary_area', '404' ); ?>

	</div>
</div>
