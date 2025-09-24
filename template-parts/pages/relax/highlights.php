<section id="section-highlights" class="section-highlights relative w-full bg-darkBlue py-9 md:py-11 xl:pt-12 xl:pb-14">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
        <h2 class="title-md text-lightGrey pb-7 md:pb-12 xl:pb-16"><?php the_field( 'highlights_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-8 col-start-1 xl:col-start-3 text-center flex flex-row justify-center">
        <div class="wrapper flex flex-col w-1/3">
          <div class="background-wrapper flex flex-col justify-center items-center relative h-16 md:h-24 xl:h-28 mb-10 md:mb-8 xl:mb-10">
            <?php echo wp_get_attachment_image(
              get_field('highlights_icon_1'),
              'full',
              false,
              [
              'class'    => 'w-full max-w-14 md:max-w-24 xl:max-w-28 mx-auto',
              'loading'  => 'eager',
              'decoding' => 'async',
              ]
            ); ?>
          </div>
          <h3 class="title-sm text-lightGrey pb-2"><?php the_field( 'highlights_description_1' ); ?></h3>
          <?php if ( get_field( 'highlights_temperature_1' ) ) : ?>
          <p class="block-text text-lightGrey"><?php the_field( 'highlights_temperature_1' ); ?></p>
          <?php endif; ?>
        </div>
        <div class="wrapper flex flex-col w-1/3">
          <div class="background-wrapper flex flex-col justify-center items-center relative h-16 md:h-24 xl:h-28 mb-10 md:mb-8 xl:mb-10">
            <?php echo wp_get_attachment_image(
              get_field('highlights_icon_2'),
              'full',
              false,
              [
              'class'    => 'w-full max-w-14 md:max-w-24 xl:max-w-28 mx-auto',
              'loading'  => 'eager',
              'decoding' => 'async',
              ]
            ); ?>
          </div>
          <h3 class="title-sm text-lightGrey pb-2"><?php the_field( 'highlights_description_2' ); ?></h3>
          <?php if ( get_field( 'highlights_temperature_2' ) ) : ?>
          <p class="block-text text-lightGrey"><?php the_field( 'highlights_temperature_2' ); ?></p>
          <?php endif; ?>
        </div>
        <div class="wrapper flex flex-col w-1/3">
          <div class="background-wrapper flex flex-col justify-center items-center relative h-16 md:h-24 xl:h-28 mb-10 md:mb-8 xl:mb-10">
            <?php echo wp_get_attachment_image(
              get_field('highlights_icon_3'),
              'full',
              false,
              [
              'class'    => 'w-full max-w-14 md:max-w-24 xl:max-w-28 mx-auto',
              'loading'  => 'eager',
              'decoding' => 'async',
              ]
            ); ?>
          </div>
          <h3 class="title-sm text-lightGrey pb-2"><?php the_field( 'highlights_description_3' ); ?></h3>
          <?php if ( get_field( 'highlights_temperature_3' ) ) : ?>
          <p class="block-text text-lightGrey"><?php the_field( 'highlights_temperature_3' ); ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-12 flex gap-x-11 pt-7 pb-8 md:py-12 xl:pb-12 xl:pt-16">
        <div class="wrapper flex flex-col w-1/3">
          <?php echo wp_get_attachment_image(
            get_field('highlights_image_1'),
            'full',
            false,
            [
            'class'    => 'w-full',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
        </div>
        <div class="wrapper flex flex-col w-1/3">
          <?php echo wp_get_attachment_image(
            get_field('highlights_image_2'),
            'full',
            false,
            [
            'class'    => 'w-full',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
        </div>
        <div class="wrapper flex flex-col w-1/3">
          <?php echo wp_get_attachment_image(
            get_field('highlights_image_3'),
            'full',
            false,
            [
            'class'    => 'w-full',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
        </div>
      </div>
    </div>
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-12">
          <h2 class="title-md text-lightGrey pb-7 md:pb-16"><?php the_field( 'highlights_extra_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-5 xl:col-span-5">
        <p class="block-text text-lightGrey"><?php the_field( 'highlights_extra_text' ); ?></p>
      </div>
    </div>
  </div>
</section>