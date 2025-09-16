<?php
get_header();
do_action( 'before_main_content' );
?>
<section class="page-header pt-28 lg:pt-64">
	<div class="theme-container flex flex-col w-full text-center">
		<h2 class="mb-12"><?php esc_html_e( 'Seite nicht gefunden.', 'carina' ); ?></h2>
		<h1 class="relative xl:-bottom-7"><?php esc_html_e( '404', 'carina' ); ?></h1>
	</div>
</section>
<section class="section-error-404 not-found pt-12 lg:pt-32 pb-12 lg:pb-48">
	<div class="theme-container text-center">
		<h3 class="mb-12"><?php esc_html_e( 'Die von Ihnen gesuchte Seite existiert nicht oder wurde verschoben.', 'carina' ); ?></h3>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"><?php esc_html_e( 'zurück zur Startseite', 'carina' ); ?></a>
	</div>
</section>
<?php
do_action( 'after_main_content' );
get_footer();
