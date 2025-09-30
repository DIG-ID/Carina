<section id="section-rooms-slider" class="section-rooms-slider relative w-full pb-16 md:pb-28 xl:pb-32">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12">
        <p class="title-30 text-darkBlue pb-8 md:pb-12"><?php echo get_field('content_slider_title') ?></p>
      </div>
    </div>
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12">
        <?php
        $images = (array) get_field('content_rooms_slider'); // returns IDs
        if (!empty($images)) : ?>
          <div class="swiper rooms-slider bleed-right-md-container">
            <div class="swiper-wrapper">
              <?php foreach ($images as $i => $id) :
                $id = (int) $id;
                if ($id <= 0) continue;

                $alt = trim(get_post_meta($id, '_wp_attachment_image_alt', true));
                if (!$alt) $alt = get_the_title($id);
                $loading = ($i === 0) ? 'eager' : 'lazy';
              ?>
                <div class="swiper-slide">
                  <figure class="flex flex-col">
                    <?php
                      echo wp_get_attachment_image(
                        $id, 'slider-bleed-right-size', false,
                        [
                          'class'    => 'block w-full h-auto object-cover object-center',
                          'alt'      => esc_attr($alt),
                          'sizes'    => '(min-width:528px) 50vw, 100vw',
                          'loading'  => $loading,
                          'decoding' => 'async',
                        ]
                      );
                    ?>
                  </figure>
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