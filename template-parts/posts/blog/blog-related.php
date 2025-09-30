<div class="flex flex-col bg-darkBlue py-7 px-9">
	<h3 class="title-sm text-lightGrey mb-6 xl:mb-11"><?php esc_html_e( 'Letzte Beiträge :', 'carina' ); ?></h3>
	<?php
	$args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'post__not_in'        => array( get_the_ID() ),
		'posts_per_page'      => 4,
		'order'               => 'DESC',
		'ignore_sticky_posts' => true,

	);
	$blog_query = new WP_Query( $args );
	if ( $blog_query->have_posts() ) :
		echo '<ul class="flex flex-col justify-start gap-4 h-full">';
		while( $blog_query->have_posts() ) :
			$blog_query->the_post();
			?>
			<li>
				<a class="transition-all duration-500 ease-in-out blockoverflow-hidden mb-6 lg:mb-0" href="<?php echo esc_url( get_the_permalink() ); ?>">
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'card-blog card-blog--related flex' ); ?>>
						<?php
						if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'full', array( 'class' => 'w-auto h-auto max-w-[130px] max-h-[120px] object-cover' ) );
						else :
							?><span class="min-w-[108px] lg:min-w-[135px] h-[108px] lg:h-[135px] flex flex-col justify-center items-center">no featured image</span> <?php
						endif;
						?>
						<div class="ml-4 pr-6 flex flex-col justify-start">
              <time datetime="<?php echo esc_attr( get_post_time('c') ); ?>">
                <span class="block-text text-lightGrey"><?php echo esc_html( get_the_date( 'j. M. Y' ) ); ?></span>
              </time>
							<p class="block-text text-lightGrey pt-5"><?php the_title(); ?></p>
						</div>
					</article>
				</a>
			</li>
			<?php
		endwhile;
		echo '</ul>';
		wp_reset_postdata();
	endif;
	?>
</div>
