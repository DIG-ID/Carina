<section id="section-discover" class="section-discover relative w-full bg-darkBlue py-10 md:pt-14 xl:pt-24 md:pb-14 xl:pb-16">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-8">
        <h2 class="title-md text-lightGrey"><?php the_field( 'discover_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-span-1 xl:col-span-4 flex flex-col items-center md:items-end justify-center md:justify-start pt-7 md:pt-3">
        <?php 
        $link = get_field('discover_button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn btn-block-lightGrey" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>