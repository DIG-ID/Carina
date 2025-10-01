<?php
/**
 * Posts index (Blog overview)
 */
get_header();


$blog_page_id = get_queried_object_id() ?: (int) get_option('page_for_posts');

$blog_title = $blog_page_id ? get_the_title($blog_page_id) : __('Blog', 'carina');

$hero_bg_id = get_field('hero_background_image', $blog_page_id);
$hero_title = get_field('hero_title', $blog_page_id);
$blog_intro = get_field('blog_intro', $blog_page_id);
$cols_md    = (int) get_field('hero_cols_md', $blog_page_id) ?: 4;
$cols_xl    = (int) get_field('hero_cols_xl', $blog_page_id) ?: 6;
?>

<section id="section-hero" class="section-hero relative h-screen w-full z-20 bg-darkBlue">
  <?php
  // Background image: ACF -> fallback to the Blog page featured image
  if ($hero_bg_id) {
    echo wp_get_attachment_image($hero_bg_id, 'full', false, [
      'class' => 'absolute inset-0 w-full h-full object-cover -z-10',
    ]);
  } elseif ($blog_page_id && has_post_thumbnail($blog_page_id)) {
    echo get_the_post_thumbnail($blog_page_id, 'full', [
      'class' => 'absolute inset-0 w-full h-full object-cover -z-10',
    ]);
  }
  ?>

  <div class="theme-container justify-center h-full flex items-end pb-8 xl:pb-14 relative z-10">
    <div class="theme-grid w-full">
      <?php if ($hero_title) : ?>
        <div class="col-span-2 md:col-span-<?php echo esc_attr($cols_md); ?> xl:col-span-<?php echo esc_attr($cols_xl); ?> text-lightGrey">
          <h1 class="title-xl">
            <?php echo $hero_title; ?>
          </h1>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<section id="section-intro" class="section-intro relative w-full pt-8 md:pt-20 xl:pt-28 pb-8 md:pb-12">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-8 col-start-1 md:col-start-1 xl:col-start-3">
                <p class="block-text-intro text-darkBlue text-center">
                    <?php echo $blog_intro; ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?php
// current page number
$paged = max( 1, (int) get_query_var('paged') ?: (int) get_query_var('page') ?: 1 );

// your custom query
$blog_q = new WP_Query([
  'post_type'           => 'post',
  'posts_per_page'      => 6,
  'paged'               => $paged,
  'ignore_sticky_posts' => 1,
]);

// build prev/next with query args (works on static pages)
$base = get_permalink( get_queried_object_id() );
$prev_url = $paged > 1 ? esc_url( add_query_arg( 'paged', $paged - 1, $base ) ) : '';
$next_url = $paged < (int) $blog_q->max_num_pages ? esc_url( add_query_arg( 'paged', $paged + 1, $base ) ) : '';

?>
<section id="section-blog" class="section-blog pt-8 pb-20 md:pb-20 md:pt-12">
  <div class="theme-container">
    <?php if ( $blog_q->have_posts() ) : ?>
      <div class="theme-grid">
        <?php while ( $blog_q->have_posts() ) : $blog_q->the_post(); ?>
          <article <?php post_class('group col-span-2 md:col-span-3 xl:col-span-4 overflow-hidden transition-all mb-7 md:mb-20 xl:mb-24'); ?>>
            <a href="<?php the_permalink(); ?>" class="block relative">
              <?php if ( has_post_thumbnail() ) :
                the_post_thumbnail('image-thumbnails', [
                  'class' => 'w-full h-full object-cover object-center',
                ]);
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
                $raw = has_excerpt()
                  ? get_post_field('post_excerpt', get_the_ID())
                  : get_post_field('post_content', get_the_ID());

                echo wp_kses_post(
                  wp_trim_words( wp_strip_all_tags( strip_shortcodes( $raw ) ), 26, '…' )
                );
                ?>
              </p>
            </a>
          </article>
        <?php endwhile; ?>
      </div>

      <?php
      global $wp_query;

      $total_pages = (int) $wp_query->max_num_pages;
      if ( $total_pages > 1 ) :
        $current  = max( 1, (int) get_query_var('paged') );
        $prev_url = $current > 1 ? esc_url( get_pagenum_link( $current - 1 ) ) : '';
        $next_url = $current < $total_pages ? esc_url( get_pagenum_link( $current + 1 ) ) : '';
      ?>
        <nav class="mt-10 flex items-center justify-center gap-4" aria-label="<?php esc_attr_e('Pagination', 'carina'); ?>">
          <?php if ( $prev_url ) : ?>
            <a href="<?php echo $prev_url; ?>" rel="prev" aria-label="<?php esc_attr_e('Previous page', 'carina'); ?>" class="text-darkBlue/90 hover:opacity-100 transition-opacity select-none">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="31" viewBox="0 0 32 31" fill="none">
                <path d="M30.8932 12.7871C24.891 14.4666 13.8292 16.4697 1 13.582" stroke="#0F1A1E" stroke-width="1.5" stroke-linejoin="round"/>
                <path d="M20.6773 30.3568L0.999998 13.5812L20.6773 1" stroke="#0F1A1E" stroke-width="1.5" stroke-linejoin="round"/>
              </svg>
            </a>
          <?php else : ?>
            <span class="opacity-30 select-none">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="31" viewBox="0 0 32 31" fill="none">
                <path d="M30.8932 12.7871C24.891 14.4666 13.8292 16.4697 1 13.582" stroke="#0F1A1E" stroke-width="1.5" stroke-linejoin="round"/>
                <path d="M20.6773 30.3568L0.999998 13.5812L20.6773 1" stroke="#0F1A1E" stroke-width="1.5" stroke-linejoin="round"/>
              </svg>
            </span>
          <?php endif; ?>

          <span class="min-w-6 text-center text-darkBlue select-none">
            <?php echo esc_html( number_format_i18n( $current ) ); ?>
          </span>

          <?php if ( $next_url ) : ?>
            <a href="<?php echo $next_url; ?>" rel="next" aria-label="<?php esc_attr_e('Next page', 'carina'); ?>" class="text-darkBlue hover:opacity-100 transition-opacity select-none">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="31" viewBox="0 0 32 31" fill="none">
                <path d="M1.1068 18.2129C7.109 16.5334 18.1708 14.5303 31 17.418" stroke="#0F1A1E" stroke-width="1.5" stroke-linejoin="round"/>
                <path d="M11.3227 0.643183L31 17.4188L11.3227 30" stroke="#0F1A1E" stroke-width="1.5" stroke-linejoin="round"/>
              </svg>
            </a>
          <?php else : ?>
            <span class="opacity-30 select-none">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="31" viewBox="0 0 32 31" fill="none">
                <path d="M1.1068 18.2129C7.109 16.5334 18.1708 14.5303 31 17.418" stroke="#0F1A1E" stroke-width="1.5" stroke-linejoin="round"/>
                <path d="M11.3227 0.643183L31 17.4188L11.3227 30" stroke="#0F1A1E" stroke-width="1.5" stroke-linejoin="round"/>
              </svg>
            </span>
          <?php endif; ?>
        </nav>
      <?php endif; ?>


      <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p class="mt-10 text-darkBlue"><?php esc_html_e('No posts yet.', 'carina'); ?></p>
    <?php endif; ?>
  </div>
</section>


<?php get_footer(); ?>
