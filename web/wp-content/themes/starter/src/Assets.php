<?php

namespace Theme;

class Assets
{
  public static function init()
  {
    add_action('wp_enqueue_scripts', [static::class, 'enqueue_styles']);
    add_action('wp_enqueue_scripts', [static::class, 'enqueue_scripts']);
  }

  // Enqueue styles
  public static function enqueue_styles()
  {
    wp_enqueue_style(
      'main',
      get_stylesheet_directory_uri() . '/dist/main.css',
      null,
      filemtime(get_stylesheet_directory() . '/dist/main.css')
    );
  }

  // Enqueue scripts
  public static function enqueue_scripts()
  {
    wp_enqueue_script(
      'main',
      get_stylesheet_directory_uri() . '/dist/main.js',
      [],
      filemtime(get_stylesheet_directory() . '/dist/main.js'),
      true
    );

    // Pass PHP variables to JavaScript
    wp_localize_script('main', 'theme', [
      'ajaxUrl' => admin_url('admin-ajax.php'),
    ]);
  }
}
