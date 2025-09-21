<section id="section-food-banner" class="section-food-banner relative w-full">
  <div class="w-full px-1 md:px-3 xl:px-6 pt-1 pb-44 sm:pb-20 md:pt-3 xl:pt-6 md:pb-32 lg:pb-16 xl:pb-10 relative">
    <div class="background-wrapper relative">
      <?php echo wp_get_attachment_image(
        get_field('food_banner_background_image'),
        'full',
        false,
        [
        'class'    => 'inset-0 w-full h-full object-cover -z-10',
        'loading'  => 'eager',
        'decoding' => 'async',
        ]
      ); ?>
      <?php if( get_field( 'food_banner_title' ) ) : ?>
        <h2 class="title-md text-lightGrey pl-5 md:pl-4 xl:pl-5 z-10 absolute bottom-2 left-0 max-w-[36%] md:max-w-80 xl:max-w-lg"><?php the_field( 'food_banner_title' ); ?></h2>
      <?php endif; ?>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-6 xl:grid-cols-12 gap-x-5 md:gap-x-4 xl:gap-x-0 px-1 md:px-7 xl:px-6 absolute left-0 bottom-0">
      <div class="col-span-2 md:col-span-3 xl:col-span-4 col-start-1 md:col-start-4 xl:col-start-8">
        <div class="bg-lightGrey px-4 md:px-7 xl:px-8 py-2 md:pt-6 xl:pt-9 xl:pb-0 w-3/5 float-right md:float-none md:w-full">
          <?php if( get_field( 'food_banner_description' ) ) : ?>
            <p class="block-text mb-6"><?php the_field( 'food_banner_description' ); ?></p>
          <?php endif; ?>
          <?php 
          $link = get_field('food_banner_button');
          if( $link ): 
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="btn btn-arrow-darkBlue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?></a>
        </div>
      </div>
    </div>
  </div>
</section>