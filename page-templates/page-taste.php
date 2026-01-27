<?php
/**
 * Template Name: Taste Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section', 'hero' );
			get_template_part( 'template-parts/modules/section', 'intro' );
			get_template_part( 'template-parts/pages/taste/content' );
			get_template_part( 'template-parts/modules/section', 'slider-bleed-right' );
			get_template_part( 'template-parts/pages/taste/banner' );
			get_template_part( 'template-parts/pages/taste/cooking' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
