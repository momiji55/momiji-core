<?php
/**
 * Main template file
 *
 * @package momiji-core
 */

get_header();
?>

<?php if (have_posts()) : ?>
  <div class="posts">
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
        <header class="post-item-header">
        <?php if (is_singular()) : ?>
          <h1 class="post-item-title"><?php echo esc_html(get_the_title()); ?></h1>
        <?php else : ?>
          <h2 class="post-item-title">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
          </h2>
        <?php endif; ?>
        </header>

        <div class="post-item-content">
          <?php the_content(); ?>

          <?php
          wp_link_pages(
            array(
              'before' => '<nav class="page-links" aria-label="ページ分割ナビゲーション">' . '<span class="page-links-title">Pages:</span>',
              'after'  => '</nav>',
            )
          );
          ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>

  <?php the_posts_navigation(); ?>

<?php else : ?>
  <section class="no-posts">
    <h1 class="no-posts-title">投稿が見つかりませんでした</h1>
    <p class="no-posts-text">まだ投稿がないか、条件に一致する投稿がありません。</p>
  </section>
<?php endif; ?>

<?php
get_footer();
