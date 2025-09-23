<section id="section-roomns" class="section-rooms bg-lightGrey xl:pt-10">
  <div class="theme-container pb-6">
    <div class="theme-grid">
      
      <!-- Breadcrumbs -->
      <div class="title-30 xl:mb-4 col-span-12">
        <?php do_action('breadcrumbs'); ?>
      </div>

      <!-- Section heading -->
      <div class="xl:mb-7 col-span-7">
        <h2 class="title-md"><?php the_field('content_title'); ?></h2>
      </div>

      <!-- Repeater -->
      <div class="repeater-container col-span-12">
        <?php if ( have_rows('content_apt') ) : ?>
          
          <?php while ( have_rows('content_apt') ) : the_row();
            // Pull subfields once per row
            $title    = get_sub_field('title');
            $imageID  = get_sub_field('image');
            $space    = get_sub_field('space');
            $desc     = get_sub_field('description');
            $link     = get_sub_field('button');
          ?>

          <!-- One item -->
          <article class="grid grid-cols-1 xl:grid-cols-12 gap-y-10 xl:gap-y-0 xl:gap-x-8 xl:pb-20 overflow-hidden">
            
            <!-- Image column -->
            <div class="xl:col-start-1 xl:col-span-7 relative">
              <?php
              if ( $imageID ) {
                echo wp_get_attachment_image(
                  $imageID,
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
            <div class="xl:col-start-8 xl:col-span-5 flex flex-col">
              <?php if ( $title ) : ?>
                <h3 class="title-30 text-darkBlue xl:mb-7">
                  <?php echo esc_html( $title ); ?>
                </h3>
              <?php endif; ?>

              <?php if ( $space ) : ?>
                <p class="block-17 xl:mb-[76px]">
                  <?php echo esc_html( $spance ); ?>
                </p>
              <?php endif; ?>

              <?php if ( $desc ) : ?>
                <p class="block-17 xl:mb-32">
                  <?php echo esc_html( $desc ); ?>
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
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>