<section id="section-outro" class="section-outro relative w-full bg-darkBlue pt-8 md:pt-12 xl:pt-0 pb-10 md:pb-11 xl:pb-28">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-3 xl:col-span-6 xl:pt-14">
        <h2 class="title-md text-lightGrey pb-8 xl:pb-20"><?php the_field( 'outro_title' ); ?></h2>
        <p class="block-text text-lightGrey mb-8 md:mb-0"><?php the_field( 'outro_text' ); ?></p>
      </div>
      <div class="col-span-2 md:col-span-3 xl:col-span-6">
        <?php echo wp_get_attachment_image(
          get_field('outro_image'),
          'full',
          false,
          [
          'class'    => 'w-full h-full object-cover',
          'loading'  => 'eager',
          'decoding' => 'async',
          ]
        ); ?>
      </div>
    </div>
  </div>
</section>