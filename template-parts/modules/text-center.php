<?php $background = get_field('text_center_image'); ?>

<section id="section-text-center" class="section-text-center text-center relative z-10 bg-center bg-cover"
    <?php if ($background): ?>  
    style="background-image:url('<?php echo esc_url($background['url']); ?>');">
    <div class="theme-container relative">
        <div class="flex flex-col items-center py-36">
            <h2 class="title-md text-lightGrey mb-7 md:mb-9 xl:mb-6 max-w-[661px]">
                <?php echo esc_html(get_field('text_center_title')); ?>
            </h2>
            <p class="block-text text-lightGrey max-w-[532px]">
                <?php echo esc_html(get_field('text_center_description')); ?>
            </p>
            <?php 
                $link = get_field('text_center_button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-arrow-darkBlue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?></a>
        </div>
    </div>
</section>
 <?php endif; ?>