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
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="mix-blend-difference block">
						<?php
						$logo = get_field( 'general_theme-logo', 'option' );
						if ( $logo ) :
							//echo wp_get_attachment_image( $logo, 'full', false, array( 'class' => 'w-40 mix-blend-difference block', 'loading' => 'eager', 'decoding' => 'async' ) );
						endif;
						?>
						<?php do_action( 'theme_logo' ); ?>
					</a>
				</div>
				<div class="col-span-1 flex items-center justify-end">
					<a href="<?php the_field( 'general_booking_url', 'option' ); ?>" class="btn btn-primary"><?php esc_html_e( 'Jetzt buchen', 'carina' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<div class="menu-offcanvas">
		<nav id="primary-nav" class="theme-container theme-grid pt-32" aria-label="<?php esc_attr_e( 'Main Menu', 'carina' ); ?>" role="navigation">
			<div class="col-span-2 lg:col-span-4" data-menu-col>
				<?php
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
				?>
			</div>
			<div class="col-span-2 lg:col-span-4" data-menu-col>
				<?php
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
				?>
			</div>
			<div class="col-span-2 lg:col-span-4" data-menu-col>
				<?php
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
				?>
			</div>
		</nav>
	</div>
</header>
