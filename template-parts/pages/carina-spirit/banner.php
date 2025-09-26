<section id="section-banner" class="section-banner relative w-full h-[50dvh] md:h-[60dvh]">
  <?php echo wp_get_attachment_image(
    get_field('banner_image'),
    'full',
    false,
    ['class' => 'absolute inset-0 w-full h-full object-cover -z-10']
  ); ?>
  <span aria-hidden="true" class="absolute inset-0 z-0 bg-[#0F1A1E]/60"></span>
  <div class="theme-container h-full flex flex-col justify-center items-center relative">
    <div class="content-wrapper text-center max-w-[80%] md:max-w-md xl:max-w-xl">
      <h3 class="title-sm text-lightGrey pb-8 md:pb-6 xl:pb-8">
        <?php the_field('banner_title'); ?>
      </h3>
      <p class="block-text text-lightGrey">
        <?php the_field('banner_text'); ?>
      </p>
    </div>
  </div>
</section>
