<section id="section-hero" class="section-hero relative w-full max-h-[65dvh] z-20 bg-darkBlue">
  <figure class="max-h-[65dvh]">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(
        'full',
        ['class' => 'w-full h-auto max-h-[65dvh] object-cover -z-10',]
      ); ?>
    <?php endif; ?>
  </figure>
</section>