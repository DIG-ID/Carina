<?php if ( 'full' === get_field( 'hero_hero_style' ) ) : ?>
	<section id="section-hero" class="section-hero relative h-[100dvh] md:h-screen w-full z-20 bg-darkBlue">

		<?php if ( get_field('hero_video_header') && get_field('hero_video') ) : ?>
  <?php
  $bg_id  = (int) get_field('hero_background_image');
  $poster = $bg_id ? wp_get_attachment_image_url($bg_id, 'full') : '';
  ?>

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
        [
          'class' => 'absolute inset-0 w-full h-full object-cover -z-10',
          'sizes' => '100vw',
          'decoding' => 'async',
        ]
      ); ?>
    </picture>
  <?php endif; ?>

  <video
    id="hero-video"
    autoplay
    muted
    loop
    playsinline
    <?php if ( $poster ) : ?>poster="<?php echo esc_url( $poster ); ?>"<?php endif; ?>
    class="absolute inset-0 w-full h-full object-cover -z-10 opacity-0 transition-opacity duration-500"
  >
    <source
      src="<?php echo esc_url( get_field('hero_video')['url'] ); ?>"
      type="<?php echo esc_attr( get_field('hero_video')['mime_type'] ); ?>">
  </video>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var v = document.getElementById('hero-video');
      if (!v) return;

      // Fade in only when we actually have data to play
      var reveal = function () { v.classList.add('opacity-100'); };
      v.addEventListener('loadeddata', reveal, { once: true });

      // If the source errors, remove the video so the image stays visible
      v.addEventListener('error', function () { v.remove(); });

      // Safety timeout: if we still don't have data after N ms, treat as failed
      setTimeout(function () {
        if (v && v.readyState < 2) { // HAVE_CURRENT_DATA
          v.dispatchEvent(new Event('error'));
        }
      }, 4000);
    });
  </script>
	<?php elseif ( $id = (int) get_field('hero_background_image') ) : ?>
		<!-- your existing picture fallback for when there is no video configured -->
		<picture>
			<source
				media="(max-width: 767px)"
				srcset="<?php echo esc_attr(
					wp_get_attachment_image_srcset( $id, 'hero-mobile' )
					?: wp_get_attachment_image_url( $id, 'hero-mobile' )
				); ?>"
				sizes="100vw" />
			<?php echo wp_get_attachment_image(
				$id,
				'full',
				false,
				[
					'class'          => 'absolute inset-0 w-full h-full object-cover -z-10',
					'sizes'          => '100vw',
					'fetchpriority'  => 'high',
					'decoding'       => 'async',
				]
			); ?>
		</picture>
	<?php endif; ?>



		<?php /*if ( is_front_page() ) :*/ ?>
			<div class="home-hero-overlay" aria-hidden="true"></div>
		<?php /*endif;*/ ?>

		<?php if ( is_front_page() ) : ?>
		<div class="theme-container justify-center h-full flex items-end pb-36 xl:pb-20 relative z-10">
		<?php else : ?>
		<div class="theme-container justify-center h-full flex items-end pb-8 xl:pb-14 relative z-10">
		<?php endif; ?>
			<div class="theme-grid w-full">
				<?php if( 'hero_title' ) : ?>
				<div class="col-span-2 md:col-span-<?php echo get_field( 'hero_cols_md' ); ?> xl:col-span-<?php echo get_field( 'hero_cols_xl' ); ?> text-lightGrey">
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