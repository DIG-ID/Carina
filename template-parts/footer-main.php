<footer id="footer-main" class="footer-main relative w-full bg-darkBlue pb-6 md:pb-11 xl:pb-6 -mt-1">
	<div class="theme-container border-t border-b border-lightGrey">
    <div class="theme-grid pt-16 md:pt-16 xl:pt-11 pb-12">
      <div class="col-span-2 md:col-span-2 xl:col-span-3 flex flex-col items-start justify-between">
        <div class="address-wrapper mb-8 md:mb-0">
          <p class="block-text text-lightGrey"><?php esc_html_e( 'Adresse','carina' ); ?></p>
          <p class="block-text text-lightGrey"><?php the_field( 'general_address','option' ); ?></p>
        </div>
        <div class="contacts-wrapper">
          <p class="block-text text-lightGrey"><?php esc_html_e( 'Kontaktdaten','carina' ); ?></p>
          <p class="block-text text-lightGrey "><?php esc_html_e( 'Telefon: ','carina' ); ?><a href="tel:<?php the_field( 'general_phone','option' ); ?>" class="text-inline-link"><?php the_field( 'general_phone','option' ); ?></a></p>
          <p class="block-text text-lightGrey"><?php esc_html_e( 'E-Mail: ','carina' ); ?><a href="mailto:<?php the_field( 'general_e-mail','option' ); ?>" class="text-inline-link"><?php the_field( 'general_e-mail','option' ); ?></a></p>
        </div>
      </div>
      <div class="col-span-2 md:col-span-2 xl:col-span-6 flex flex-col md:items-center justify-start py-16 md:py-0">
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
      <div class="col-span-2 md:col-span-2 xl:col-span-3 flex flex-col items-start justify-between mb-8 md:mb-0">
        <div class="w-full mb-12 md:mb-0">
          <p class="block-text text-lightGrey mb-7"><?php the_field( 'newsletter_title','option' ); ?></p>
          <?php 
            $form_shortcode = get_field('newsletter_shortcode', 'option');
            echo do_shortcode($form_shortcode);
          ?>
        </div>
        <div class="w-full flex md:block justify-center md:justify-normal">
          <?php do_action( 'socials' ); ?>
        </div>
      </div>
    </div>
    <div class="theme-grid pb-11 md:pb-16 xl:pb-24">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 flex md:block justify-evenly md:justify-normal mb-7 md:mb-0">
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
                  'class'    => 'h-[73px] w-auto md:mr-16',
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
  <div class="fixed-booking-button fixed bottom-6 left-0 w-full h-auto z-20 flex justify-center items-center">
    <a href="<?php the_field( 'general_booking_url', 'option' ); ?>" class="btn btn-primary px-8 block visible md:hidden md:invisible shadow-md"><?php esc_html_e( 'Jetzt buchen', 'carina' ); ?></a>
  </div>
