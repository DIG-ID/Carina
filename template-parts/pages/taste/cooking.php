<section id="section-cooking" class="section-cooking relative w-full bg-darkBlue py-11 md:py-20">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-3 xl:col-span-5 flex flex-col justify-between items-start order-2 md:order-1">
                <div class="block-wrapper">
                    <h2 class="title-md text-lightGrey pb-6 md:pb-12 xl:pb-16"><?php the_field( 'cooking_title' ); ?></h2>
                    <p class="block-text text-lightGrey mb-9 md:mb-0"><?php the_field( 'cooking_text' ); ?></p>
                </div>
            </div>
            <div class="col-span-2 md:col-span-3 xl:col-span-7 order-1 md:order-2">
                <?php
                $img = get_field('cooking_image');
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
                    'full',
                    false,
                    [
                        'class'    => 'block w-full object-cover mb-5 md:mb-0',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                    ]
                    );
                    ?>
                </picture>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>