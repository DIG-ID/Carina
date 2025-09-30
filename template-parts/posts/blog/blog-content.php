<section id="section-post-content" class="section-post-content bg-lightGrey lg:pt-28 lg:pb-28 pt-10">
	<div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 mb-8 xl:mb-16">
            <a class="btn btn-arrow-previous" href="/blog/">
              <?php echo esc_html_e( 'Zurück', 'carina' ); ?>
            </a>
      </div>
    </div>
		<div class="theme-grid">
			<div class="col-span-2 md:col-span-6">
        <time datetime="<?php echo esc_attr( get_post_time('c') ); ?>">
          <span class="mr-14 block-text text-darkBlue"><?php esc_html_e( 'Datum:', 'carina' ); ?></span><span class="block-text text-darkBlue"><?php echo esc_html( get_the_date( 'j. M. Y' ) ); ?></span>
        </time>
				<h3 class="title-sm text-darkBlue mt-9 xl:mt-20 mb-6 xl:mb-11"><?php the_title(); ?></h3>
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
