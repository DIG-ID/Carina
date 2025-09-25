<section id="section-apartments" class="section-apartments bg-lightGrey xl:pt-10">
  <div class="theme-container pb-6">
    <div class="theme-grid">
      
      <!-- Breadcrumbs -->
      <div class="title-30 xl:mb-4 col-span-12">
        <?php echo get_field('apartment_content_over_title','options'); ?>
      </div>

      <!-- Section heading -->
      <div class="xl:mb-7 col-span-7">
        <h2 class="title-md"><?php the_field('apartment_content_title', 'options'); ?></h2>
      </div>

        <?php
        $args = array(
          'post_type' => 'apartment',
          'posts_per_page' => 0
        );
        $the_query = new WP_Query($args);
        while ($the_query->have_posts()) : $the_query->the_post();
          $description = get_field('content_description');
          $title = get_field('content_title');
          $image   = get_post_thumbnail_id( get_the_ID() );
          $link = get_field('content_button');
        ?>
            <!-- Image column -->
            <div class="xl:col-start-1 xl:col-span-6 relative">
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
            </div>
            <!-- Content column -->
            <div class="xl:col-start-7 xl:col-span-6 flex flex-col">
              <?php if ( $title ) : ?>
                <h3 class="title-30 text-darkBlue xl:mb-7">
                  <?php echo esc_html( $title ); ?>
                </h3>
              <?php endif; ?>

              <?php if ( $description ) : ?>
                <p class="block-17 xl:mb-32">
                  <?php echo esc_html( $description ); ?>
                </p>
              <?php endif; ?>

              <?php if ( $link ) :
                $link_url    = $link['url'];
                $link_title  = $link['title'];
                $link_target = !empty($link['target']) ? $link['target'] : '_self';
                if ( $link_url && $link_title ) : ?>
                  <a class="btn btn-arrow-darkBlue"
                     href="<?php echo esc_url( $link_url ); ?>"
                     target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                  </a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </article>
          <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>