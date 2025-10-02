<section id="section-apartments" class="section-apartments bg-lightGrey pt-8 md:pt-12 xl:pt-10 pb-[70px] md:pb-24">
	<div class="theme-container">
		<div class="theme-grid">
			<!-- Breadcrumbs -->
			<div class="mb-4 xl:mb-4 col-span-2 md:col-span-6 xl:col-span-12">
				<h3 class="title-30"><?php the_field( 'apartment_content_over_title', 'options' ); ?></h3>
			</div>
			<!-- Section heading -->
			<div class="mb-[70px] xl:mb-7 col-span-2 md:col-span-6 xl:col-span-7">
				<h2 class="title-md"><?php the_field( 'apartment_content_title', 'options' ); ?></h2>
			</div>
		</div>
		<div class="theme-grid gap-y-16 xl:gap-y-20 content-wrapper">
			<?php
			$apt_args = array(
				'post_type'      => 'apartment',
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'orderby'        => 'date',
			);
			$apt_query = new WP_Query( $apt_args );
			if ( $apt_query->have_posts() ) :
				while ( $apt_query->have_posts() ) :
					$apt_query->the_post();
					$description = get_field( 'content_short_description' );
					$size        = get_field( 'content_size_max_persons' );
					?>
					<article <?php post_class( 'col-span-2 md:col-span-6 xl:col-span-12 theme-grid' ); ?> id="apartment-<?php the_ID(); ?>">
						<!-- Image column -->
						<div class="col-start-1 col-span-2 md:col-span-3 xl:col-span-6 relative">
							<a href="<?php the_permalink(); ?>">
								<?php
								if ( has_post_thumbnail() ) :
									echo get_the_post_thumbnail( get_the_ID(), 'rooms-thumbnails', array( 'class' => 'min-h-auto md:min-h-[415px] xl:min-h-auto block w-full h-auto object-cover' ) );
								endif;
								?>
							</a>
						</div>
						<!-- Content column -->
						<div class="col-start-1 col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-6 flex flex-col">
							<h3 class="title-30 text-darkBlue mt-2 md:mt-0 mb-2 md:mb-0">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<?php if ( $size ) : ?>
								<p class="block-17 mb-8  xl:mb-16">
									<?php echo esc_html( $size ); ?>
								</p>
							<?php endif; ?>
							<?php if ( $description ) : ?>
								<p class="block-17 mb-24 md:mb-0">
									<?php echo esc_html( $description ); ?>
								</p>
							<?php endif; ?>
							<a href="<?php the_permalink(); ?>" class="btn btn-arrow-darkBlue mt-auto self-start md:mb-4">
								<?php esc_html_e( 'Mehr erfahren', 'carina' ); ?>
							</a>
						</div>
					</article>
					<?php
				endwhile;
			else :
				esc_html_e( 'Leider wurden keine Apartments gefunden, die Ihren Kriterien entsprechen.', 'carina' );
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>