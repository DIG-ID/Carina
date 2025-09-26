<section id="section-hero" class="section-hero relative h-screen w-full z-20 bg-darkBlue">

  <?php if ( get_field('hero_video_header') && get_field('hero_video') ) : ?>
    <video 
      autoplay 
      muted 
      loop 
      playsinline 
      class="absolute inset-0 w-full h-full object-cover -z-10"
    >
      <source src="<?php echo esc_url( get_field('hero_video')['url'] ); ?>" type="<?php echo esc_attr( get_field('hero_video')['mime_type'] ); ?>">
    </video>

  <?php elseif ( get_field('hero_background_image') ) : ?>
    <?php echo wp_get_attachment_image(
      get_field('hero_background_image'),
      'full', false,
      ['class'    => 'absolute inset-0 w-full h-full object-cover -z-10',]
    ); ?>
  <?php endif; ?>
  <?php if ( is_front_page() ) : ?>
    <div class="home-hero-overlay" aria-hidden="true"></div>
  <?php endif; ?>

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
