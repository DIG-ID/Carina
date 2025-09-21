<footer id="footer-main" class="footer-main relative w-full bg-darkBlue pt-3 md:pt-6 pb-6 md:pb-11 xl:pb-6 -mt-1">
	<div class="theme-container border-t border-b border-lightGrey">
    <div class="theme-grid pt-16 md:pt-16 xl:pt-11 pb-12">
      <div class="col-span-2 md:col-span-2 xl:col-span-3 flex flex-col items-start justify-between">
        <div class="address-wrapper">
          <p class="font-funnelsans text-xl tracking-[0.0313rem] font-semibold text-lightGrey"><?php esc_html_e( 'Adresse','carina' ); ?></p>
          <p class="block-text text-lightGrey"><?php the_field( 'general_address','option' ); ?></p>
        </div>
        <div class="contacts-wrapper">
          <p class="font-funnelsans text-xl tracking-[0.0313rem] font-semibold text-lightGrey"><?php esc_html_e( 'Kontaktdaten','carina' ); ?></p>
          <p class="block-text text-lightGrey"><?php esc_html_e( 'Telefon: ','carina' ); ?><a href="tel:<?php the_field( 'general_phone','option' ); ?>"><?php the_field( 'general_phone','option' ); ?></a></p>
          <p class="block-text text-lightGrey"><?php esc_html_e( 'E-Mail: ','carina' ); ?><a href="mailto:<?php the_field( 'general_e-mail','option' ); ?>"><?php the_field( 'general_e-mail','option' ); ?></a></p>
        </div>
      </div>
      <div class="col-span-2 md:col-span-2 xl:col-span-6 flex flex-col items-center justify-start">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer-menu',
              'container'      => false,
              'menu_class'     => 'footer-menu-nav',
              'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'fallback_cb'    => '__return_false',
            )
          );
        ?>
      </div>
      <div class="col-span-2 md:col-span-2 xl:col-span-3 flex flex-col items-start justify-between">
        <p class="font-funnelsans text-xl tracking-[0.0313rem] font-semibold text-lightGrey leading-8 mb-7"><?php the_field( 'newsletter_title','option' ); ?></p>
        <?php 
          $form_shortcode = get_field('newsletter_shortcode', 'option');
          echo do_shortcode($form_shortcode);
        ?>
        <?php do_action( 'socials' ); ?>
      </div>
    </div>
    <div class="theme-grid pb-11 md:pb-16 xl:pb-24">
      <div class="col-span-2 md:col-span-6 xl:col-span-12">
      <?php
      if( have_rows('partner_logos','option') ):
          while( have_rows('partner_logos','option') ) : the_row(); ?>
            <a href="<?php the_sub_field('link'); ?>" target="_blank" rel="noopener" class="inline-block">
            <?php 
              $img = get_sub_field('image');
              $size  = 'full';
              if ( $img ) {
                echo wp_get_attachment_image(
                  $img,
                  $size,
                  false,
                  [
                  'class'    => 'h-[73px] w-auto mr-16',
                  'loading'  => 'eager',
                  'decoding' => 'async',
                  ]
                );
              }
            ?>
            </a>
      <?php endwhile;
      endif; ?>
      </div>
    </div>
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-8 col-start-1 xl:col-start-3 pb-11 md:pb-16 xl:pb-20">
        <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
          <?php
            $imgLogo = get_field('general_theme-logo_light','option');
            $size  = 'full';

            if ( $imgLogo ) {
            echo wp_get_attachment_image(
              $imgLogo,
              $size,
              false,
              [
              'class'    => 'w-full h-auto',
              'loading'  => 'eager',
              'decoding' => 'async',
              ]
            );
            }
          ?>
        </a>
      </div>
    </div>
  </div>
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center pt-6 md:pt-9 pb-3 md:pb-6 xl:py-6">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'copyright-menu',
              'container'      => false,
              'menu_class'     => 'copyright-menu-nav',
              'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'fallback_cb'    => '__return_false',
            )
          );
        ?>
      </div>
      <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
        <p class="block-text text-lightGrey">&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>. <?php esc_html_e( 'Alle Rechte vorbehalten.','carina' ); ?></p>
      </div>
    </div>
  </div>
</footer>
