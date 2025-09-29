<section id="apartments" class="apartments relative overflow-hidden bg-lightGrey pt-7 md:pt-12 xl:pt-16 pb-16 md:pb-24">
  <div class="theme-container">
    <div class="theme-grid">

      <!-- Previous/next buttons -->
      <div class="col-span-2 md:col-span-6 xl:col-span-12 flex w-full pb-16 md:pb-24">
        <div>
          <?php if ( $prev = get_previous_post() ) : ?>
            <a class="btn btn-arrow-previous" href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>">
              <?php echo esc_html__( 'Zurück zur Zimmerübersicht', 'carina' ); ?>
            </a>
          <?php endif; ?>
        </div>
        <div class="ml-auto">
          <?php if ( $next = get_next_post() ) : ?>
            <a class="btn btn-arrow-next" href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
              <?php echo esc_html__( 'Nächstes Zimmer', 'carina' ); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- CONTENT (LEFT WRAPPER) -->
      <div class="col-span-2 md:col-span-3 xl:col-start-1 xl:col-span-6">
        <!-- Title -->
        <div class="content-wrapper order-1 md:order-none">
          <h2 class="title-md text-darkBlue mb-7 md:mb-12 xl:mb-16 md:max-w-[351px] xl:max-w-full">
            <?php echo esc_html( get_field('content_title') ); ?>
          </h2>

          <!-- Description -->
          <p class="block-17 text-darkBlue mb-7 md:mb-12 xl:mb-16 xl:max-w-[530px]">
            <?php echo get_field('content_description'); ?>
          </p>

          <!-- Button -->
          <a href="<?php the_field( 'general_booking_url', 'option' ); ?>" class="btn btn-primary mb-7 md:mb-12  xl:mb-32 max-w-[150px]">
            <?php esc_html_e( 'Jetzt buchen', 'carina' ); ?>
          </a>
        </div>

        <!-- Mobile image -->
        <div class="block md:hidden">
          <?php if ( $content_image = get_field('content_image') ) :
            echo wp_get_attachment_image(
              $content_image,
              'full',
              false,
              [
                'class'    => 'block w-full h-auto object-cover',
                'loading'  => 'eager',
                'decoding' => 'async',
              ]
            );
          endif; ?>
        </div>

        <!-- Icons row -->
        <div class="flex flex-row items-end ml-5 md:ml-0 gap-28 md:gap-12 flex-wrap">
          <?php
          if ( have_rows('content_amenities') ) :
            while ( have_rows('content_amenities') ) : the_row();
              $icon_field = get_sub_field('icon');   // could be ID or Array
              $text       = get_sub_field('text');
              $icon_id = 0;
              if (is_numeric($icon_field)) {
                $icon_id = (int) $icon_field;                 // Image ID
              } elseif (is_array($icon_field) && !empty($icon_field['ID'])) {
                $icon_id = (int) $icon_field['ID'];          // Image Array
              }
              ?>
              <div class="flex flex-col items-center text-center">
                <?php if ($icon_id): ?>
                  <?php echo wp_get_attachment_image(
                    $icon_id,
                    'full',
                    false,
                    [
                      'class'    => 'mb-3 max-w-full h-auto object-contain',
                      'loading'  => 'lazy',
                      'decoding' => 'async',
                    ]
                  ); ?>
                <?php endif; ?>

                <?php if (!empty($text)): ?>
                  <h3 class="title-sm text-darkBlue"><?php echo esc_html($text); ?></h3>
                <?php endif; ?>
              </div>
              <?php
            endwhile;
          endif;
          ?>
        </div>
      </div>

      <!-- IMAGE (RIGHT SIDE) -->
      <div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-6 xl:pb-24 order-2 md:order-none hidden md:block">
        <?php if ( $content_image = get_field('content_image') ) :
          echo wp_get_attachment_image(
            $content_image,
            'full',
            false,
            [
              'class'    => 'block w-full h-auto object-cover',
              'loading'  => 'eager',
              'decoding' => 'async',
            ]
          );
        endif; ?>
      </div>

    </div>

    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12">
        <!-- slider title -->
        <div class="pt-16 md:pt-24 mb-8 md:mb-12">
          <p class="title-30 text-darkBlue"><?php echo get_field('content_slider_title') ?></p>
        </div>
        <!-- slider images -->
        <div class="swiper aps-slider">
          <div class="swiper-wrapper">
            <?php if ($rooms_slider = get_field('content_rooms_slider')) :
              foreach ($rooms_slider as $id) : ?>
                <div class="swiper-slide slider-image">
                  <?php echo wp_get_attachment_image($id, 'full', false, ['class'=>'block w-full h-auto']); ?>
                </div>
            <?php endforeach; endif; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </div> 
  </div> 
</section>