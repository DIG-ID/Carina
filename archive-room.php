<?php
get_header();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/archives/room/hero' );
            get_template_part( 'template-parts/archives/room/intro' );
            get_template_part( 'template-parts/archives/room/content' );	
            get_template_part( 'template-parts/archives/room/center' );	
			get_template_part( 'template-parts/archives/room/outro' );	
		do_action( 'after_main_content' );
get_footer();
