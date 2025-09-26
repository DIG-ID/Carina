<section id="section-testimonials" class="section-testimonials relative w-full bg-darkBlue pt-7 md:pt-14 xl:pt-24 pb-8 md:pb-12 xl:pb-20">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
        <h2 class="title-md text-lightGrey pb-6 md:pb-12"><?php the_field( 'testimonials_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-12">
        <div class="swiper swiper-testimonials">
          <?php
          $testimonials_posts = get_field( 'testimonials_cards' );
          if ( $testimonials_posts ) :
            ?>
            <div class="swiper-wrapper items-stretch">
              <?php
              foreach ( $testimonials_posts as $post ) :
                setup_postdata( $post );
                ?>
                <div class="swiper-slide testimonial-card h-auto xl:min-h-64">
                  <div class="testimonial-card-content bg-lightGrey px-4 py-6 md:py-6 md:px-6 xl:py-7 xl:px-8 flex flex-col justify-between min-h-full rounded-lg">
                    <div class="testimonial-card--header">
                      <p class="block-text text-darkBlue"><b><?php the_field( 'name' ); ?></b></p>
                      <p class="block-text text-darkBlue"><?php the_field( 'location' ); ?></p>
                    </div>
                    <div class="testimonial-card--content">
                      <p class="block-text text-darkBlue"><?php the_field( 'message' ); ?></p>
                    </div>
                    <div class="testimonial-card--footer">
                      <p class="block-text text-darkBlue"><?php the_field( 'source' ); ?></p>
                    </div>
                  </div>
                </div>
                <?php
              endforeach;
              ?>
            </div>
            <?php
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-12 flex flex-row justify-center gap-x-10 mt-11">
        <div class="testimonials-swiper-button-prev swiper-button-prev"></div>
        <div class="testimonials-swiper-button-next swiper-button-next"></div>
      </div>
    </div>
  </div>
</section>