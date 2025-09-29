<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>

	<?php
	$header_style = '';
	if ( 'dark' === get_field( 'hero_header_style' ) ) :
		$header_style = 'header-style-dark';
	else :
		$header_style = 'header-style-light';
	endif;
	?>
	<body <?php body_class( 'relative ' . esc_attr( $header_style ) ); ?>>
		<?php do_action( 'wp_body_open' ); ?>
		<?php get_template_part( 'template-parts/header', 'main' ); ?>