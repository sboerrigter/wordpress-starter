<?php

namespace Starter;

class Media
{
  public static function init()
  {
    add_action('after_setup_theme', [static::class, 'setImageSizes']);
    add_action('after_setup_theme', [static::class, 'setDefaultLinkType']);
  }

  // Set image sizes
  public static function setImageSizes()
  {
    update_option('thumbnail_size_w', 240);
    update_option('thumbnail_size_h', 240);
    update_option('medium_size_w', 480);
    update_option('medium_size_h', '');
    update_option('large_size_w', 840);
    update_option('large_size_h', '');
  }

  // Don't add links to images by default
  public static function setDefaultLinkType()
  {
    update_option('image_default_link_type', 'none');
  }
}
