<?php
/**
 * Template Name: Stay Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
            get_template_part( 'template-parts/modules/relaxation' );
            get_template_part( 'template-parts/modules/text-center' );
			get_template_part( 'template-parts/pages/stay/connection-space' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
