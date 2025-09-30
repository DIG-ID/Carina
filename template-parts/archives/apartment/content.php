<section id="section-apartments" class="section-apartments bg-lightGrey pt-8 md:pt-12 xl:pt-10 pb-[70px] md:pb-24">
  <div class="theme-container">
    <div class="theme-grid">
      
      <!-- Breadcrumbs -->
      <div class="mb-4 xl:mb-4 col-span-2 md:col-span-6 xl:col-span-12">
        <h3 class="title-30"><?php echo get_field('apartment_content_over_title','options'); ?></h3>
      </div>

      <!-- Section heading -->
      <div class="mb-[70px] xl:mb-7 col-span-2 md:col-span-6 xl:col-span-7">
        <h2 class="title-md"><?php the_field('apartment_content_title', 'options'); ?></h2>
      </div>

        <?php
        $args = array(
          'post_type' => 'apartment',
          'posts_per_page' => -1
        );
        $the_query = new WP_Query($args);
        while ($the_query->have_posts()) : $the_query->the_post();
          $description = get_field('content_short_description');
          $title = get_the_title();
          $image   = get_post_thumbnail_id( get_the_ID() );
          $link = get_field('content_button');
          $size = get_field('content_size_max_persons')
        ?>
          <article class="content-wrapper col-span-2 md:col-span-6 xl:col-span-12 theme-grid gap-y-3 md:gap-y-[70px] xl:gap-y-20">
            <!-- Image column -->
            <div class="col-start-1 col-span-2 md:col-span-3 xl:col-span-6 relative">
              <a href="<?php the_permalink(); ?>">
              <?php
              if ( $image ) {
                echo wp_get_attachment_image(
                  $image,
                  'full',
                  false,
                  [
                    'class'    => 'block w-full h-auto',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                  ]
                );
              }
              ?>
              </a>
            </div>
            <!-- Content column -->
            <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-6 flex flex-col">
              <?php if ( $title ) : ?>
              <a href="<?php the_permalink(); ?>">
                <h3 class="title-30 text-darkBlue mb-2 md:mb-0">
                  <?php echo esc_html( $title ); ?>
                </h3>
              </a>
              <?php endif; ?>

              <?php if ( $size ) : ?>
                <p class="block-17 mb-8  xl:mb-16">
                  <?php echo esc_html( $size ); ?>
                </p>
              <?php endif; ?>

              <?php if ( $description ) : ?>
                <p class="block-17 mb-24 md:mb-0">
                  <?php echo esc_html( $description ); ?>
                </p>
              <?php endif; ?>

              <a href="<?php the_permalink(); ?>" class="btn btn-arrow-darkBlue mb-16 md:mb-0 md:mt-auto justify-end">
                  <?php esc_html_e('Mehr erfahren', 'carina'); ?>
              </a>
            </div>
          <?php endwhile; ?>
          </article>
      </div>
    </div>
  </div>
</section>