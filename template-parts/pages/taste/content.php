<section id="section-content" class="section-content relative w-full pt-7 md:pt-16 pb-16 md:pb-24">
  <div class="theme-container">
    <div class="theme-grid mb-16 xl:mb-20">
        <div class="col-span-2 md:col-span-3 xl:col-span-5">
          <h2 class="title-md text-darkBlue pb-8 md:pb-12 xl:pb-20"><?php the_field( 'content_title' ); ?></h2>
          <p class="block-text text-darkBlue pb-6 md:pb-0"><?php the_field( 'content_text' ); ?></p>
        </div>
        <div class="col-span-2 md:col-span-3 xl:col-span-7">
          <?php echo wp_get_attachment_image(
            get_field('content_image'),
            'full', false,
            ['class' => 'w-full object-cover',]
          ); ?>
        </div>
    </div>
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-3 xl:col-span-7 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-7 gap-x-5 md:gap-x-4 xl:gap-x-8">
        <div class="col-span-2 md:col-span-3 xl:col-span-7">
          <?php echo wp_get_attachment_image(
            get_field('content_image_2'),
            'full', false,
            ['class' => 'w-full object-cover mb-6 md:mb-0 xl:mb-14',]
          ); ?>
        </div>
        <div class="col-span-2 md:col-span-3 xl:col-span-5">
          <h2 class="title-md text-darkBlue pb-8 md:pb-12 xl:pb-16"><?php the_field( 'content_title_2' ); ?></h2>
          <p class="block-text text-darkBlue pb-6 md:pb-0"><?php the_field( 'content_text_2' ); ?></p>
        </div>
      </div>
      <div class="col-span-2 md:col-span-3 xl:col-span-5 md:pt-20 xl:pt-56">
        <p class="block-30 text-darkBlue mb-8"><?php the_field( 'content_opening_hours' ); ?></p>
        <?php echo wp_get_attachment_image(
          get_field('content_image_3'),
          'full', false,
          ['class'    => 'w-full object-cover mb-8',]
        ); ?>
        <div class="flex flex-col items-start justify-start gap-y-6">
          <?php if ( have_rows('content_download_list') ) :
            $i = 0; // start at 0 so first is darkBlue
            while ( have_rows('content_download_list') ) : the_row();
              $link = get_sub_field('button');
              if ( $link ) :
                $link_url   = $link['url'];
                $link_title = $link['title'];
                $link_target= $link['target'] ? $link['target'] : '_self';

                $variant = ( get_row_index() % 2 === 1 ) ? 'btn-download-darkBlue' : 'btn-download-darkBlue';
                ?>
                <a class="btn <?php echo esc_attr($variant); ?>"
                  href="<?php echo esc_url($link_url); ?>"
                  target="<?php echo esc_attr($link_target); ?>">
                  <?php echo esc_html($link_title); ?>
                </a>
              <?php endif;
              $i++; // increment each loop
            endwhile;
          endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>