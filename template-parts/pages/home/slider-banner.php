<section id="section-slider-banner" class="section-slider-banner relative w-full">
  <div class="swiper slider-banner-swiper relative">
    <div class="swiper-wrapper">
      <?php
      $q = new WP_Query([
        'post_type'           => 'post',
        'posts_per_page'      => 6,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
      ]);

      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post();
          $thumb_id = get_post_thumbnail_id();
          $alt      = $thumb_id ? trim(get_post_meta($thumb_id, '_wp_attachment_image_alt', true)) : '';
          $loading  = ($q->current_post === 0) ? 'eager' : 'lazy';
      ?>
        <div class="swiper-slide">
          <article class="relative w-full min-h-[55svh] md:min-h-[55svh] xl:min-h-[65svh] flex flex-col justify-center items-center">
            <?php if ($thumb_id) :
              echo wp_get_attachment_image($thumb_id, 'full', false, [
                'class'    => 'absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 min-w-full min-h-full object-cover -z-10',
                'alt'      => $alt ?: get_the_title($thumb_id),
                'loading'  => $loading,
                'decoding' => 'async',
                'sizes'    => '100vw',
              ]);

            endif; ?>

            <span aria-hidden="true" class="absolute inset-0 z-0 bg-[#0F1A1E]/60"></span>

            <div class="theme-container h-full flex flex-col justify-center items-center relative z-10">
              <div class="content-wrapper text-center max-w-[80%] md:max-w-md xl:max-w-xl">
                <h3 class="title-sm text-lightGrey pb-4 md:pb-6 xl:pb-8">
                  <?php the_title(); ?>
                </h3>
                <p class="block-text text-lightGrey">
                  <?php echo esc_html( wp_trim_words( get_the_excerpt(), 24, '…' ) ); ?>
                </p>

                <a href="<?php echo esc_url( get_permalink() ); ?>" class="mt-2 md:mt-6 inline-flex items-center gap-2 text-lightGrey underline decoration-transparent hover:decoration-current max-w-14 md:max-w-none">
                  <svg xmlns="http://www.w3.org/2000/svg" width="77" height="36" viewBox="0 0 77 36" fill="none">
                    <path d="M1 22.716C1 22.716 9.88134 37.2735 34.3389 24.0808C36.8318 22.7359 39.454 21.6417 42.1817 20.8777C48.972 18.9776 61.4862 16.7116 76 19.9784" stroke="#F0F2F5" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M53.7363 1L75.9994 19.9783L53.7363 34.2115" stroke="#F0F2F5" stroke-width="2" stroke-linejoin="round"/>
                  </svg>
                </a>
                
              </div>
            </div>
            <div class="controls absolute bottom-5 md:bottom-11 max-w-40 flex flex-row justify-between items-center mx-auto">
              <div class="swiper-button-prev !relative mr-7"></div>
              <div class="swiper-button-next !relative ml-7"></div>
            </div>
          </article>
        </div>
      <?php
        endwhile; wp_reset_postdata();
      else : ?>
        <div class="swiper-slide">
          <div class="min-h-[50svh] flex items-center justify-center text-lightGrey/70">
            <?php esc_html_e('No posts found.', 'carina'); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <!-- Controls -->
    
  </div>
</section>
