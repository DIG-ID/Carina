<?php
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
