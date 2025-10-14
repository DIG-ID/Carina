<section id="apartments" class="apartments relative overflow-hidden bg-lightGrey pt-7 md:pt-12 xl:pt-16 pb-16 md:pb-24">
  <div class="theme-container">
    <div class="theme-grid">

      <!-- Previous/next buttons -->
      <div class="col-span-2 md:col-span-6 xl:col-span-12 flex w-full pb-16 md:pb-24">
        <div>
          <?php
          $archive_url = get_post_type_archive_link( 'apartment' );
          if ( function_exists( 'apply_filters' ) && defined( 'ICL_LANGUAGE_CODE' ) ) {
            $archive_url = apply_filters( 'wpml_permalink', $archive_url, ICL_LANGUAGE_CODE );
          }
          ?>
          <a class="btn btn-arrow-previous" href="<?php echo esc_url( $archive_url ); ?>">
            <?php esc_html_e( 'Zurück zur Apartmentübersicht', 'carina' ); ?>
          </a>
        </div>
        <div class="ml-auto">
          <?php if ( $next = get_next_post() ) : ?>
            <a class="btn btn-arrow-next" href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
              <?php echo esc_html__( 'Nächstes Apartment', 'carina' ); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- CONTENT (LEFT WRAPPER) -->
      <div class="col-span-2 md:col-span-3 xl:col-start-1 xl:col-span-6">
        <div class="content-wrapper order-1 md:order-none">
          <h2 class="title-md text-darkBlue mb-7 md:mb-12 xl:mb-16 md:max-w-[351px] xl:max-w-full">
            <?php the_field('content_title'); ?>
          </h2>

          <p class="block-17 text-darkBlue mb-7 md:mb-10 xl:mb-10 xl:max-w-[530px]">
            <?php echo get_field('content_description'); ?>
          </p>

          <div class="flex flex-col lg:flex-row items-start justify-start gap-y-5 lg:gap-y-0 lg:gap-x-8 mb-10">
            <?php
            $ids = get_field('content_plans_maps');
            $btn_label = get_field('content_plans_button_title');

            if (is_array($ids) && !empty($ids)) :
              ?>
              <div class="sr-only" aria-hidden="true">
                <?php foreach ($ids as $id) :
                  $id = (int) $id;
                  if ($id <= 0) { continue; }

                  $url      = wp_get_attachment_image_url($id, 'full');
                  if (!$url) { continue; }

                  $caption  = wp_get_attachment_caption($id);
                  $alt_attr = trim(get_post_meta($id, '_wp_attachment_image_alt', true));
                  ?>
                  <a
                    href="<?php echo esc_url($url); ?>"
                    data-fancybox="open-zimmer"
                    <?php if ($caption) : ?>
                      data-caption="<?php echo esc_attr($caption); ?>"
                    <?php endif; ?>
                    <?php if ($alt_attr) : ?>
                      aria-label="<?php echo esc_attr($alt_attr); ?>"
                    <?php endif; ?>
                  ></a>
                <?php endforeach; ?>
              </div>

              <?php
              $first_id  = (int) reset($ids);
              $first_url = $first_id ? (wp_get_attachment_image_url($first_id, 'full') ?: '') : '';
              ?>
              <a
                class="btn btn-download-darkBlue !justify-start"
                data-fancybox-trigger="open-zimmer"
                href="<?php echo esc_url($first_url ?: '#'); ?>"
                role="button"
              >
                <?php echo esc_html($btn_label); ?>
              </a>
            <?php endif; ?>
          </div>

          <h3 class="title-sm text-DarkBlue mb-7 md:mb-8 xl:mb-8 md:max-w-[351px] xl:max-w-[540px]">
            <?php echo get_field('content_equipments_title'); ?>
          </h3>

          <p class="block-17 text-darkBlue mb-7 md:mb-12 xl:mb-16 xl:max-w-[530px]">
            <?php echo get_field('content_equipments_text'); ?>
          </p>

          <!-- Button -->
          <a href="<?php the_field( 'general_booking_url', 'option' ); ?>" class="btn btn-primary max-w-[150px]">
            <?php esc_html_e( 'Jetzt buchen', 'carina' ); ?>
          </a>
        </div>

        <!-- Mobile image -->
        <div class="block md:hidden">
          <?php if ( $content_image = get_field('content_image') ) :
            echo wp_get_attachment_image(
              $content_image, 'full', false,
              ['class' => 'block w-full h-auto object-cover']
            );
          endif; ?>
        </div>

        <!-- Icons -->
        <div class="pt-10 md:pt-10 xl:pt-14">
          <div class="grid grid-cols-2 xl:grid-cols-4 gap-x-8 gap-y-6">
            <?php
              /* ---- Room Space Icon ---- */
              $room_space_icon = get_field('content_room_space_icon');
              $room_space_text = get_field('content_size');

              $first_icon_id = 0;
              if (is_numeric($room_space_icon)) {
                $first_icon_id = (int) $room_space_icon;
              } elseif (is_array($room_space_icon) && !empty($room_space_icon['ID'])) {
                $first_icon_id = (int) $room_space_icon['ID'];
              }

              if ($first_icon_id || !empty($room_space_text)) : ?>
                <div class="flex flex-col items-center text-center">
                  <?php
                  if ($first_icon_id) {
                    echo wp_get_attachment_image(
                      $first_icon_id, 'full', false,
                      ['class' => 'mb-3 max-w-[50px] h-10 object-contain']
                    );
                  }
                  ?>
                  <?php if (!empty($room_space_text)) : ?>
                    <h3 class="block-text text-darkBlue"><?php echo esc_html($room_space_text); ?></h3>
                  <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php
              /* ---- Repeater items ---- */
              if ( have_rows('content_amenities') ):
                while ( have_rows('content_amenities') ) : the_row(); ?>
                  <div class="flex flex-col items-center text-center">
                    <?php
                    $icon = get_sub_field('icon');
                    if ($icon) {
                      echo wp_get_attachment_image(
                        $icon, 'full', false,
                        ['class' => 'mb-3 max-w-[50px] h-10 object-contain']
                      );
                    }
                    ?>
                    <h3 class="block-text text-darkBlue"><?php the_sub_field('text'); ?></h3>
                  </div>
                <?php endwhile;
              endif; ?>
          </div>
        </div>
      </div>

      <!-- IMAGE (RIGHT SIDE) -->
      <div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-6 xl:pb-0 order-2 md:order-none hidden md:block">
        <?php if ( $content_image = get_field('content_image') ) :
          echo wp_get_attachment_image(
            $content_image, 'full', false,
            ['class' => 'block w-full h-full object-cover']
          );
        endif; ?>
      </div>

    </div>
  </div> 
</section>