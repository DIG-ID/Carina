<section id="section-hero" class="section-hero relative h-screen w-full z-20">
  <?php if ( get_field('apartment_hero_background_image', 'options') ) : ?>
    <?php echo wp_get_attachment_image(
      get_field('apartment_hero_background_image', 'options'),
      'full',
      false,
      [
        'class'    => 'absolute inset-0 w-full h-full object-cover -z-10',
        'loading'  => 'eager',
        'decoding' => 'async',
      ]
    ); ?>
  <?php endif; ?>
  <?php if ( is_front_page() ) : ?>
    <div class="home-hero-overlay" aria-hidden="true"></div>
  <?php endif; ?>

  <div class="theme-container justify-center h-full flex items-end pb-36 xl:pb-20 relative z-10">
    <div class="theme-grid">
      <?php if( get_field('apartment_hero_title', 'options') ) : ?>
      <div class="col-span-2 md:col-span-<?php echo get_field( 'apartment_hero_cols_md', 'options' ); ?> xl:col-span-<?php echo get_field( 'apartment_hero_cols_xl', 'options'); ?> text-lightGrey">
        <h1 class="title-xl">
          <?php the_field( 'apartment_hero_title', 'options'); ?>
        </h1>
      </div>
      <?php endif; ?>
    </div>
    <div class="theme-grid absolute bottom-8 md:bottom-16 xl:bottom-28">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 scroll-down flex justify-center min-h-16">
        <?php if ( is_front_page() ) : ?>
          <a href="#" class="btn-scroll block-text text-lightGrey"><?php esc_html_e( 'Scroll for more', 'carina' ); ?></a>
          <div class="w-[1px] md:w-[1px] h-[125px] xl:h-[202px] bg-lightGrey absolute top-9 md:top-14 xl:top-16" aria-hidden="true"></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
