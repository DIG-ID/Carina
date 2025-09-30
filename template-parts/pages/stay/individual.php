<section id="section-individual" class="section-individual bg-white pt-14 md:pt-12 xl:pt-[70px] pb-[70px] md:pb-24 xl:pb-24">

  <div class="theme-container h-full flex items-end relative z-10">
    <div class="theme-grid">
    
      <div class="col-span-2 md:col-span-3 xl:col-span-7 text-darkBlue">
        <h2 class="title-md mb-[21px] md:mb-12 xl:mb-[70px]"><?php echo esc_html( get_field('individual_title') ); ?></h2>
        <p class="block-text mb-[21px] md:mb-12 xl:mb-[70px] xl:max-w-[430px]"><?php echo esc_html( get_field('individual_description') ); ?></p>
            <?php 
            $link = get_field('individual_button');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn btn-arrow-darkBlue mb-[21px] md:mb-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
        <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-5">
           <?php
              $individual_image = get_field('individual_image');
              $size  = 'full';
              if ( $individual_image) {echo wp_get_attachment_image(
                  $individual_image, $size, false,
                  ['class'    => 'h-full w-full object-cover',]
              );}
              ?>
        </div>
      </div>
    </div>
  </div>


  <div class="theme-container h-full flex items-end relative z-10 pt-[70px] md:pt-24">
    <div class="theme-grid">
        <div class="col-span-2 md:col-span-3 xl:col-start-1 xl:col-span-6 order-2 md:order-none">
            <?php
              $individual_image_2 = get_field('individual_image_2');
              $size  = 'full';
              if ( $individual_image_2 ) {echo wp_get_attachment_image(
                  $individual_image_2, $size, false,
                  ['class'    => 'h-full w-full object-cover',]
              );}
              ?>
        </div>

        <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-5 text-darkBlue  items-start">
            <div class="block-wrapper">
              <h2 class="title-md mb-8 md:mb-12 xl:mb-[70px] md:max-w-[300px] xl:max-w-full"><?php echo esc_html( get_field('individual_title_2') ); ?></h2>
              <p class="block-text xl:max-w-[416px] mb-8 md:mb-12 xl:mb-[70px]"><?php echo esc_html( get_field('individual_description_2') ); ?></p>
            </div>
            <?php 
            $link = get_field('individual_button_2');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn btn-arrow-darkBlue mb-[32px]" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
    </div>
  </div>
</section>
