<section id="section-rooms" class="section-rooms relative w-full pt-0 md:pt-0 xl:pt-20 pb-16 md:pb-24">
  <?php
$images = get_field('rooms_images');

if (is_array($images) && !empty($images)) : ?>
  <div class="swiper bleed-both-swiper">
    <div class="swiper-wrapper items-stretch">
      <?php foreach ($images as $index => $id) :
        $size = ($index % 2 === 0) ? 'slider-bleed-both' : 'slider-bleed-both-portrait';
      ?>
        <div class="swiper-slide h-auto">
          <?php
          echo wp_get_attachment_image(
            (int) $id,
            $size,
            false,
            [
              'class' => 'block h-full xl:h-auto xl:max-h-none object-cover md:max-h-[50dvh] xl:max-h-none',
              'sizes' => '(min-width:768px) 50vw, 100vw',
            ]
          );
          ?>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="swiper-button-next !right-8 xl:right-16"></div>
  </div>
<?php endif; ?>


  <div class="theme-container pt-8 md:pt-12 xl:pt-12">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-12">
          <h2 class="title-md text-darkBlue pb-7 md:pb-16"><?php the_field( 'rooms_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-4 xl:col-span-5">
        <p class="block-text text-darkBlue pb-8 md:pb-0"><?php the_field( 'rooms_text' ); ?></p>
      </div>
      <div class="col-span-2 md:col-span-2 xl:col-span-7 flex flex-col items-start md:items-end justify-center md:justify-end">
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