<?php
get_header();
do_action( 'before_main_content' );
?>
<section id="404" class="xl:pt-[162px] xl:pb-[52px]">
  <div class="theme-container bg-darkBlue">
	<div class="theme-grid pb-16">
	  <div class="container-wrapper col-start-1 col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-10 text-center  items-center flex flex-col justify-center">
		<div class="text-center pt-[87px] pb-24">
			<p class="title-404"><?php echo __( '404', 'carina' ); ?></p>
		</div>
		<div class="pb-7">	
			<p class="text-lightGrey text-404-32 capitalize"><?php echo __( 'nicht gefunden', 'carina' ); ?></p>
		</div>
		<div class="pb-12">
			<p class="text-404-24 text-lightGrey text-center capitalize max-w-[624px]"><?php esc_html_e( 'Die von Ihnen angeforderte Seite existiert nicht mehr oder hat unter dieser Adresse nie existiert.', 'aleandbread' ); ?></p>
		</div>
		<div class="text-center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-404-button text-center inline-block max-w-[180px] h-[56px] bg-coral text-lightGrey px-4 py-4 hover:bg-lightGrey hover:text-coral transition-300	"><?php esc_html_e( 'Zurück zur Startseite', 'aleandbread' ); ?></a>
		</div>
	  </div>
</section>
<?php
do_action( 'after_main_content' );
get_footer();
