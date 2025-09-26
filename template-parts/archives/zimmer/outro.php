<section id="section-outro" class="section-outro bg-darkBlue pb-16 md:pb-14 pt-8 md:pt-12 xl:pt-28">
    <div class="theme-container xl:pb-16">
        <div class="theme-grid">
            <!-- IMAGES -->
            <div class="col-span-1 md:col-span-3 xl:col-span-7 relative">
                <?php if ( $outro_image = get_field('room_outro_image', 'options') ) :
                echo wp_get_attachment_image(
                    $outro_image, 'full', false,
                    [
                    'class'    => 'relative inset-0 w-full h-full object-cover',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                );
                endif; ?>
            </div>
            <div class="col-start-2 col-span-1 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-5 relative ">
                <?php if ( $outro_image_2 = get_field('room_outro_image_2', 'options') ) :
                echo wp_get_attachment_image(
                    $outro_image_2, 'full', false,
                    [
                    'class'    => 'relative inset-0 w-full h-full object-cover',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                );
                endif; ?>
            </div>

            <!-- TEXT CONTENT + BUTTON ON THE RIGHT -->
            <div class="col-span-2 md:col-span-5 xl:col-span-12 flex justify-between items-center xl:items-start flex-col xl:flex-row pt-5 md:pt-8 xl:pt-14">
                <div class="xl:col-span-7">
                    <h2 class="title-md text-lightGrey md:mb-8 xl:mb-20"><?php the_field('room_outro_heading', 'options'); ?></h2>
                    <p class="block-text text-lightGrey max-w-[337px] md:max-w-[502px] xl:max-w-[754px]"><?php the_field('room_outro_text', 'options'); ?></p>
                </div>
                <?php 
                $link = get_field('room_outro_button', 'options');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-arrow-darkBlue bg-lightGrey" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>