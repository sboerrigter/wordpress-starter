<?php

namespace Theme;

class Editor
{
  static $allowedBlockTypes = [
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
  static $colors = [
    [
      'color' => '#ffffff',
      'name' => 'White',
      'slug' => 'white',
    ],
    [
      'color' => '#F3F4F6',
      'name' => 'Gray 100',
      'slug' => 'gray-100',
    ],
    [
      'color' => '#F3F4F6',
      'name' => 'Gray 200',
      'slug' => 'gray-200',
    ],
    [
      'color' => '#9AA1B0',
      'name' => 'Gray 400',
      'slug' => 'gray-400',
    ],
    [
      'color' => '#4A5565',
      'name' => 'Gray 600',
      'slug' => 'gray-600',
    ],
    [
      'color' => '#1E2939',
      'name' => 'Gray 800',
      'slug' => 'gray-800',
    ],
    [
      'color' => '#DBECFF',
      'name' => 'Blue 100',
      'slug' => 'blue-100',
    ],
    [
      'color' => '#165DFD',
      'name' => 'Blue 600',
      'slug' => 'blue-600',
    ],
    [
      'color' => '#1B3CBA',
      'name' => 'Blue 800',
      'slug' => 'blue-800',
    ],
    [
      'color' => '#ED0040',
      'name' => 'Rose 600',
      'slug' => 'rose-600',
    ],
    [
      'color' => '#FFBA00',
      'name' => 'Amber 400',
      'slug' => 'amber-400',
    ],
    [
      'color' => '#009966',
      'name' => 'Emerald 600',
      'slug' => 'emerald-600',
    ],
  ];
  static $fontSizes = [
    [
      'name' => 'Small',
      'size' => '0.875rem',
      'slug' => 'sm',
    ],
    [
      'name' => 'Medium',
      'size' => '1rem',
      'slug' => 'md',
    ],
    [
      'name' => 'Large',
      'size' => '1.125rem',
      'slug' => 'lg',
    ],
    [
      'name' => 'Extra large',
      'size' => '1.25rem',
      'slug' => 'xl',
    ],
  ];

  public static function init()
  {
    add_action('enqueue_block_editor_assets', [static::class, 'enqueue']);
    add_action('after_setup_theme', [static::class, 'setThemeSupport']);
    add_filter('block_editor_settings_all', [static::class, 'setSettings']);
  }

  // Enqueue block editor customisations file
  public static function enqueue()
  {
    wp_enqueue_script(
      'theme-editor',
      get_theme_file_uri('/scripts/editor.js'),
      ['wp-blocks', 'wp-dom-ready', 'wp-edit-post']
    );
  }

  // Set and disable block editor features via theme support
  public static function setThemeSupport()
  {
    add_theme_support('editor-color-palette', static::$colors);
    add_theme_support('disable-custom-colors');
    add_theme_support('editor-gradient-presets', []);
    add_theme_support('disable-custom-gradients');
    // @todo limit font sizes to paragraph block
    add_theme_support('editor-font-sizes', static::$fontSizes);
    add_theme_support('disable-custom-font-sizes');
  }

  // Modify block editor settings
  public static function setSettings(array $settings)
  {
    return array_merge(
      [
        // @todo check which blocks to support:
        'allowedBlockTypes' => static::$allowedBlockTypes,
        '__experimentalFeatures' => [
          'typography' => [
            'dropCap' => false,
            'fontStyle' => false,
            'fontWeight' => false,
            'letterSpacing' => false,
            'textDecoration' => false,
            'textTransform' => false,
          ],
        ],
      ],
      $settings
    );
  }
}
