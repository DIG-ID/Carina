<section id="section-outro" class="section-outro bg-darkBlue pb-7 pt-9 md:pt-11 xl:pt-28">
    <div class="theme-container  xl:pb-16">
        <div class="theme-grid">
            <!-- IMAGES -->
            <div class="col-span-1 md:col-span-3 xl:col-span-7 relative">
                <?php if ( $outro_image = get_field('outro_image') ) :
                echo wp_get_attachment_image(
                    $outro_image, 'full', false,
                    ['class'    => 'relative inset-0 w-full h-full object-cover',]
                );
                endif; ?>
            </div>
            <div class="col-start-2 col-span-1 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-5 relative">
                <?php if ( $outro_image_2 = get_field('outro_image_2') ) :
                echo wp_get_attachment_image(
                    $outro_image_2, 'full', false,
                    ['class'    => 'relative inset-0 w-full h-full object-cover',]
                );
                endif; ?>
            </div>

            <!-- TEXT CONTENT + BUTTON ON THE RIGHT -->
            <div class="col-span-2 md:col-span-5 xl:col-span-12 flex items-center xl:items-start flex-col md:flex-row md:justify-between pt-7 xl:pt-14">
                <div class="xl:col-span-6">
                    <h2 class="title-md text-lightGrey mb-7 xl:mb-20"><?php the_field('outro_heading'); ?></h2>
                    <p class="block-text text-lightGrey mb-7 md:max-w-[530px] xl:max-w-[601px]"><?php the_field('outro_text'); ?></p>
                </div>
                <?php 
                $link = get_field('outro_button');
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