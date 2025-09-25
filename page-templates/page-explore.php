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
			get_template_part( 'template-parts/modules/section','intro' );
			get_template_part( 'template-parts/pages/explore/seasons' );
			get_template_part( 'template-parts/pages/explore/content' );
			get_template_part( 'template-parts/pages/explore/places' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
