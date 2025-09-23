<section id="apartments" class="apartments relative overflow-hidden bg-lightGrey xl:pt-16">
  <div class="theme-container">
    <div class="theme-grid">

      <!-- Previous/next buttons -->
      <div class="col-span-2 md:col-span-6 xl:col-span-12 flex w-full xl:pb-24">
        <div>
          <?php if ( $prev = get_previous_post() ) : ?>
            <a class="btn btn-arrow-previous" href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>">
              <?php echo esc_html__( 'Zurück zur Zimmerübersicht', 'carina' ); ?>
            </a>
          <?php endif; ?>
        </div>
        <div class="ml-auto">
          <?php if ( $next = get_next_post() ) : ?>
            <a class="btn btn-arrow-next" href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
              <?php echo esc_html__( 'Nächstes Zimmer', 'carina' ); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- CONTENT (LEFT WRAPPER) -->
      <div class="col-span-2 md:col-span-6 xl:col-start-1 xl:col-span-6">
        <!-- Title -->
        <h2 class="title-md text-veryDarkBlue xl:mb-16">
          <?php echo esc_html( get_field('content_title') ); ?>
        </h2>

        <!-- Description -->
        <p class="block-17 text-darkBlue xl:mb-16 xl:max-w-[530px]">
          <?php echo esc_html( get_field('content_description') ); ?>
        </p>

        <!-- Button -->
        <?php if ( $link = get_field('content_button') ) :
          $link_url    = $link['url'] ?? '';
          $link_title  = $link['title'] ?? '';
          $link_target = ! empty($link['target']) ? $link['target'] : '_self';
          if ( $link_url && $link_title ) : ?>
            <a class="btn btn-primary xl:mb-32 max-w-[150px]"
               href="<?php echo esc_url( $link_url ); ?>"
               target="<?php echo esc_attr( $link_target ); ?>">
              <?php echo esc_html( $link_title ); ?>
            </a>
        <?php endif; endif; ?>

        <!-- Icons row -->
        <div class="flex gap-10 xl:gap-20">
          <!-- Room size -->
          <div class="flex flex-col justify-end items-start">
            <svg aria-hidden="true" class="mb-3 w-[90px] h-[64px]" viewBox="0 0 90 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M83.4651 23.0563V62.3811H1V1.37891H22.9382V44.0291" stroke="#FF595A" stroke-width="2" stroke-linejoin="round"/>
              <path d="M76.3301 29.9997L83.4997 21.7734L88.8769 29.9997" stroke="#FF595A" stroke-width="2" stroke-linejoin="round"/>
              <path d="M55.2362 31.2852V44.1812H49.5218V29.879C49.5218 27.1848 48.3634 25.8546 46.3664 25.8546C43.2109 25.8546 41.4128 29.6845 41.4128 34.4134V44.1812H35.6984V29.879C35.6984 27.1848 34.5371 25.8546 32.5401 25.8546C29.3846 25.8546 27.6268 29.6845 27.6268 34.4134V44.1812H21.8721V24.6428H27.6268V30.7808C28.425 26.8692 30.6237 24.2539 34.6984 24.2539C38.7731 24.2539 41.2888 26.8692 41.3724 31.0119C42.1706 26.9875 44.3261 24.2539 48.5247 24.2539C52.7234 24.2539 55.2362 26.9875 55.2362 31.2852Z" fill="#FF595A"/>
              <path d="M57.6533 25.4239L60.1719 23.1581C63.4859 20.1849 65.2091 18.3503 65.2091 16.3578C65.2091 14.8726 64.2495 13.6608 62.1689 13.6608C60.7713 13.6608 59.5725 14.3259 58.8146 14.8726L57.9761 13.0746C59.0538 12.2151 60.852 11.4316 62.849 11.4316C66.6038 11.4316 68.1628 13.7764 68.1628 15.8477C68.1628 18.8152 65.8863 20.9683 62.849 23.5441L61.6099 24.6376V24.7165H68.4423V26.8639H57.6533V25.4182V25.4239Z" fill="#FF595A"/>
            </svg>
            <h3 class="title-sm text-darkBlue">
              <?php echo esc_html( get_field('content_room_size') ); ?>
            </h3>
          </div>

          <!-- Capacity -->
          <div class="flex flex-col items-start">
            <svg aria-hidden="true" class="mb-3 w-[80px] h-[93px]" viewBox="0 0 80 93" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M23.4891 13.3363C24.1351 12.1445 24.505 10.7612 24.505 9.29218C24.505 4.75938 20.9935 1.08398 16.6567 1.08398C12.32 1.08398 8.81129 4.75938 8.81129 9.29218C8.81129 13.825 12.3228 17.5004 16.6567 17.5004C25.3046 17.5004 32.3163 24.8283 32.3163 33.871V50.2588C32.3163 52.5167 30.5691 54.3429 28.4092 54.3429H28.4035C26.2465 54.3429 24.4936 56.2006 24.4936 58.4584V87.1585C24.4936 89.4164 22.7464 91.2426 20.5894 91.2426M16.651 58.4556V87.1557C16.651 89.4135 14.9038 91.2398 12.744 91.2398C10.5841 91.2398 8.81413 89.4135 8.81413 87.1557V58.4556C8.81413 56.2206 7.09821 54.3744 4.96398 54.3401H4.87861C2.72161 54.3401 1 52.4481 1 50.1902V33.8682C1 27.7778 4.13021 22.5162 8.85682 19.6725M69.6966 13.3363C70.3426 12.1445 70.7125 10.7612 70.7125 9.29218C70.7125 4.75938 67.201 1.08398 62.8643 1.08398C58.5275 1.08398 55.0188 4.75938 55.0188 9.29218C55.0188 13.825 58.5303 17.5004 62.8643 17.5004C71.5122 17.5004 78.5238 24.8283 78.5238 33.871V50.2588C78.5238 52.5167 76.7766 54.3429 74.6167 54.3429H74.6111C72.4541 54.3429 70.7011 56.2006 70.7011 58.4584V87.1585C70.7011 89.4164 68.9539 91.2426 66.7969 91.2426M62.8586 58.4556V87.1557C62.8586 89.4135 61.1113 91.2398 58.9515 91.2398C56.7917 91.2398 55.0217 89.4135 55.0217 87.1557V58.4556C55.0217 56.2206 53.3057 54.3744 51.1715 54.3401H51.0861C48.9291 54.3401 47.2075 52.4481 47.2075 50.1902V33.8682C47.2075 27.7778 50.3377 22.5162 55.0643 19.6725" stroke="#FF595A" stroke-width="2" stroke-linejoin="round"/>
            </svg>
            <h3 class="title-sm text-darkBlue">
              <?php echo esc_html( get_field('content_capacity') ); ?>
            </h3>
          </div>
        </div>
      </div>

      <!-- IMAGE (RIGHT SIDE) -->
      <div class="col-span-2 md:col-span-6 xl:col-start-7 xl:col-span-6 xl:pb-24">
        <?php if ( $content_image = get_field('content_image') ) :
          echo wp_get_attachment_image(
            $content_image,
            'full',
            false,
            [
              'class'    => 'block w-full h-auto object-cover',
              'loading'  => 'eager',
              'decoding' => 'async',
            ]
          );
        endif; ?>
      </div>
    </div>
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12">
        <p class="title-30 text-darkBlue"><?php echo get_field('content_slider_title') ?></p>
        <div class="swiper aps-slider">
          <div class="swiper-wrapper">
            <?php if ($rooms_slider = get_field('content_rooms_slider')) :
              foreach ($rooms_slider as $id) : ?>
                <div class="swiper-slide slider-image">
                  <?php echo wp_get_attachment_image($id, 'full', false, ['class'=>'block w-full h-auto']); ?>
                </div>
            <?php endforeach; endif; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </div>
  </div>
</section>