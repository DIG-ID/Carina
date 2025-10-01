<section id="section-content" class="section-content relative w-full pt-8 md:pt-12 xl:pt-16 pb-16 xl:pb-24">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-8">
        <h2 class="title-md text-darkBlue pb-8 md:pb-12 xl:pb-5"><?php the_field( 'content_title' ); ?></h2>
      </div>
      <div class="left-col col-span-2 md:col-span-3 xl:col-span-6">
        <p class="block-text text-darkBlue pb-8 md:pb-16"><?php the_field( 'content_text' ); ?></p>
        <?php echo wp_get_attachment_image(
          get_field('content_left_col_image_1'),
          'full',
          false,
          [
          'class'    => 'w-full object-cover mb-8 md:mb-10 hidden md:block',
          'loading'  => 'eager',
          'decoding' => 'async',
          ]
        ); ?>
      </div>
      <div class="right-col col-span-2 md:col-span-3 xl:col-span-6 pt-0 md:pt-28 xl:pt-12">
        <?php echo wp_get_attachment_image(
          get_field('content_right_col_image_1'),
          'full',
          false,
          [
          'class'    => 'w-full object-cover mb-8 md:mb-10',
          'loading'  => 'eager',
          'decoding' => 'async',
          ]
        ); ?>
      </div>
      <div class="left-col col-span-2 md:col-span-3 xl:col-span-5 lg:-mt-20 xl:-mt-[8.5rem]">
        <?php echo wp_get_attachment_image(
          get_field('content_left_col_image_2'),
          'full',
          false,
          [
          'class'    => 'w-full object-cover',
          'loading'  => 'eager',
          'decoding' => 'async',
          ]
        ); ?>
      </div>
      <div class="right-col col-span-2 md:col-span-3 xl:col-span-7 md:-mt-16 lg:mt-0">
        <?php echo wp_get_attachment_image(
          get_field('content_right_col_image_2'),
          'full',
          false,
          [
          'class'    => 'w-full object-cover mb-8 md:mb-10',
          'loading'  => 'eager',
          'decoding' => 'async',
          ]
        ); ?>
        <?php echo wp_get_attachment_image(
          get_field('content_right_col_image_3'),
          'full',
          false,
          [
          'class'    => 'w-full object-cover',
          'loading'  => 'eager',
          'decoding' => 'async',
          ]
        ); ?>
      </div>
    </div>
  </div>
</section>