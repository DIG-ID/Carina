<?php $background_id = get_field('text_center_image'); ?>
<?php
  $style = '';
  if ( $background_id ) {
    $bg_url  = esc_url( wp_get_attachment_image_url( $background_id, 'full' ) );
    $overlay = 'linear-gradient(#0F1A1E99, #0F1A1E99)';
    $style   = "background-image: {$overlay}, url('{$bg_url}');";
  }
?>

<section id="section-text-center"
  class="section-text-center text-center relative z-10 bg-center bg-cover bg-no-repeat"
  <?php if ($style) : ?>style="<?php echo $style; ?>"<?php endif; ?>>

  <!-- CONTENT -->

  <div class="theme-container relative">
    <div class="flex flex-col items-center py-36">
      <h2 class="title-md text-lightGrey mb-7 md:mb-9 xl:mb-6 max-w-[661px]">
        <?php echo esc_html( get_field('text_center_title') ); ?>
      </h2>
      <p class="block-text text-lightGrey max-w-[532px] xl:mb-20">
        <?php echo esc_html( get_field('text_center_description') ); ?>
      </p>
      <?php if ( $link = get_field('text_center_button') ):
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