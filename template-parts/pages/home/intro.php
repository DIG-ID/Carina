<section id="section-intro" class="section-intro relative w-full pt-32 md:pt-36 xl:pt-52 pb-6 md:pb-6 xl:pb-48 bg-darkBlue z-10">
    <div class="theme-container">
        <div class="theme-grid pb-8 md:pb-32 xl:pb-40">
            <div class="col-span-2 md:col-span-6 xl:col-span-8 col-start-1 md:col-start-1 xl:col-start-3">
                <p class="block-text-intro text-lightGrey text-center">
                    <?php the_field( 'intro_intro_text' ); ?>
                </p>
            </div>
        </div>
        <div class="mx-auto grid grid-cols-2 md:grid-cols-6 xl:grid-cols-[284fr_433fr_284fr] gap-x-5 md:gap-x-4 xl:gap-x-8">
            <div class="hidden md:block md:col-span-5 xl:col-span-1 xl:col-start-1 xl:row-start-1 xl:pt-6 pb-0 md:pb-10 xl:pb-0">
                <h2 class="title-md text-lightGrey">
                    <?php the_field( 'intro_slogan_title' ); ?>
                </h2>
            </div>
            <div class="col-span-2 md:col-span-3 md:col-start-2 xl:col-span-1 xl:col-start-2 xl:row-start-1 relative">
                <?php
                    $imgSlogan = get_field('intro_image');
                    $size  = 'full';
                    if ( $imgSlogan ) {echo wp_get_attachment_image(
                        $imgSlogan, $size, false,
                        [
                        'class'    => 'w-full object-cover relative xl:absolute',
                        'loading'  => 'eager',
                        'decoding' => 'async',
                        ]
                    );}
                ?>
            </div>
            <div class="col-span-2 md:col-span-2 md:col-start-5 xl:col-span-1 xl:col-start-3 xl:row-start-1 pt-8 md:pt-0 xl:pt-6 xl:pl-16">
                <p class="block-text text-lightGrey">
                    <?php the_field( 'intro_slogan_text' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>