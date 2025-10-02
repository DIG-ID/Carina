<section id="section-rooms" class="section-rooms bg-lightGrey pb-[70px] md:pb-24 pt-8 md:pt-12 xl:pt-10">
	<div class="theme-container">
		<div class="theme-grid">
			<!-- Breadcrumbs -->
			<div class="title-30 mb-2 md:mb-4 xl:mb-4 col-span-2 md:col-span-6 xl:col-span-12">
				<?php the_field( 'room_content_over_title', 'options' ); ?>
			</div>
			<!-- Section heading -->
			<div class="mb-8 md:mb-16 xl:mb-7 col-span-2 md:col-span-5 xl:col-span-7">
				<h2 class="title-md md:max-w-[530px] xl:max-w-[510px] "><?php the_field( 'room_content_title', 'options' ); ?></h2>
			</div>
		</div>
		<!-- Content -->
		<div class="theme-grid gap-y-16 content-wrapper">
			<?php
			$args = array(
				'post_type'      => 'zimmer',
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'orderby'        => 'date',
			);
			$zimmer_query = new WP_Query( $args );
			if ( $zimmer_query->have_posts() ) :
				while ( $zimmer_query->have_posts() ) :
					$zimmer_query->the_post();
					$size         = get_field( 'content_size' );
					$description  = get_field( 'content_short_description' );
					$image        = get_post_thumbnail_id( get_the_ID() );
					?>
					<article <?php post_class( 'col-span-2 md:col-span-6 xl:col-span-12 theme-grid' ); ?> id="zimmer-<?php the_ID(); ?>">
						<!-- Image column -->
						<div class="col-span-2 md:col-span-3 xl:col-start-1 xl:col-span-6 relative ">
							<a href="<?php the_permalink(); ?>" class="overflow-hidden pb-[33px]">
							<?php
							if ( $image ) :
								echo wp_get_attachment_image( $image, 'rooms-thumbnails', false, array( 'class' => 'min-h-auto md:min-h-[415px] xl:min-h-auto block w-full h-auto object-cover' ) );
							endif;
							?>
							</a>
						</div>
						<!-- Content column -->
						<div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-6 flex flex-col">
							<h3 class="title-30 text-darkBlue mb-3 md:mb-1">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<?php if ( $size ) : ?>
								<p class="block-17 mb-8 md:mb-10 xl:mb-7">
									<?php echo esc_html( $size ); ?>
								</p>
							<?php endif; ?>
							<?php if ( $description ) : ?>
								<p class="block-17 mb-7 xl:mb-14">
									<?php echo ( $description ); ?>
								</p>
							<?php endif; ?>
							<!-- Amenities -->
							<!-- Icons -->
							<div class="flex gap-10 xl:gap-20">
								<div class="w-full grid grid-cols-2 gap-x-12 gap-y-6 mb-8 md:mb-0">
									<?php
									if ( have_rows( 'content_amenities' ) ) :
										while ( have_rows( 'content_amenities' ) ) :
											the_row();
											$icon_field = get_sub_field( 'icon' );
											$text       = get_sub_field( 'text' );
											$icon_id    = is_numeric( $icon_field ) ? (int) $icon_field : ( ( is_array( $icon_field ) && ! empty( $icon_field['ID'] ) ) ? (int) $icon_field['ID'] : 0 );
											?>
											<div class="flex items-center gap-3">
												<?php if ( $icon_id ) : ?>
													<?php echo wp_get_attachment_image( $icon_id, 'full', false, array( 'class' => 'w-6 h-6' ) ); ?>
												<?php endif; ?>
												<?php if ( ! empty( $text ) ) : ?>
													<h3 class="block-text text-darkBlue text-left"><?php echo esc_html( $text ); ?></h3>
												<?php endif; ?>
											</div>
											<?php
										endwhile;
									endif;
									?>
								</div>
							</div>
							<a href="<?php the_permalink(); ?>" class="btn btn-arrow-darkBlue mt-auto self-start md:self-end md:mb-6">
								<?php esc_html_e( 'Mehr erfahren', 'carina' ); ?>
							</a>
						</div>
					</article>
					<?php
				endwhile;
			else :
				esc_html_e( 'Leider wurden keine Zimmer gefunden, die Ihren Kriterien entsprechen.', 'carina' );
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
