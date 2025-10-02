<section class="section-contact-form pt-16 md:pt-24 xl:pt-20 pb-16 md:pb-24 xl:pb-32 bg-lightGrey">
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-6 xl:col-span-12">
			<h2 class="title-sm mb-7"><?php the_field( 'contact_form_title' ); ?></h2>
		</div>
		<div class="col-span-2 md:col-span-6 xl:col-span-12">
			<?php
			$form = get_field( 'contact_form_contact_form_shortcode' );
			if ( $form ) :
				echo do_shortcode( $form );
			endif;
			?>
		</div>
	</div>
</section>