<?php
/**
 * Template Name: Explore Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
