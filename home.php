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

<section id="section-intro" class="section-intro relative w-full pt-8 md:pt-36 xl:pt-28 pb-8 md:pb-12">
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

<section id="section-blog" class="section-blog pt-8 pb-20 md:pb-20 md:pt-12">
  <div class="theme-container">
    <?php if (have_posts()) : ?>
      <div class="theme-grid">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class('group col-span-2 md:col-span-3 xl:col-span-4 overflow-hidden transition-all mb-7 md:mb-20 xl:mb-24'); ?>>
            <a href="<?php the_permalink(); ?>" class="block relative">
              <?php if (has_post_thumbnail()) :
                the_post_thumbnail('image-thumbnails', [
                  'class' => 'w-full h-full object-cover object-center',
                ]);
              else : ?>
                <div class="w-full">
                  <?php esc_html_e('No image', 'carina'); ?>
                </div>
              <?php endif; ?>
            </a>

            <a href="<?php the_permalink(); ?>" class="block py-6 px-4 content-link">
              <h2 class="mb-4 block-text text-darkBlue"><?php the_title(); ?></h2>

              <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" class="block-text text-darkBlue">
                <?php echo esc_html( wp_date( 'j. F Y', get_post_timestamp() ) ); ?>
              </time>

              <div class="mt-3 block-text text-darkBlue">
                <?php
                $raw = has_excerpt()
                  ? get_post_field('post_excerpt', get_the_ID())
                  : get_post_field('post_content', get_the_ID());

                echo wp_kses_post(
                  wp_trim_words( wp_strip_all_tags( strip_shortcodes( $raw ) ), 26, '…' )
                );
                ?>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>

    <?php else : ?>
      <p class="mt-10 text-darkBlue"><?php esc_html_e('No posts yet.', 'carina'); ?></p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
