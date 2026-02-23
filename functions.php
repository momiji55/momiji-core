<?php
/**
 * Theme functions
 *
 * @package momiji-core
 */

 // テーマの初期設定（タイトルタグやHTML5対応など）を有効化する
add_action('after_setup_theme', function () {
  // <title> を WordPress に任せる（header.php に <title> を書かない構成）
  add_theme_support('title-tag');

  // 検索フォームなどをHTML5マークアップで出力
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
  ));

  // 投稿・固定ページのアイキャッチを使う場合は有効化（不要なら削除OK）
  add_theme_support('post-thumbnails');
});

add_filter('style_loader_tag', function ($html) {
	// linkタグの自己終了だけを変換（中身があるstyleタグは除外）
	return preg_replace('/(<link\b[^>]*?)\s*\/>\s*/', '$1>', $html);
});

add_action('init', function () {
	// コアが出す REST API link（末尾 / あり）を止める
	remove_action('wp_head', 'rest_output_link_wp_head', 10);

	// 末尾 / なしで自前出力
	add_action('wp_head', function () {
		echo '<link rel="https://api.w.org/" href="' . esc_url(get_rest_url()) . '">';
	}, 10);
});


add_action('wp_enqueue_scripts', function () {
  $theme = wp_get_theme();
  $version = $theme->get('Version');

  // テーマの style.css（テーマヘッダーを含む / 最小限）
  wp_enqueue_style(
    'momiji-core-style',
    get_stylesheet_uri(),
    array(),
    $version
  );

  // 共通CSS（必要なものだけ）
  wp_enqueue_style(
    'momiji-core-common',
    get_template_directory_uri() . '/assets/css/common.css',
    array('momiji-core-style'),
    $version
  );

  // 404ページ専用CSS（必要な時だけ）
  if (is_404()) {
    wp_enqueue_style(
      'momiji-core-404',
      get_template_directory_uri() . '/assets/css/404.css',
      array('momiji-core-common'),
      $version
    );
  }

  // 投稿詳細ページ専用CSS（今後の例）
  if (is_single()) {
    wp_enqueue_style(
      'momiji-core-single',
      get_template_directory_uri() . '/assets/css/single.css',
      array('momiji-core-common'),
      $version
    );
  }

  // 固定ページ専用CSS（今後の例）
  if (is_page()) {
    wp_enqueue_style(
      'momiji-core-page',
      get_template_directory_uri() . '/assets/css/page.css',
      array('momiji-core-common'),
      $version
    );
  }
});
