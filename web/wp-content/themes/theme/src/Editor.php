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

  public static function init()
  {
    add_filter(
      'allowed_block_types_all',
      [static::class, 'setAllowedBlockTypes'],
      10,
      2
    );
  }

  // Set allowed block types
  public static function setAllowedBlockTypes($allowed, $types)
  {
    return static::$allowedBlockTypes;
  }
}
