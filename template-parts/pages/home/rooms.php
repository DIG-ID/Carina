<section id="section-rooms" class="section-rooms relative w-full bg-darkBlue">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-3 xl:col-span-5 pt-7 md:pt-12 xl:pt-14 pb-10 md:pb-8 xl:pb-16 flex flex-col justify-between items-start">
                <div class="block-wrapper">
                    <h2 class="title-md text-lightGrey pb-6 md:pb-12 xl:pb-16"><?php the_field( 'rooms_title' ); ?></h2>
                    <p class="block-text text-lightGrey mb-9 md:mb-0"><?php the_field( 'rooms_description' ); ?></p>
                </div>
                <?php 
                $link = get_field('rooms_button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-arrow-lightGrey" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?></a>
            </div>
            <div class="col-span-2 md:col-span-3 xl:col-span-7">
                <?php
                $img = get_field('rooms_image');
                if ( $img ) : ?>
                <picture>
                    <source
                    media="(min-width: 768px)"
                    srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $img, 'full' ) ); ?>"
                    sizes="100vw"
                    />
                    <?php
                    echo wp_get_attachment_image(
                    $img,
                    'large',
                    false,
                    [
                        'class'    => 'block w-full object-cover xl:max-h-screen bleed-sm bleed-right-md h-full',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        'sizes'    => '100vw',
                    ]
                    );
                    ?>
                </picture>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>