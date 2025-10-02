<section id="section-content" class="section-content relative w-full pt-12 pb-16 md:pb-24 xl:pb-16">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-4 xl:col-span-4 order-2 xl:order-1">
        <h2 class="title-md text-darkBlue pb-8 xl:pb-14"><?php the_field( 'content_title' ); ?></h2>
        <p class="block-text text-darkBlue"><?php the_field( 'content_text' ); ?></p>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-8 mb-7 md:mb-8 xl:mb-0 order-1 xl:order-2">
        <?php echo wp_get_attachment_image(
          get_field('content_image'),
          'full', false,
          ['class' => 'w-full object-cover']
        ); ?>
      </div>
    </div>
  </div>
</section>