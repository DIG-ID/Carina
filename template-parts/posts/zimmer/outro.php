<section id="section-outro" class="section-outro bg-darkBlue pb-20 md:pb-14 pt-9 xl:pt-28">
    <div class="theme-container xl:pb-16">
        <div class="theme-grid">
            <!-- IMAGES -->
            <div class="col-span-2 md:col-span-6 xl:col-span-12 relative">
                <?php if ( $outro_image = get_field('outro_image') ) :
                echo wp_get_attachment_image(
                    $outro_image, 'full', false,
                    [
                    'class'    => 'relative inset-0 w-full h-auto object-cover',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                );
                endif; ?>
            </div>
            <!-- TEXT CONTENT + BUTTON ON THE RIGHT -->
            <div class="col-span-2 md:col-span-6 xl:col-start-1 xl:col-span-6 pt-4 md:pt-9 xl:pt-14">
                    <h2 class="title-md text-lightGrey mb-8 xl:mb-10 max-w-[274px] md:max-w-[672px] xl:max-w-full"><?php the_field('outro_heading'); ?></h2>
            </div>
            <div class="col-span-2 md:col-span-4 xl:col-start-1 xl:col-span-6">
                    <p class="block-text text-lightGrey max-w-[337px] md:max-w-[519px] xl:max-w-[560px] mb-8 md:mb-0"><?php the_field('outro_text'); ?></p>
                </div>
                <div class="md:col-start-5 md:col-span-2 xl:col-start-7 xl:col-span-6 flex justify-end items-start">
                <?php 
                $link = get_field('outro_button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-arrow-lightGrey" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>