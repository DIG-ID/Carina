<?php
get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
			get_template_part( 'template-parts/posts/zimmer/content' );
			get_template_part( 'template-parts/modules/section','slider-rooms' );
			get_template_part( 'template-parts/posts/zimmer/outro' );	
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
