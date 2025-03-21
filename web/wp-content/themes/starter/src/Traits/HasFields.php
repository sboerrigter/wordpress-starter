<?php

namespace Theme\Traits;

trait HasFields
{
  private static function headerFields(string $key)
  {
    return [
      [
        'key' => "field_{$key}_tab_header",
        'name' => 'tab_header',
        'label' => __('Header', 'starter'),
        'type' => 'tab',
        'placement' => 'left',
      ],
      [
        'key' => "field_{$key}_thumbnail",
        'name' => '_thumbnail_id',
        'label' => __('Image', 'starter'),
        'type' => 'image',
        'return_format' => 'id',
        'min_width' => 1200,
        'min_height' => 900,
        'required' => true,
      ],
    ];
  }
}
