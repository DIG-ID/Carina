<?php
/**
 * Template Name: Home Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
			get_template_part( 'template-parts/pages/home/intro' );
			get_template_part( 'template-parts/pages/home/four-icons' );
			get_template_part( 'template-parts/pages/home/rooms' );
			get_template_part( 'template-parts/pages/home/food-banner' );
			get_template_part( 'template-parts/pages/home/relaxation' );
			get_template_part( 'template-parts/pages/home/slider-banner' );
			get_template_part( 'template-parts/pages/home/discover' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
