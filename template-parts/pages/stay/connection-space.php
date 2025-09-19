<section id="section-connection-space" class="section-connection-space bg-white pt-24 md:pt-24 pb-[55px] xl:py-20">
    <div class="theme-container h-full flex items-end relative z-10">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-3 xl:col-start-1 xl:col-span-6 order-2 md:order-none">
                <?php 
                $image = get_field('connection_space_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>

            <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-6 text-darkBlue">
                <h2 class="title-md mb-[26px] md:mb-[50px] xl:mb-16"><?php echo esc_html( get_field('connection_space_title') ); ?></h2>
                <p class="block-text mb-[36px] md:mb-[27px] xl:max-w-[430px] xl:mb-16"><?php echo esc_html( get_field('connection_space_description') ); ?></p>
                <?php 
                $link = get_field('connection_space_button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-arrow-darkBlue mb-[32px] md:mb-0 " href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?></a>
            </div>
        </div>
    </div>
</section>