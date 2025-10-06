<section id="section-post-content" class="section-post-content bg-lightGrey pt-12 pb-12 xl:pt-28 xl:pb-28">
	<div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 mb-8 xl:mb-16">
				<?php
				function carina_posts_page_url() {
					$posts_page_id = (int) get_option('page_for_posts');

					// WPML-aware: get the translated page ID if available
					if ( $posts_page_id && function_exists('icl_object_id') ) {
						$posts_page_id = icl_object_id( $posts_page_id, 'page', true );
					}

					return $posts_page_id ? get_permalink($posts_page_id) : home_url('/');
				}
				?>
				<a class="btn btn-arrow-previous" href="<?php echo esc_url( carina_posts_page_url() ); ?>">
					<?php echo esc_html_e( 'Zurück', 'carina' ); ?>
				</a>
      </div>
    </div>
		<div class="theme-grid">
			<div class="col-span-2 md:col-span-6">
        
				<h3 class="title-sm text-darkBlue xl:mb-8 mb-5"><?php the_title(); ?></h3>
				<time class="inline-block xl:mb-8 mb-5" datetime="<?php echo esc_attr( get_post_time('c') ); ?>">
          <span class="mr-10 block-text text-darkBlue"><?php esc_html_e( 'Datum:', 'carina' ); ?></span><span class="block-text text-darkBlue"><?php echo esc_html( wp_date( 'j. F Y', get_post_timestamp() ) ); ?></span>
        </time>
				<div class="section-post-content-wrapper">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="col-span-2 md:col-span-6 xl:col-span-4 col-start-1 md:col-start-1 xl:col-start-9">
				<?php get_template_part( 'template-parts/posts/blog/blog-related' ); ?>
			</div>
		</div>
	</div>
</section>
