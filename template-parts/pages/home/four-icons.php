<section id="section-four-icons" class="section-four-icons relative w-full pt-28 md:pt-36 xl:pt-72 pb-20 md:pb-24 xl:pb-16 bg-lightGrey z-0">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 mb-16">
                <h2 class="title-md text-darkBlue text-center"><?php the_field( 'four_icons_title' ); ?></h2>
            </div>
        </div>
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-3 xl:col-span-5 col-start-1 xl:col-start-2">
                <?php
                if( have_rows('four_icons_left_list') ):
                    while( have_rows('four_icons_left_list') ) : the_row(); ?>
                    <div class="icon-block-wrapper flex flex-row mb-12 md:mb-16 xl:mb-24 items-center">
                        <div class="w-1/5">
                            <?php
                            $icon = get_sub_field('icon');
                            $size  = 'full';
                            if ( $icon ) {echo wp_get_attachment_image(
                                $icon, $size, false,
                                [
                                'class'    => 'w-full max-w-[75px] object-cover mx-auto',
                                'loading'  => 'eager',
                                'decoding' => 'async',
                                ]
                            );}
                            ?>
                        </div>
                        <div class="w-4/5 pl-6">
                            <h3 class="title-sm text-darkBlue pb-5"><?php the_sub_field('title'); ?></h3>
                            <p class="block-text text-darkBlue"><?php the_sub_field( 'text' ); ?></p>
                        </div>
                    </div>
                    <?php 
                    endwhile;
                endif; ?>
            </div>
            <div class="col-span-2 md:col-span-3 xl:col-span-6">
                <?php
                if( have_rows('four_icons_right_list') ):
                    while( have_rows('four_icons_right_list') ) : the_row(); ?>
                    <div class="icon-block-wrapper flex flex-row mb-12 md:mb-16 xl:mb-24 items-center">
                        <div class="w-1/5">
                            <?php
                            $icon = get_sub_field('icon');
                            $size  = 'full';
                            if ( $icon ) {echo wp_get_attachment_image(
                                $icon, $size, false,
                                [
                                'class'    => 'w-full max-w-[75px] object-cover mx-auto',
                                'loading'  => 'eager',
                                'decoding' => 'async',
                                ]
                            );}
                            ?>
                        </div>
                        <div class="w-4/5 pl-6">
                            <h3 class="title-sm text-darkBlue pb-5"><?php the_sub_field('title'); ?></h3>
                            <p class="block-text text-darkBlue"><?php the_sub_field( 'text' ); ?></p>
                        </div>
                    </div>
                    <?php 
                    endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>