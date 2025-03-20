<?php

namespace Starter;

class Editor
{
  static $customBlocks = [];
  static $allowedBlocks = [
    'core/button',
    'core/buttons',
    'core/columns',
    'core/embed',
    'core/gallery',
    'core/heading',
    'core/image',
    'core/list-item',
    'core/list',
    'core/paragraph',
    'core/quote',
    'core/separator',
  ];

  public static function init()
  {
    add_filter('allowed_block_types_all', [static::class, 'allowedTypes']);
    add_filter('block_editor_settings_all', [static::class, 'settings']);
    add_action('init', [static::class, 'themeSupport']);
    add_action('enqueue_block_editor_assets', [static::class, 'enqueue']);
  }

  // Define allowed block types
  public static function allowedTypes()
  {
    $customBlocks = array_map(function ($name) {
      return "acf/{$name}";
    }, static::$customBlocks);

    return array_merge($customBlocks, static::$allowedBlocks);
  }

  // Disable block editor settings
  public static function settings(array $settings)
  {
    $settings['__experimentalFeatures']['typography']['dropCap'] = false;
    $settings['__experimentalFeatures']['typography']['fontStyle'] = false;
    $settings['__experimentalFeatures']['typography']['fontWeight'] = false;
    $settings['__experimentalFeatures']['typography']['letterSpacing'] = false;
    $settings['__experimentalFeatures']['typography']['textDecoration'] = false;
    $settings['__experimentalFeatures']['typography']['textTransform'] = false;

    return $settings;
  }

  // Disable block editor features
  public static function themeSupport()
  {
    add_theme_support('disable-custom-colors');
    add_theme_support('disable-custom-font-sizes');
    add_theme_support('disable-custom-gradients');
    add_theme_support('editor-color-palette', []);
    add_theme_support('editor-font-sizes', []);
    add_theme_support('editor-gradient-presets', []);
    remove_theme_support('core-block-patterns');
  }

  // Enqueue block editor customisations file
  public static function enqueue()
  {
    wp_enqueue_script(
      'editor-modifications',
      get_stylesheet_directory_uri() . '/scripts/editor.js',
      ['wp-blocks', 'wp-dom'],
      time(),
      true
    );
  }
}
