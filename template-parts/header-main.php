<header id="header-main" class="header-main w-full overflow-hidden" itemscope itemtype="http://schema.org/WebSite">
	<div class="header-content">
		<div class="theme-container">
			<div class="grid grid-cols-3">
				<div class="col-span-1 flex items-center justify-start text-lightGrey">
					<div class="menu-toggle">
						<button class="menu-toggle__button" aria-label="Menu Toggle" aria-controls="primary-nav">
							<span class="menu-toggle__bars">
								<span class="menu-toggle__bar menu-toggle__bar--top"></span>
								<span class="menu-toggle__bar menu-toggle__bar--middle"></span>
								<span class="menu-toggle__bar menu-toggle__bar--bottom"></span>
							</span>
						</button>
					</div>
				</div>
				<div class="col-span-1 flex items-center justify-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="header-logo transition-all duration-500 ease-in-out" itemprop="url">
						<?php /*
						$logo = get_field( 'general_theme-logo_light', 'option' );
						if ( $logo ) :
							echo wp_get_attachment_image( $logo, 'full', false, array( 'class' => 'w-28 md:w-56 transition-all duration-500 ease-in-out', 'loading' => 'eager', 'decoding' => 'async' ) );
						endif;
						*/  ?>
						<?php do_action( 'theme_logo' ); ?>
					</a>
				</div>
				<div class="col-span-1 flex items-center justify-end">
					<a href="<?php the_field( 'general_booking_url', 'option' ); ?>" class="btn btn-primary hidden invisible md:block md:visible text-center"><?php esc_html_e( 'Jetzt buchen', 'carina' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<div class="menu-offcanvas">
		<nav id="primary-nav" class="theme-container theme-grid mt-32 md:mt-[13%]" aria-label="<?php esc_attr_e( 'Main Menu', 'carina' ); ?>" role="navigation">
			<div class="col-span-2 xl:col-span-4" data-menu-col>
				<?php
				if ( has_nav_menu( 'stay-menu' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'stay-menu',
							'menu_id'        => 'stay-menu',
							'menu_class'     => 'menu-offcanvas__stay',
							'container'      => false,
							'fallback_cb'    => false,
							'walker'         => '',
						)
					);
				else :
					echo '<span>' . esc_html__( 'Please assign a menu to the Stay Menu location', 'carina' ) . '</span>';
				endif;
				?>
			</div>
			<div class="col-span-2 xl:col-span-4" data-menu-col>
				<?php
				if ( has_nav_menu( 'main-menu' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'menu_id'        => 'main-menu',
							'menu_class'     => 'menu-offcanvas__main',
							'container'      => false,
							'fallback_cb'    => false,
							'walker'         => '',
						)
					);
				else :
					echo '<span>' . esc_html__( 'Please assign a menu to the Main Menu location', 'carina' ) . '</span>';
				endif;
				?>
			</div>
			<div class="col-span-2 xl:col-span-4" data-menu-col>
				<?php
				if ( has_nav_menu( 'copyright-menu' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'copyright-menu',
							'menu_id'        => 'copyright-menu',
							'menu_class'     => 'menu-offcanvas__copyright',
							'container'      => false,
							'fallback_cb'    => false,
							'walker'         => '',
						)
					);
				else :
					echo '<span>' . esc_html__( 'Please assign a menu to the Copyright Menu location', 'carina' ) . '</span>';
				endif;
				?>
			</div>
		</nav>
		<div class="theme-container theme-grid mb-16 md:mb-0 md:mt-32 border-t border-lightGrey">
			<div class="col-span-12 flex flex-col md:flex-row justify-center items-center md:justify-between md:items-center py-6 md:pt-9 text-lightGrey gap-y-4">
				<div class="flex flex-col md:flex-row items-center"><span class="font-funnelsans text-base uppercase"><?php //esc_html_e( 'Sprache:', 'carina' ); ?></span> <?php if ( function_exists( 'dynamic_sidebar' ) ) { dynamic_sidebar( 'header_ls' ); } ?></div>
				<?php do_action( 'socials' ); ?>
			</div>
		</div>
		
	</div>
</header>
