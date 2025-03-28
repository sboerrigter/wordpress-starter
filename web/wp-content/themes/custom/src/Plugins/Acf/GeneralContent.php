<?php
namespace Theme\Plugins\Acf;

use Theme\Traits\HasFields;

class GeneralContent
{
  use HasFields;

  private static $name = 'general-content';
  private static $title;

  public static function init()
  {
    static::$title = __('General content', 'theme');

    add_action('acf/init', [static::class, 'addOptionsPage']);
    add_action('acf/init', [static::class, 'registerFields']);
  }

  public static function addOptionsPage()
  {
    acf_add_options_page([
      'menu_slug' => static::$name,
      'menu_title' => static::$title,
      'page_title' => static::$title,
      'icon_url' => 'dashicons-welcome-widgets-menus',
    ]);
  }

  public static function registerFields()
  {
    $key = static::$name;

    acf_add_local_field_group([
      'key' => static::$name,
      'title' => static::$title,
      'fields' => array_merge(static::ctaFields($key)),
      'location' => [
        [
          [
            'param' => 'options_page',
            'operator' => '==',
            'value' => static::$name,
          ],
        ],
      ],
    ]);
  }
}
