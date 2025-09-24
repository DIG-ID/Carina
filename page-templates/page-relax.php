<?php
/**
 * Template Name: Relax Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
			get_template_part( 'template-parts/pages/relax/intro' );
			get_template_part( 'template-parts/pages/relax/highlights' );
			get_template_part( 'template-parts/pages/relax/rooms' );
			get_template_part( 'template-parts/pages/relax/outro' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
