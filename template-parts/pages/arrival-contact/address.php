<section class="section-address py-16 md:py-20 xl:py-24 bg-lightGrey">
	<div class="theme-container theme-grid">
		<div class="col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-4 flex flex-col md:justify-between xl:justify-start gap-8 xl:gap-16">
			<div class="contacts block-text">
				<h2 class="block-text mb-5"><?php the_field( 'address_contact_contacts_title' ); ?></h2>
				<?php the_field( 'address_contact_contacts' ); ?>
			</div>
			<div class="address block-text">
				<h2 class="block-text mb-5"><?php the_field( 'address_contact_addresss_title' ); ?></h2>
				<address class="block-text not-italic">
					<?php the_field( 'address_contact_address' ); ?>
				</address>
			</div>
		</div>
		<div class="col-span-2 md:col-span-3 xl:col-span-6 bg-darkBlue text-lightGrey">
			<?php
			$location = get_field( 'address_contact_map' );
			if ( $location ) :
				?>
				<div class="acf-map" data-zoom="16">
					<div class="marker" data-lat="<?php echo esc_attr( $location['lat'] ); ?>" data-lng="<?php echo esc_attr( $location['lng'] ); ?>"></div>
				</div>
				<?php
			endif;
			?>
		</div>
	</div>
</section>