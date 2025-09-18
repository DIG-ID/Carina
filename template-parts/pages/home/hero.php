<section id="section-hero" class="section-hero relative h-screen w-full z-20">
  <?php
    $imgHero = get_field('hero_background_image');
    $size  = 'full';
    if ( $imgHero ) {echo wp_get_attachment_image(
        $imgHero, $size, false,
        [
          'class'    => 'absolute inset-0 w-full h-full object-cover -z-10',
          'loading'  => 'eager',
          'decoding' => 'async',
        ]
    );}
  ?>
  <div class="home-hero-overlay" aria-hidden="true"></div>

  <div class="theme-container h-full flex items-end pb-16 relative z-10">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-6 text-lightGrey">
        <h1 class="title-xl mb-6">
          <?php the_field( 'hero_title' ); ?>
        </h1>
      </div>
    </div>
    <div class="scroll-down absolute bottom-28 flex w-full justify-center min-h-16">
      <p class="block-text text-lightGrey"><?php esc_html_e( 'Scroll for more', 'carina' ); ?></p>
      <div class="w-[2px] h-[202px] bg-lightGrey absolute top-16" aria-hidden="true"></div>
    </div>
  </div>
</section>
