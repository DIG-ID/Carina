<?php
get_header();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/archives/apartment/hero' );
            get_template_part( 'template-parts/archives/apartment/intro' );
            get_template_part( 'template-parts/archives/apartment/content' );	
            get_template_part( 'template-parts/archives/apartment/center' );	
			get_template_part( 'template-parts/archives/apartment/outro' );	
		do_action( 'after_main_content' );
get_footer();
