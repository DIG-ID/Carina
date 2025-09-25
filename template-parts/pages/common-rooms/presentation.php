<section id="section-presentation" class="section-presentation relative w-full pb-16 xl:pb-24 flex flex-col">
  <div class="theme-container bleed-both-container order-2 md:order-1">
    <?php echo wp_get_attachment_image(
      get_field('presentation_image'),
      'full',
      false,
      [
      'class'    => 'w-full object-cover mt-6 md:mt-0 md:mb-8',
      'loading'  => 'eager',
      'decoding' => 'async',
      ]
    ); ?>
  </div>
  <div class="theme-container order-1 md:order-2">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-8">
        <h2 class="title-md text-darkBlue pb-4 md:pb-8"><?php the_field( 'presentation_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-5 xl:col-span-5 col-start-1 md:col-start-1 xl:col-start-1">
        <p class="block-text text-darkBlue"><?php the_field( 'presentation_text' ); ?></p>
      </div>
    </div>
  </div>
</section>