<?php

namespace Starter;

class Assets
{
  public static function init()
  {
    add_action('wp_enqueue_scripts', [static::class, 'enqueueStyles']);
    add_action('wp_enqueue_scripts', [static::class, 'enqueueScripts']);
  }

  // Enqueue styles
  public static function enqueueStyles()
  {
    wp_enqueue_style(
      'main',
      get_stylesheet_directory_uri() . '/dist/main.css',
      null,
      filemtime(get_stylesheet_directory() . '/dist/main.css')
    );
  }

  // Enqueue scripts
  public static function enqueueScripts()
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
