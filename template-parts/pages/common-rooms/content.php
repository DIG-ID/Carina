<section id="section-content" class="section-content relative w-full pt-8 md:pt-12 xl:pt-16 pb-16 xl:pb-24">
  <div class="theme-container">
    <div class="grid grid-cols-2 md:grid-cols-12 xl:grid-cols-12 gap-x-5 md:gap-x-4 xl:gap-x-8">
      <div class="col-span-2 md:col-span-8 xl:col-span-8">
        <h2 class="title-md text-darkBlue pb-8 md:pb-12 xl:pb-5"><?php the_field( 'content_title' ); ?></h2>
      </div>
      <div class="left-col col-span-2 md:col-span-6 xl:col-span-6">
        <p class="block-text text-darkBlue pb-8 md:pb-16"><?php the_field( 'content_text' ); ?></p>
        <?php echo wp_get_attachment_image(
          get_field('content_left_col_image_1'),
          'full', false,
          ['class' => 'w-full object-cover mb-8 md:mb-6 lg:mb-10 hidden md:block',]
        ); ?>
      </div>
      <div class="right-col col-span-2 md:col-span-6 xl:col-span-6 pt-0 md:pt-48 lg:pt-28 xl:pt-12">
        <?php echo wp_get_attachment_image(
          get_field('content_right_col_image_1'),
          'full', false,
          ['class' => 'w-full object-cover mb-8 md:mb-6 lg:mb-10',]
        ); ?>
      </div>
      <div class="left-col col-span-2 md:col-span-5 xl:col-span-5 md:-mt-6 lg:-mt-20 xl:-mt-[8.5rem]">
        <?php echo wp_get_attachment_image(
          get_field('content_left_col_image_2'),
          'full', false,
          ['class' => 'w-full object-cover',]
        ); ?>
      </div>
      <div class="right-col col-span-2 md:col-span-7 xl:col-span-7">
        <?php echo wp_get_attachment_image(
          get_field('content_right_col_image_2'),
          'full', false,
          ['class' => 'w-full object-cover mb-8 md:mb-10',]
        ); ?>
        <?php echo wp_get_attachment_image(
          get_field('content_right_col_image_3'),
          'full', false,
          ['class' => 'w-full object-cover',]
        ); ?>
      </div>
    </div>
  </div>
</section>