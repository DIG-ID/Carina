<?php
get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/section','hero' );
			get_template_part( 'template-parts/posts/room/content' );	
			get_template_part( 'template-parts/posts/room/outro' );	
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
