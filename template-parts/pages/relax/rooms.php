<section id="section-rooms" class="section-rooms relative w-full pt-8 md:pt-14 xl:pt-20 pb-16 md:pb-24">
  <?php
  $images = get_field('rooms_images');
  if ($images) : ?>
    <div class="swiper bleed-both-swiper">
      <div class="swiper-wrapper">
        <?php foreach ($images as $image) :
          $id      = is_array($image) ? ($image['ID'] ?? $image['id'] ?? 0) : (int)$image;
          $alt     = is_array($image) ? trim($image['alt'] ?? '') : trim(get_post_meta($id, '_wp_attachment_image_alt', true));
          $caption = is_array($image) ? ($image['caption'] ?? '') : wp_get_attachment_caption($id);
          if (!$alt) $alt = get_the_title($id);
        ?>
          <div class="swiper-slide">
            <?php echo wp_get_attachment_image(
              $id,
              'slider-bleed-both',
              false,
              [
              'class'    => 'w-full h-full',
              'loading'  => 'eager',
              'decoding' => 'async',
              ]
            ); ?>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-button-next right-4 xl:right-16"></div>
    </div>
  <?php endif; ?>
  <div class="theme-container pt-8 md:pt-12 xl:pt-12">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-12">
          <h2 class="title-md text-darkBlue pb-7 md:pb-16"><?php the_field( 'rooms_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-5 xl:col-span-5">
        <p class="block-text text-darkBlue"><?php the_field( 'rooms_text' ); ?></p>
      </div>
      <div class="col-span-2 md:col-span-2 xl:col-span-7 flex flex-col items-center md:items-end justify-center md:justify-end">
        <?php 
        $link = get_field('rooms_button');
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
</section>