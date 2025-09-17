<section id="section-relaxation" class="section-relaxation bg-white pt-24 md:pt-24 xl:pt-24 pb-[55px] xl:pb-[150px]">

  <div class="theme-container h-full flex items-end relative z-10">
    <div class="theme-grid">
    
      <div class="col-span-2 md:col-span-3 xl:col-span-5 text-darkBlue">
        <h2 class="title-md mb-[21px] md:mb-[50px] xl:mb-[70px] max-w-[320px] md:max-w-none xl:max-w-[478px]"><?php echo esc_html( get_field('relaxation_title') ); ?></h2>
        <p class="block-text mb-[21px] md:mb-10 xl:mb-32 xl:max-w-[416px]"><?php echo esc_html( get_field('relaxation_description') ); ?></p>
            <?php 
            $link = get_field('relaxation_button');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn btn-arrow-darkBlue mb-10 md:mb-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?></a>
        </div>
        <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-6 xl:col-span-7">
           <?php 
            $image = get_field('relaxation_image');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>


  <div class="theme-container h-full flex items-end relative z-10 mt-[66px] md:mt-28">
    <div class="theme-grid">
        <div class="col-span-2 md:col-span-3 xl:col-start-1 xl:col-span-7 order-2 md:order-none">
             <?php 
            $image = get_field('relaxation_image_2');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>

        <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-5 text-darkBlue">
            <h2 class="title-md mb-[26px] md:mb-[50px] xl:mb-[70px]"><?php echo esc_html( get_field('relaxation_title_2') ); ?></h2>
            <p class="block-text mb-[36px] md:mb-[27px] xl:max-w-[416px] xl:mb-[235px]"><?php echo esc_html( get_field('relaxation_description_2') ); ?></p>
            <?php 
            $link = get_field('relaxation_button_2');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn btn-arrow-darkBlue mb-[32px] md:mb-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?></a>
        </div>
    </div>
  </div>
</section>
