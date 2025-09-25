<section id="section-seasons" class="section-seasons relative w-full pb-16 md:pb-24">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="summer-col col-span-2 md:col-span-6 xl:col-span-6 pt-8 md:pt-14 xl:pt-16 block md:flex xl:block md:flex-row md:gap-x-4">
        <div class="image-wrapper relative w-full md:w-1/2 xl:w-full">
          <?php echo wp_get_attachment_image(
            get_field('seasons_summer_image'),
            'full',
            false,
            [
            'class'    => 'w-full h-full bleed-sm',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
          <h3 class="title-30 text-lightGrey absolute bottom-4 left-5"><?php the_field( 'seasons_summer_title' ); ?></h3>
        </div>
        <div class="text-wrapper relative block md:flex md:flex-col xl:block md:items-start md:justify-between w-full md:w-1/2 xl:w-full">
          <p class="block-text text-darkBlue py-8 md:pt-0 xl:pt-6 md:pb-0 xl:pb-12"><?php the_field( 'seasons_summer_text' ); ?></p>
          <?php 
          $link = get_field('seasons_summer_button');
          if( $link ): 
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="btn btn-arrow-darkBlue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
        </div>
      </div>
      <div class="winter-col col-span-2 md:col-span-6 xl:col-span-6 pt-8 md:pt-14 xl:pt-16 block md:flex xl:block md:flex-row md:gap-x-4">
        <div class="image-wrapper relative w-full md:w-1/2 xl:w-full">
          <?php echo wp_get_attachment_image(
            get_field('seasons_winter_image'),
            'full',
            false,
            [
            'class'    => 'w-full h-full bleed-sm',
            'loading'  => 'eager',
            'decoding' => 'async',
            ]
          ); ?>
          <h3 class="title-30 text-lightGrey absolute bottom-4 left-5"><?php the_field( 'seasons_winter_title' ); ?></h3>
        </div>
        <div class="text-wrapper relative block md:flex md:flex-col xl:block md:items-start md:justify-between w-full md:w-1/2 xl:w-full">
          <p class="block-text text-darkBlue py-8 md:pt-0 xl:pt-6 md:pb-0 xl:pb-12"><?php the_field( 'seasons_winter_text' ); ?></p>
          <?php 
          $link = get_field('seasons_winter_button');
          if( $link ): 
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="btn btn-arrow-darkBlue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>