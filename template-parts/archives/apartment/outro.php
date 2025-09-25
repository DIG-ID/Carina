<section id="section-outro" class="section-outro bg-darkBlue xl:pt-28">
    <div class="theme-container border-b-[1px] xl:pb-16">
        <div class="theme-grid">
            <!-- IMAGES -->
            <div class="xl:col-span-7 relative">
                <?php if ( $outro_image = get_field('apartment_outro_image', 'options') ) :
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
            <div class="xl:col-start-8 xl:col-span-5 relative ">
                <?php if ( $outro_image_2 = get_field('apartment_outro_image_2', 'options') ) :
                echo wp_get_attachment_image(
                    $outro_image_2, 'full', false,
                    [
                    'class'    => 'relative inset-0 w-full h-auto object-cover',
                    'loading'  => 'eager',
                    'decoding' => 'async',
                    ]
                );
                endif; ?>
            </div>

            <!-- TEXT CONTENT + BUTTON ON THE RIGHT -->
            <div class="xl:col-span-12 flex justify-between items-center xl:items-start flex-col xl:flex-row xl:pt-14">
                <div class="xl:col-span-7">
                    <h2 class="title-md text-lightGrey mb-20"><?php the_field('apartment_outro_heading', 'options'); ?></h2>
                    <p class="block-text text-lightGrey xl:max-w-[754px]"><?php the_field('apartment_outro_text', 'options'); ?></p>
                </div>
                <?php 
                $link = get_field('apartment_outro_button', 'options');
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