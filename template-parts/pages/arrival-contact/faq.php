<section class="section-arrival-faq bg-darkBlue text-lightGrey py-11 md:py-12 xl:py-16">
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-3 cl:col-span-6">
			<h2 class="title-sm mb-4"><?php the_field( 'arrival_faq_title' ); ?></h2>
		</div>
		<div class="col-span-2 md:col-span-3 xl:col-start-8 xl:col-span-5 mb-11 md:mb-9 xl:mb-11">
			<?php the_field( 'arrival_faq_description' ); ?>
		</div>
		<div class="accordion col-span-2 md:col-span-6 xl:col-span-12" data-accordion="single">
			<div class="accordion__list">
				<?php
				if ( have_rows( 'arrival_faq_faq' ) ) :
					$i = 0;
					while ( have_rows( 'arrival_faq_faq' ) ) :
						the_row();
						++$i;
						?>
						<details id="faq-<?php echo esc_attr( $gi . '-' . $i ); ?>" class="accordion__item group bg-lightGrey text-darkBlue mb-4">
							<summary class="accordion__item-title flex justify-between items-center cursor-pointer px-9 py-4 [&::-webkit-details-marker]:hidden hover:bg-coral hover:text-lightGrey font-magnatText font-normal text-lg tracking-[0.0003rem] group-open:text-2xl group-open:bg-coral group-open:text-lightGrey transition-all duration-500 ease-in-out">
								<?php the_sub_field( 'question' ); ?>
								<span class="accordion__item-icon transition-all duration-500 ease-in-out group-open:rotate-180 ">
									<svg xmlns="http://www.w3.org/2000/svg" width="31" height="32" viewBox="0 0 31 32" fill="none">
										<path d="M12.7891 0.999374C14.4686 7.00158 16.4716 18.0634 13.584 30.8926" stroke-width="1.5" stroke-linejoin="round" class="stroke-darkBlue transition-all duration-500 ease-in-out group-hover:stroke-white group-open:stroke-white"/>
										<path d="M30.3568 11.2162L13.5812 30.8936L0.999999 11.2162" stroke-width="1.5" stroke-linejoin="round" class="stroke-darkBlue transition-all duration-500 ease-in-out group-hover:stroke-white group-open:stroke-white"/>
									</svg>
								</span>
							</summary>
							<div class="accordion__item-sub-menu  overflow-hidden" data-accordion-panel>
								<div class=" font-funnelsans font-normal text-lg text-darkBlue tracking-[0.0003rem] px-9 py-6"><?php the_sub_field( 'answer' ); ?></div>
							</div>
						</details>
						<?php
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
</section>