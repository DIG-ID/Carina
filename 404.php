<?php
get_header();
do_action( 'before_main_content' );
?>
<section id="404" class="section-404 xl:pt-[162px] xl:pb-[52px]">
	<div class="theme-container bg-no-repeat bg-center bg-cover py-10 min-h-[700px] h-full flex flex-col justify-between items-center text-center" style="background-image: url( <?php echo esc_url( get_theme_file_uri( 'assets/images/404-bg-winter.jpg' ) ); ?> );">

			<div class="flex flex-col gap-10 mt-20 md:mt-32 xl:mt-0">
				<h1 class="font-magnatText font-bold text-8xl xl:text-[9.375rem] leading-none text-darkBlue uppercase "><?php esc_html_e( '404', 'carina' ); ?></h1>

				<div class="404-content bg-darkBlue text-lightGrey max-w-[482px] px-8 py-6 flex flex-col justify-center items-center gap-8">
					<h2 class="font-magnatText font-normal text-xl xl:text-2xl tracking-[0.005px] text-lightGrey"><?php esc_html_e( 'Es sieht so aus, als wärst du vom Weg abgekommen und hättest dich in den Bergen verlaufen.', 'carina' ); ?></h2>
					<p class="block-text"><?php esc_html_e( 'Keine Sorge, klicke einfach auf den untenstehenden Button, um wieder auf den richtigen Weg zu kommen.', 'aleandbread' ); ?></p>
				</div>
			</div>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block font-funnelsans font-bold text-base text-center text-lightGrey bg-coral px-6 py-4 rounded-[3.75rem] transition-all duration-500 ease-in-out hover:bg-lightGrey hover:text-coral"><?php esc_html_e( 'Zurück zur Startseite', 'aleandbread' ); ?></a>

	</div>
</section>
<?php
do_action( 'after_main_content' );
get_footer();
