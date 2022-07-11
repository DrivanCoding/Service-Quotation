<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gutenix
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<?php wp_body_open(); ?>

<?php do_action( 'gutenix_body_start' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#masthead"><?php esc_html_e( 'Skip to main navigation', 'gutenix' ); ?></a>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gutenix' ); ?></a>
	<a class="skip-link screen-reader-text" href="#colophon"><?php esc_html_e( 'Skip to footer', 'gutenix' ); ?></a>

	<?php do_action( 'gutenix_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<?php do_action( 'gutenix_header' ); ?>
	</header><!-- #masthead -->

	<?php do_action( 'gutenix_after_header' ); ?>

	<?php do_action( 'gutenix_before_content' ); ?>

	<div id="content" class="site-content">

		<?php do_action( 'gutenix_breadcrumbs' ); ?>
