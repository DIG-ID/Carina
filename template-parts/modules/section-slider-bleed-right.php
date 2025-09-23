<section id="section-slider-bleed-right" class="section-slider-bleed-right relative w-full pb-16 md:pb-24">
    <div class="theme-container">
        <div class="theme-grid">
          <div class="col-span-2 md:col-span-4 xl:col-span-12">
            <h2 class="title-md text-darkBlue pb-8"><?php the_field( 'slider_title' ); ?></h2>
          </div>
          <div class="col-span-2 md:col-span-4 xl:col-span-12">
          <?php
          $images = get_field('slider_images');
          if ($images) : ?>
            <div class="swiper bleed-right-swiper bleed-right-md-container">
              <div class="swiper-wrapper">
                <?php foreach ($images as $image) :
                  $id      = is_array($image) ? ($image['ID'] ?? $image['id'] ?? 0) : (int)$image;
                  $alt     = is_array($image) ? trim($image['alt'] ?? '') : trim(get_post_meta($id, '_wp_attachment_image_alt', true));
                  $caption = is_array($image) ? ($image['caption'] ?? '') : wp_get_attachment_caption($id);
                  if (!$alt) $alt = get_the_title($id);
                ?>
                  <div class="swiper-slide">
                    <?php
                    echo wp_get_attachment_image(
                      $id,
                      'slider-bleed-right-size',
                      false,
                      [
                        'class'    => 'block w-full h-auto object-cover',
                        'loading'  => 'lazy',
                        'decoding' => 'async',
                        'sizes'    => '(min-width:768px) 50vw, 100vw',
                      ]
                    );
                    ?>
                    <?php if (!empty($caption)) : ?>
                      <p class="mt-2 text-sm text-lightGrey"><?php echo esc_html($caption); ?></p>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="swiper-button-next right-4 xl:right-16"></div>
            </div>
          <?php endif; ?>
        </div>

        </div>
    </div>
</section>