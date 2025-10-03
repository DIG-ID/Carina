<?php
/**
 * Setup theme
 */
function carina_theme_setup() {

	register_nav_menus(
		array(
			'stay-menu'      => __( 'Stay Menu', 'carina' ),
			'main-menu'      => __( 'Main Menu', 'carina' ),
			'footer-menu'    => __( 'Footer Menu', 'carina' ),
			'copyright-menu' => __( 'Copyright Menu', 'carina' ),
		)
	);

	add_theme_support( 'menus' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	add_image_size( 'slider-bleed-right-size', 830, 596, array( 'center', 'center' ) );

	add_image_size( 'slider-bleed-both', 938, 536, array( 'center', 'center' ) );

	add_image_size( 'slider-bleed-both-portrait', 481, 536, array( 'center', 'center' ) );

	add_image_size( 'image-thumbnails', 415, 335, array( 'center', 'center' ) );

	add_image_size( 'rooms-thumbnails', 640, 400, array( 'center', 'center' ) );

}

add_action( 'after_setup_theme', 'carina_theme_setup' );

/**
 * Register our sidebars and widgetized areas.
 */
function carina_theme_footer_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Footer',
			'id'            => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		),
	);

	register_sidebar(
		array(
			'name'          => 'Header Language Switcher',
			'id'            => 'header_ls',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

}

add_action( 'widgets_init', 'carina_theme_footer_widgets_init' );

if ( ! function_exists( 'carina_get_font_face_styles' ) ) :
	/**
	 * Get font face styles.
	 * This is used by the theme or editor to inject @import for Google Fonts.
	 */
	function carina_get_font_face_styles() {
		return "
			@import url('https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&display=swap');
		";
	}
endif;

if ( ! function_exists( 'carina_preload_webfonts' ) ) :
	/**
	 * Preloads Google Fonts to improve performance.
	 */
	function carina_preload_webfonts() {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<?php
	}
endif;

add_action( 'wp_head', 'carina_preload_webfonts' );

/**
	 * Preloads Local Fonts to improve performance.
	 */
function carina_preload_local_fonts() {
    $base = get_template_directory_uri() . '/assets/fonts/magnat-font-family/';
    ?>
    <link rel="preload" as="font" type="font/woff" href="<?php echo $base; ?>NeueMagnatTextTest-Regular-BF63e9a00ba26a8.woff" crossorigin>
    <?php
}
add_action( 'wp_head', 'carina_preload_local_fonts', 1 );


/**
 * Enqueue styles and scripts
 */
function carina_theme_enqueue_styles() {
	//Get the theme data
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// Register Theme main style.
	wp_register_style( 'theme-styles', get_template_directory_uri() . '/dist/css/main.css', array(), $theme_version );
	// Add styles inline.
	wp_add_inline_style( 'theme-styles', carina_get_font_face_styles() );
	// Enqueue theme stylesheet.
	wp_enqueue_style( 'theme-styles' );

	wp_enqueue_script( 'jquery', false, array(), $theme_version, true );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/dist/js/main.js', array( 'jquery' ), $theme_version, true );

	if ( is_page_template( 'page-templates/page-arrival-contacts.php' ) || is_admin() ) :
		wp_enqueue_script( 'google-map-settings', get_stylesheet_directory_uri() . '/assets/js/google-maps.js', array( 'jquery' ), $theme_version, true );
		wp_enqueue_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo&callback=initMap', array(), $theme_version, true );
	endif;
}

add_action( 'wp_enqueue_scripts', 'carina_theme_enqueue_styles' );

// Google Map Init.
function carina_google_map_init() {
	if ( is_admin() ) :
		acf_update_setting( 'google_api_key', 'AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo' );
	endif;
}

add_action( 'acf/init', 'carina_google_map_init' );

/**
 * Remove <p> Tag From Contact Form 7.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Lowers the metabox priority to 'core' for Yoast SEO's metabox.
 *
 * @param string $priority The current priority.
 *
 * @return string $priority The potentially altered priority.
 */
function carina_theme_lower_yoast_metabox_priority( $priority ) {
	return 'core';
}

add_filter( 'wpseo_metabox_prio', 'carina_theme_lower_yoast_metabox_priority' );


// Theme custom template tags.
require get_template_directory() . '/inc/theme-template-tags.php';

// The theme admin settings.
require get_template_directory() . '/inc/theme-admin-settings.php';

// The theme custom menu walker settings.
require get_template_directory() . '/inc/theme-custom-menu-walker.php';

function my_console_log(...$data) {
	$json = json_encode($data);
	add_action('shutdown', function() use ($json) {
		 echo "<script>console.log({$json})</script>";
	});
}

// Show 6 posts per page on the blog (Posts page)
add_action('pre_get_posts', function ($q) {
  if ( is_admin() || ! $q->is_main_query() ) return;

  if ( $q->is_home() ) {
    $q->set('posts_per_page', 6);
    $q->set('ignore_sticky_posts', 1);
  }
});

add_action('init', function () {
  if ( is_admin() ) return; // front-end only
  if ( ($_SERVER['REQUEST_METHOD'] ?? '') !== 'GET' ) return;

  $uri = $_SERVER['REQUEST_URI'] ?? '';
  $is_admin_ajax = (strpos($uri, 'admin-ajax.php') !== false);
  $has_action    = isset($_REQUEST['action']) && $_REQUEST['action'] !== '';
  $has_paged     = isset($_GET['paged']) && is_numeric($_GET['paged']);

  if ($is_admin_ajax && !$has_action && $has_paged) {
    $n   = max(1, (int) $_GET['paged']);
    $url = ($n > 1) ? get_pagenum_link($n) : get_permalink(get_option('page_for_posts'));
    wp_safe_redirect($url, 302);
    exit;
  }
});





// Enqueue the ajax script on the Posts page (home)
add_action('wp_enqueue_scripts', function () {
  if ( is_home() ) {
    wp_enqueue_script('carina-blog-ajax', get_template_directory_uri() . '/assets/js/blog-pagination.js', [], null, true);
    wp_localize_script('carina-blog-ajax', 'CARINA_BLOG', [
			'ajax_url'  => admin_url('admin-ajax.php'),
			'nonce'     => wp_create_nonce('carina_blog'),
			// Always the Posts page URL:
			'baseUrl'   => get_permalink( get_option('page_for_posts') ),
			// Convenience to build /page/N/ on the client:
			'pageBase'  => trailingslashit( get_permalink( get_option('page_for_posts') ) ) . 'page/',
		]);
  }
});

// Server-side render the same cards and return JSON
add_action('wp_ajax_carina_load_posts', 'carina_load_posts');
add_action('wp_ajax_nopriv_carina_load_posts', 'carina_load_posts');
function carina_load_posts() {
  check_ajax_referer('carina_blog','nonce');

  $page = max(1, (int) ($_POST['page'] ?? 1));
  $args = [
    'post_type'           => 'post',
    'posts_per_page'      => 6,
    'paged'               => $page,
    'ignore_sticky_posts' => 1,
  ];

  $q = new WP_Query($args);

  ob_start();
  if ( $q->have_posts() ) {
    while ( $q->have_posts() ) { $q->the_post();
      // Reuse your exact card markup. Option A: inline here.
      // Option B (cleaner): get_template_part('template-parts/blog/card'); 
      ?>
      <article <?php post_class('group col-span-2 md:col-span-3 xl:col-span-4 overflow-hidden transition-all mb-7 md:mb-20 xl:mb-24'); ?>>
        <a href="<?php the_permalink(); ?>" class="block relative">
          <?php if ( has_post_thumbnail() ) :
            the_post_thumbnail('image-thumbnails', ['class' => 'w-full h-full object-cover object-center']);
          else : ?>
            <div class="w-full"><?php esc_html_e('No image', 'carina'); ?></div>
          <?php endif; ?>
        </a>
        <a href="<?php the_permalink(); ?>" class="block py-6 xl:px-4 content-link">
          <h2 class="mb-4 block-text text-darkBlue"><?php the_title(); ?></h2>
          <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" class="block-text text-darkBlue">
            <?php echo esc_html( wp_date( 'j. F Y', get_post_timestamp() ) ); ?>
          </time>
          <p class="mt-3 block-text text-darkBlue">
            <?php
              $raw = has_excerpt() ? get_post_field('post_excerpt', get_the_ID())
                                   : get_post_field('post_content', get_the_ID());
              echo wp_kses_post( wp_trim_words( wp_strip_all_tags( strip_shortcodes( $raw ) ), 26, '…' ) );
            ?>
          </p>
        </a>
      </article>
      <?php
    }
  }
  $html = ob_get_clean();

  $payload = [
		'html'     => $html,
		'current'  => $page,
		'max'      => (int) $q->max_num_pages,
		'has_prev' => $page > 1,
		'has_next' => $page < (int) $q->max_num_pages,
		'prev_url' => $page > 1 ? get_pagenum_link($page - 1) : '',
		'next_url' => $page < (int) $q->max_num_pages ? get_pagenum_link($page + 1) : '',
		'page_url' => $page > 1 ? get_pagenum_link($page) : get_permalink(get_option('page_for_posts')),
	];

  wp_reset_postdata();
  wp_send_json_success($payload);
}
