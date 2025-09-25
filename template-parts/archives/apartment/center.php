<?php $background_id = get_field('apartment_text_center_image', 'options'); ?>

<section id="section-text-center" class="section-text-center text-center relative z-10 bg-center bg-cover bg-no-repeat"
  <?php if ( $background_id ): ?>
    style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url( $background_id, 'full' ) ); ?>');"
  <?php endif; ?>>

  <!-- CONTENT -->

  <div class="theme-container relative">
    <div class="flex flex-col items-center py-36">
      <h2 class="title-md text-lightGrey mb-7 md:mb-9 xl:mb-6 max-w-[661px]">
        <?php echo esc_html( get_field('apartment_text_center_title', 'options') ); ?>
      </h2>
      <p class="block-text text-lightGrey max-w-[532px] xl:mb-20">
        <?php echo esc_html( get_field('apartment_text_center_description', 'options') ); ?>
      </p>
      <?php if ( $link = get_field('apartment_text_center_button', 'options') ):
        $link_url    = $link['url'] ?? '';
        $link_title  = $link['title'] ?? '';
        $link_target = !empty($link['target']) ? $link['target'] : '_self';
        if ( $link_url && $link_title ): ?>
          <a class="btn btn-arrow-lightGrey"
             href="<?php echo esc_url($link_url); ?>"
             target="<?php echo esc_attr($link_target); ?>">
            <?php echo esc_html($link_title); ?>
          </a>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</section>