<section id="section-outro" class="section-outro relative w-full bg-darkBlue pt-8 md:pt-14 xl:pt-20 pb-16 md:pb-16">
  <div class="theme-container">
    <div class="theme-grid pb-8 md:pb-12 xl:pb-12">
      <div class="col-span-2 md:col-span-6 xl:col-span-12">
        <?php echo wp_get_attachment_image(
          get_field('outro_image'),
          'full', false,
          ['class' => 'w-full object-cover']
        ); ?>
      </div>
    </div>
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-6">
          <h2 class="title-md text-lightGrey pb-7 md:pb-16"><?php the_field( 'outro_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-5 xl:col-span-5 col-start-1 xl:col-start-1">
        <p class="block-text text-lightGrey"><?php the_field( 'outro_text' ); ?></p>
      </div>
    </div>
  </div>
</section>