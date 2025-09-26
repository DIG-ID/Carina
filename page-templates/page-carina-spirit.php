<?php
/**
 * Template Name: Carina Spirit Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
			get_template_part( 'template-parts/modules/section','intro' );
			get_template_part( 'template-parts/pages/carina-spirit/content' );
			get_template_part( 'template-parts/pages/carina-spirit/history' );
			get_template_part( 'template-parts/pages/carina-spirit/spirit' );
			get_template_part( 'template-parts/pages/carina-spirit/banner' );
			get_template_part( 'template-parts/pages/carina-spirit/testimonials' );
	endwhile;
endif;
get_footer();
