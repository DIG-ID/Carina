<?php if ( 'full' === get_field( 'hero_hero_style' ) ) : ?>
	<section id="section-hero" class="section-hero relative h-[100dvh] md:h-screen w-full z-20 bg-darkBlue">

		<?php
		$bg_id = get_field( 'hero_background_image' );
		?>

		<?php if ( get_field( 'hero_video_header' ) && get_field( 'hero_video' ) ) : ?>

			<?php if ( $bg_id ) : ?>
				<picture aria-hidden="true" class="pointer-events-none">
					<source
						media="(max-width: 767px)"
						srcset="<?php echo esc_attr(
							wp_get_attachment_image_srcset( $bg_id, 'hero-mobile' )
							?: wp_get_attachment_image_url( $bg_id, 'hero-mobile' )
						); ?>"
						sizes="100vw" />
					<?php echo wp_get_attachment_image(
						$bg_id,
						'full',
						false,
						array(
							'class'         => 'absolute inset-0 w-full h-full object-cover -z-10',
							'sizes'         => '100vw',
							'loading'       => 'eager',
							'fetchpriority' => 'high',
						)
					); ?>
				</picture>
			<?php endif; ?>

			<video
				id="hero-video"
				autoplay
				muted
				loop
				playsinline
				aria-hidden="true"
				class="absolute inset-0 w-full h-full object-cover -z-10 opacity-0 transition-opacity duration-500"
			>
				<source
					src="<?php echo esc_url( get_field( 'hero_video' )['url'] ); ?>"
					type="<?php echo esc_attr( get_field( 'hero_video' )['mime_type'] ); ?>">
			</video>

			<script data-nowprocket>
				(function () {
					var v = document.getElementById('hero-video');
					if (!v) return;

					var reveal = function () { v.classList.add('opacity-100'); };

					if (!v.paused) { reveal(); return; }
					v.addEventListener('playing', reveal, { once: true });
					v.addEventListener('error', function () { v.remove(); });
				})();
			</script>
		<?php elseif ( $bg_id ) : ?>
			<picture>
				<source
					media="(max-width: 767px)"
					srcset="
					<?php
					echo esc_attr(
						wp_get_attachment_image_srcset( $bg_id, 'hero-mobile' )
						?: wp_get_attachment_image_url( $bg_id, 'hero-mobile' )
					);
					?>"
					sizes="100vw" />
				<?php echo wp_get_attachment_image(
					$bg_id,
					'full',
					false,
					[
						'class'         => 'absolute inset-0 w-full h-full object-cover -z-10',
						'sizes'         => '100vw',
						'loading'       => 'eager',
						'fetchpriority' => 'high',
					]
				); ?>
			</picture>
		<?php endif; ?>

		<div class="home-hero-overlay" aria-hidden="true"></div>

		<div class="theme-container justify-center h-full flex items-end relative z-10 <?php echo esc_attr( ( is_front_page() ) ? 'pb-36 xl:pb-20' : 'pb-8 xl:pb-14' ); ?>">
			<div class="theme-grid w-full">
				<?php if ( get_field( 'hero_title' ) ) : ?>
					<div class="col-span-2 md:col-span-<?php echo esc_attr( get_field( 'hero_cols_md' ) ); ?> xl:col-span-<?php echo esc_attr( get_field( 'hero_cols_xl' ) ); ?> text-lightGrey">
						<h1 class="title-xl">
							<?php the_field( 'hero_title' ); ?>
						</h1>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( is_front_page() ) : ?>
				<div class="theme-grid absolute bottom-8 md:bottom-16 xl:bottom-28">
					<div class="col-span-2 md:col-span-6 xl:col-span-12 scroll-down flex justify-center min-h-16">
						<a href="#" class="btn-scroll block-text text-lightGrey"><?php esc_html_e( 'Los geht\'s', 'carina' ); ?></a>
						<div class="w-[1px] md:w-[1px] h-[125px] xl:h-[202px] bg-lightGrey absolute top-9 md:top-14 xl:top-16" aria-hidden="true"></div>
					</div>
				</div>
			<?php endif; ?>
		</div>

	</section>
<?php else : ?>
	<section class="section-hero theme-container">
		<div class="theme-grid">
			<div class="col-span-2 md:col-span-6 xl:col-span-10 mt-40 mb-16 xl:mt-56 xl:mb-28">
				<?php
				$page_title = get_field( 'hero_title' );
				if ( $page_title ) :
					echo '<h1 class="title-md">' . esc_html( $page_title ) . '</h1>';
				else :
					the_title( '<h1 class="title-md">', '</h1>' );
				endif;
				?>
			</div>
		</div>
	</section>
<?php endif; ?>


