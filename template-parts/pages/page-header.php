<div class="theme-container">
	<div class="theme-grid">
		<div class="col-span-2 md:col-span-6 xl:col-span-9 mt-56 mb-28">
			<?php
			$page_title = get_field( 'page_title' );
			if ( $page_title ) :
				echo '<h1 class="title-md">' . esc_html( $page_title ) . '</h1>';
			else :
				the_title( '<h1 class="title-md">', '</h1>' );
			endif;
			?>
		</div>
	</div>
</div>