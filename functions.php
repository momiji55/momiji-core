<?php
/**
 * Theme setup and asset loading
 *
 * @package momiji-core
 */

add_action('wp_enqueue_scripts', function () {
  $theme = wp_get_theme();
  wp_enqueue_style('momiji-core-style', get_stylesheet_uri(), [], $theme->get('Version'));
});
