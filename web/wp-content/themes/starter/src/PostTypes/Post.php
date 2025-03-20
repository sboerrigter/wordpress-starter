<?php

namespace Starter\PostTypes;

use Starter\Traits\HasFields;

class Post
{
  use HasFields;

  static $name = 'post';
  static $labels;

  public static function init()
  {
    static::$labels = [
      'name' => __('Posts', 'starter'),
      'singular_name' => __('Post', 'starter'),
    ];

    add_action('acf/init', [static::class, 'registerFields']);
  }

  public static function registerFields()
  {
    $key = static::$name;

    acf_add_local_field_group([
      'key' => "{$key}_settings",
      'title' =>
        static::$labels['singular_name'] . ' ' . __('settings', 'starter'),
      'fields' => array_merge(static::headerFields($key)),
      'location' => [
        [
          [
            'param' => 'post_type',
            'operator' => '==',
            'value' => $key,
          ],
        ],
      ],
    ]);
  }
}
