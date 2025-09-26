<section id="section-spirit" class="section-spirit relative w-full bg-darkBlue pt-8 md:pt-10 xl:pt-12 pb-12 xl:pb-20">
  <div class="theme-container pb-16 md:pb-24 xl:pb-16">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 flex flex-row gap-x-1 md:gap-x-6 xl:gap-x-32">
        <div class="w-1/3">
          <?php echo wp_get_attachment_image(
            get_field('spirit_image_1'),
            'full', false,
            ['class' => 'w-full object-cover']
          ); ?>
        </div>
        <div class="w-1/3">
          <?php echo wp_get_attachment_image(
            get_field('spirit_image_2'),
            'full', false,
            ['class' => 'w-full object-cover']
          ); ?>
        </div>
        <div class="w-1/3">
          <?php echo wp_get_attachment_image(
            get_field('spirit_image_3'),
            'full', false,
            ['class' => 'w-full object-cover']
          ); ?>
        </div>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-8 pt-7 md:pt-12">
        <h2 class="title-md text-lightGrey pb-7 md:pb-12"><?php the_field( 'spirit_title' ); ?></h2>
        <p class="block-text text-lightGrey"><?php the_field( 'spirit_text' ); ?></p>
      </div>
    </div>
  </div>
  <div class="theme-container spirit-block pt-0 xl:pt-1">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-3 xl:col-span-6">
        <div class="bleed-left-child">
          <?php echo wp_get_attachment_image(
            get_field('spirit_block_image'),
            'full', false,
            ['class' => 'w-full object-cover xl:max-h-[70dvh]']
          ); ?>
        </div>
      </div>
      <div class="col-span-2 md:col-span-3 xl:col-span-5">
        <h2 class="title-md text-lightGrey pb-7 md:pb-12"><?php the_field( 'spirit_block_title' ); ?></h2>
        <p class="block-text text-lightGrey"><?php the_field( 'spirit_block_text' ); ?></p>
      </div>
    </div>
  </div>
</section>
  