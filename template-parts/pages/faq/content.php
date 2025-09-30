<div class="theme-container">
	<div class="theme-grid">
		<?php
		$gi = 0;
		if ( have_rows( 'accordion' ) ) :
			while ( have_rows( 'accordion' ) ) :
				the_row();
				++$gi;
				?>
				<div class="accordion col-span-2 md:col-span-6 xl:col-span-9 mb-14" data-accordion="single">
					<h2 class="accordion__title font-magnatText font-normal text-2xl tracking-[0.0003rem] text-darkBlue mb-6"><?php the_sub_field( 'title' ); ?></h2>
					<div class="accordion__list">
						<?php
						if ( have_rows( 'accordion_item' ) ) :
							$i = 0;
							while ( have_rows( 'accordion_item' ) ) :
								the_row();
								++$i;
								?>
								<details id="faq-<?php echo esc_attr( $gi . '-' . $i ); ?>" class="accordion__item group  bg-darkBlue text-lightGrey mb-4">
									<summary class="accordion__item-title flex justify-between items-center cursor-pointer px-9 py-4 [&::-webkit-details-marker]:hidden hover:bg-coral hover:text-lightGrey font-magnatText font-normal text-lg tracking-[0.0003rem] group-open:text-2xl group-open:bg-coral transition-all duration-500 ease-in-out">
										<?php the_sub_field( 'question' ); ?>
										<span class="accordion__item-icon transition-all duration-500 ease-in-out group-open:rotate-180">
											<svg xmlns="http://www.w3.org/2000/svg" width="31" height="32" viewBox="0 0 31 32" fill="none">
												<path d="M12.7891 0.999374C14.4686 7.00158 16.4716 18.0634 13.584 30.8926" stroke="#F0F2F5" stroke-width="1.5" stroke-linejoin="round"/>
												<path d="M30.3568 11.2162L13.5812 30.8936L0.999999 11.2162" stroke="#F0F2F5" stroke-width="1.5" stroke-linejoin="round"/>
											</svg>
										</span>
									</summary>
									<div class="accordion__item-sub-menu overflow-hidden" data-accordion-panel>
										<div class=" font-funnelsans font-normal text-lg text-lightGrey tracking-[0.0003rem] px-9 py-6"><?php the_sub_field( 'answer' ); ?></div>
									</div>
								</details>
								<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
				<?php
			endwhile;
		else :
			echo '<p>' . esc_html__( 'No FAQs found.', 'carina' ) . '</p>';
		endif;
		?>
	</div>
</div>


