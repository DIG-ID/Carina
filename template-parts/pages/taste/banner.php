<section id="section-banner" class="section-banner relative w-full pb-16 md:pb-24 xl:pb-16">
  <div class="w-full pt-1 pb-44 sm:pb-20 md:pb-56 lg:pb-56 xl:pb-64 relative">
    <div class="background-wrapper relative">
      <?php echo wp_get_attachment_image(
        get_field('banner_background_image'),
        'full',
        false,
        [
        'class'    => 'inset-0 w-full h-full max-h-[80dvh] object-cover -z-10',
        'loading'  => 'eager',
        'decoding' => 'async',
        ]
      ); ?>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-6 xl:grid-cols-12 gap-x-5 md:gap-x-4 xl:gap-x-0 px-1 md:px-7 xl:px-6 absolute left-0 bottom-0">
      <div class="col-span-2 md:col-span-5 ld:col-span-4 xl:col-span-6 2xl:col-span-4 col-start-1 md:col-start-2 lg:col-start-3 xl:col-start-7 2xl:col-start-8">
        <div class="bg-lightGrey px-4 md:px-7 xl:px-8 py-2 md:pt-6 xl:pt-9 xl:pb-0 w-3/5 float-right md:float-none md:w-full">
          <?php if( get_field( 'banner_title' ) ) : ?>
            <h2 class="title-md text-darkBlue pb-9"><?php the_field( 'banner_title' ); ?></h2>
          <?php endif; ?>
          <?php if( get_field( 'banner_text' ) ) : ?>
            <p class="block-text text-darkBlue mb-6"><?php the_field( 'banner_text' ); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>