<section id="section-content" class="section-content relative w-full pb-24 md:pb-32 xl:pb-32">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-7">
        <h2 class="title-md text-darkBlue pb-8 md:pb-14 xl:pb-16"><?php the_field( 'content_title' ); ?></h2>
      </div>
      <div class="left-col col-span-2 md:col-span-3 xl:col-span-7">
        <p class="block-text text-darkBlue"><?php the_field( 'content_text' ); ?></p>
        <div class="image-wrapper relative mt-7 md:mt-12 xl:mt-14">
          <?php echo wp_get_attachment_image(
            get_field('content_left_col_image_1'),
            'full',
            false,
            [
            'class'    => 'w-full h-full',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
          <p class="block-text absolute -bottom-1 md:-bottom-20 xl:-bottom-1 w-11/12 xl:w-10/12 left-1/2 -translate-x-1/2 px-4 md:px-5 xl:px-9 pt-4 md:pt-5 xl:pt-7 pb-1 bg-lightGrey"><?php the_field( 'content_left_col_description_1' ); ?></p>
        </div>
        <div class="image-wrapper relative mt-7 md:mt-32 xl:mt-14">
          <?php echo wp_get_attachment_image(
            get_field('content_left_col_image_2'),
            'full',
            false,
            [
            'class'    => 'w-full h-full',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
          <p class="block-text absolute -bottom-1 md:-bottom-20 xl:-bottom-1 w-11/12 xl:w-10/12 left-1/2 -translate-x-1/2 px-4 md:px-5 xl:px-9 pt-4 md:pt-5 xl:pt-7 pb-1 bg-lightGrey"><?php the_field( 'content_left_col_description_2' ); ?></p>
        </div>
      </div>
      <div class="right-col col-span-2 md:col-span-3 xl:col-span-5 xl:-mt-6">
        <div class="image-wrapper relative mt-7 md:mt-0 xl:mt-0">
          <?php echo wp_get_attachment_image(
            get_field('content_right_col_image_1'),
            'full',
            false,
            [
            'class'    => 'w-full h-full',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
          <p class="block-text absolute -bottom-1 md:-bottom-20 xl:-bottom-1 w-11/12 xl:w-10/12 left-1/2 -translate-x-1/2 px-4 md:px-5 xl:px-9 pt-4 md:pt-5 xl:pt-7 pb-1 bg-lightGrey"><?php the_field( 'content_right_col_description_1' ); ?></p>
        </div>
        <div class="image-wrapper relative mt-7 md:mt-32 xl:mt-14">
          <?php echo wp_get_attachment_image(
            get_field('content_right_col_image_2'),
            'full',
            false,
            [
            'class'    => 'w-full h-full',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
          <p class="block-text absolute -bottom-1 md:-bottom-20 xl:-bottom-1 w-11/12 xl:w-10/12 left-1/2 -translate-x-1/2 px-4 md:px-5 xl:px-9 pt-4 md:pt-5 xl:pt-7 pb-1 bg-lightGrey"><?php the_field( 'content_right_col_description_2' ); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>