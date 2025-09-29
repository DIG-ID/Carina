<?php
/**
 * Posts index (Blog overview)
 */
get_header();

// ID of the assigned "Posts page" (works with WPML when this page is translated)
$blog_page_id = get_queried_object_id() ?: (int) get_option('page_for_posts');

$blog_title = $blog_page_id ? get_the_title($blog_page_id) : __('Blog', 'carina');

// ACF fields FROM the Posts page
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
      <?php if ($hero_title) : // ← don't use 'hero_title' as a string; check the field value ?>
        <div class="col-span-2 md:col-span-<?php echo esc_attr($cols_md); ?> xl:col-span-<?php echo esc_attr($cols_xl); ?> text-lightGrey">
          <h1 class="title-xl">
            <?php echo esc_html($hero_title ?: $blog_title); ?>
          </h1>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<section id="section-blog" class="section-blog">
  <div class="theme-container py-12 xl:py-20">
    <?php if (have_posts()) : ?>
      <div class="theme-grid">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class('group col-span-2 md:col-span-3 xl:col-span-4 overflow-hidden transition-all'); ?>>
            <a href="<?php the_permalink(); ?>" class="block relative">
              <?php if (has_post_thumbnail()) :
                the_post_thumbnail('large', [
                  'class' => 'absolute inset-0 w-full h-full object-cover object-center',
                ]);
              else : ?>
                <div class="absolute inset-0 flex items-center justify-center text-sm opacity-60">
                  <?php esc_html_e('No image', 'carina'); ?>
                </div>
              <?php endif; ?>
            </a>

            <div class="p-5">
              <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" class="block text-sm text-lightGrey">
                <?php
                echo esc_html( date_i18n( 'j. M. Y', get_post_time( 'U', true ) ) );
                ?>
              </time>

              <h2 class="mt-2 text-xl font-semibold leading-tight">
                <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
              </h2>

              <div class="mt-3 text-darkGrey line-clamp-3">
                <?php the_excerpt(); ?>
              </div>

              <a href="<?php the_permalink(); ?>" class="mt-4 inline-flex items-center gap-2 text-primary hover:underline">
                <?php esc_html_e('Read more', 'carina'); ?>
                <span aria-hidden="true">→</span>
              </a>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

    <?php else : ?>
      <p class="mt-10 text-lightGrey"><?php esc_html_e('No posts yet.', 'carina'); ?></p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
