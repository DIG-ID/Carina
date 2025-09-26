<section id="section-history" class="section-history relative w-full pb-16 md:pb-28 xl:pb-32">
  <div class="theme-container">
    <div class="theme-grid mb-8 md:mb-12 xl:mb-14">
      <div class="col-span-2 md:col-span-5 xl:col-span-8">
        <h2 class="title-md text-darkBlue pb-8"><?php the_field( 'history_title' ); ?></h2>
        <p class="block-text text-darkBlue"><?php the_field( 'history_text' ); ?></p>
      </div>
    </div>
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12">
        <?php if ( have_rows('history_timeline') ) : ?>
          <div class="swiper history-slider bleed-right-md-container">
            <div class="swiper-wrapper">
              <?php while ( have_rows('history_timeline') ) : the_row();

                $id          = (int) get_sub_field('image');
                $year        = trim((string) get_sub_field('year'));
                $description = get_sub_field('description');

                if ( $id <= 0 ) { continue; }

                $alt = trim( get_post_meta($id, '_wp_attachment_image_alt', true) );
                if ( ! $alt ) { $alt = get_the_title($id); }
              ?>
                <div class="swiper-slide">
                  <figure class="flex flex-col">
                    <?php
                      echo wp_get_attachment_image(
                        $id, 'slider-bleed-right-size', false,
                        [
                          'class'    => 'block w-full h-auto object-cover',
                          'alt'      => esc_attr($alt),
                          'sizes'    => '(min-width:528px) 50vw, 100vw',
                        ]
                      );
                    ?>
                    <figcaption class="flex flex-row items-start gap-x-14 pt-9">
                      <?php if ( $year ) : ?>
                        <span class="title-sm text-darkBlue"><?php echo $year; ?></span>
                      <?php endif; ?>
                      <?php if ( $description ) : ?>
                        <div class="block-text text-darkBlue xl:pr-4">
                          <?php echo $description; ?>
                        </div>
                      <?php endif; ?>
                    </figcaption>
                  </figure>
                </div>
              <?php endwhile; ?>
            </div>
            <div class="swiper-button-next right-4 xl:right-16"></div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
