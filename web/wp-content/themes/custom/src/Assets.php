<?php

namespace Theme;

class Assets
{
  static $scriptPath = 'web/wp-content/themes/custom/scripts/index.js';

  public static function init()
  {
    add_action('wp_enqueue_scripts', [static::class, 'enqueue']);
    add_filter('script_loader_tag', [static::class, 'script_loader'], 10, 3);
  }

  // Enqueue styles
  public static function enqueue_styles() {}

  // Enqueue scripts and styles
  public static function enqueue()
  {
    if (
      wp_get_environment_type() === 'development' &&
      is_array(wp_remote_get('http://localhost:5173/'))
    ) {
      wp_enqueue_script('vite', 'http://localhost:5173/@vite/client');
      wp_enqueue_script('main', 'http://localhost:5173/' . static::$scriptPath);
    } else {
      $manifestPath = get_theme_file_path('dist/.vite/manifest.json');
      $manifest = json_decode(file_get_contents($manifestPath), true);
      $script = $manifest[static::$scriptPath];

      wp_enqueue_script('index', get_theme_file_uri("dist/{$script['file']}"));
      wp_enqueue_style('index', get_theme_file_uri("dist/{$script['css'][0]}"));
    }

    // Pass PHP variables to JavaScript
    wp_localize_script('index', 'theme', [
      'ajaxUrl' => admin_url('admin-ajax.php'),
    ]);
  }

  // Defer load scripts as modules
  public static function script_loader(string $tag, string $handle, string $src)
  {
    if (in_array($handle, ['main', 'vite'])) {
      return '<script type="module" src="' .
        esc_url($src) .
        '" defer></script>';
    }

    return $tag;
  }
}
