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
			get_template_part( 'template-parts/modules/section','intro' );
            get_template_part( 'template-parts/pages/stay/individual' );
            get_template_part( 'template-parts/modules/section','text-center' );
			get_template_part( 'template-parts/pages/stay/connection-space' );
			get_template_part( 'template-parts/pages/stay/outro' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
