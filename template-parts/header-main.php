<header id="header-main" class="header-main w-full z-50 overflow-hidden" itemscope itemtype="http://schema.org/WebSite">
    <nav class="navbar fixed z-50 w-full py-[38px]" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu','carina' );  ?>">
        <div class="theme-container">
            <div class="grid grid-cols-3">
                <div class="col-span-1 flex items-center justify-start text-lightGrey">
                    <div class="menu-toggle-wrapper">
                        <button id="menuToggle" class="menu-toggle" aria-label="Menu">
                            <span class="menu-toggle__bars">
                                <span class="bar bar--top"></span>
                                <span class="bar bar--middle"></span>
                                <span class="bar bar--bottom"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="col-span-1 flex items-center justify-center">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
                        <?php
                            $imgLogo = get_field('general_theme-logo','option');
                            $size  = 'full';

                            if ( $imgLogo ) {
                            echo wp_get_attachment_image(
                                $imgLogo,
                                $size,
                                false,
                                [
                                'class'    => 'w-40',
                                'loading'  => 'eager',
                                'decoding' => 'async',
                                ]
                            );
                            }
                        ?>
                    </a>
                </div>
                <div class="col-span-1 flex items-center justify-end">
                    <a href="<?php the_field( 'general_booking_url','option' ); ?>" class="btn btn-primary"><?php esc_html_e( 'Jetzt buchen','carina' ); ?></a>
                </div>
            </div>
        </div>
    </nav>
	

</header>
