<?php
get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
			get_template_part( 'template-parts/posts/apartment/content' );
			get_template_part( 'template-parts/modules/section','slider-rooms' );
			get_template_part( 'template-parts/posts/apartment/outro' );	
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
