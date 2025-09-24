<section id="section-intro" class="section-intro relative w-full pt-8 md:pt-14 xl:pt-20 pb-16 md:pb-24">
    <div class="theme-container">
      <div class="theme-grid">
        <div class="col-span-2 md:col-span-6 xl:col-span-12">
          <div class="background-wrapper relative mb-8 md:mb-12">
            <?php echo wp_get_attachment_image(
              get_field('intro_image'),
              'full',
              false,
              [
              'class'    => 'inset-0 w-full h-full object-cover -z-10',
              'loading'  => 'eager',
              'decoding' => 'async',
              ]
            ); ?>
          </div>
        </div>
      </div>
      <div class="theme-grid">
        <div class="col-span-2 md:col-span-4 xl:col-span-5">
            <p class="block-text text-darkBlue"><?php the_field( 'intro_text' ); ?></p>
        </div>
      </div>
    </div>
</section>