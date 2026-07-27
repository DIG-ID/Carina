<?php
/**
 * Template Name: Reservation Success Template
 */

get_header();
do_action( 'before_main_content' );
?>
<section id="Reservation" class="section-reservation xl:pt-[162px] xl:pb-[52px]">
	<div class="theme-container bg-no-repeat bg-center bg-cover py-10 min-h-[700px] h-full flex flex-col justify-between items-center text-center" style="background-image: url( <?php echo esc_url( get_theme_file_uri( 'assets/images/hotel-carina-zermatt-reservation-2.webp' ) ); ?> );">

			<div class="flex flex-col gap-10 mt-20 md:mt-32 xl:mt-0">

        <p class="font-magnatText font-bold text-8xl xl:text-[9.375rem] leading-none text-darkBlue uppercase invisible"><?php esc_html_e( '404', 'carina' ); ?></p>
				
				<div class="reservation-content bg-darkBlue text-lightGrey max-w-[520px] px-8 py-6 flex flex-col justify-center items-center gap-0">
          <p class="block-text !font-semibold"><?php esc_html_e( 'Deine Geschichte am Tisch beginnt bald.', 'carina' ); ?></p>
					<h1 class="font-magnatText font-semibold text-xl xl:text-2xl tracking-[0.005px] text-lightGrey mb-5 xl:mb-7"><?php echo wp_kses_post( __( 'Danke für deine Reservierung<br>im La Table du Carina', 'carina' ) ); ?></h1>
					<p class="block-text"><?php esc_html_e( 'Wir freuen uns, dich bald bei uns zu empfangen.', 'carina' ); ?></p>
          <p class="block-text !font-semibold"><?php esc_html_e( 'Eine Bestätigung folgt per E-Mail.', 'carina' ); ?></p>
          <p class="block-text"><?php esc_html_e( 'Bitte wirf einen Blick in dein Postfach und bestätige deine Reservierung.', 'carina' ); ?></p>
				</div>
			</div>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block font-funnelsans font-bold text-base text-center text-lightGrey bg-coral px-6 py-4 rounded-[3.75rem] transition-all duration-500 ease-in-out hover:bg-lightGrey hover:text-coral"><?php esc_html_e( 'Zurück zur Startseite', 'carina' ); ?></a>

	</div>
</section>
<?php
do_action( 'after_main_content' );
get_footer();
