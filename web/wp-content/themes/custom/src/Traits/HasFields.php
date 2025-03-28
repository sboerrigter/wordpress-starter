<?php

namespace Theme\Traits;

trait HasFields
{
  protected static function headerFields(string $key)
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
      ],
    ];
  }

  protected static function ctaFields(string $key)
  {
    return array_merge(
      [
        [
          'key' => "field_{$key}_tab_cta",
          'name' => 'tab_cta',
          'label' => __('Call to action', 'starter'),
          'type' => 'tab',
          'placement' => 'left',
        ],
        [
          'key' => "field_{$key}_cta_title",
          'name' => 'cta_title',
          'label' => __('Title', 'starter'),
          'type' => 'text',
        ],
        [
          'key' => "field_{$key}_cta_text",
          'name' => 'cta_text',
          'label' => __('Text', 'starter'),
          'type' => 'wysiwyg',
          'media_upload' => false,
          'tabs' => 'visual',
          'toolbar' => 'basic',
        ],
      ],
      static::buttonsFields($key, 'cta')
    );
  }

  protected static function buttonsFields(string $key, string $prefix)
  {
    return [
      [
        'key' => "field_{$key}_{$prefix}_buttons",
        'name' => "{$prefix}_buttons",
        'label' => __('Buttons', 'starter'),
        'type' => 'repeater',
        'layout' => 'table',
        'button_label' => __('+ Add button', 'starter'),
        'sub_fields' => [
          [
            'key' => "field_{$key}_{$prefix}_button_link",
            'name' => 'link',
            'label' => __('Button', 'starter'),
            'type' => 'link',
            'required' => true,
          ],
          [
            'key' => "field_{$key}_{$prefix}_button_style",
            'name' => 'style',
            'label' => __('Style', 'starter'),
            'type' => 'select',
            'choices' => [
              'blue' => __('Blue', 'theme'),
              'blue-outline' => __('Blue outline', 'theme'),
              'gray' => __('Gray', 'theme'),
              'gray-outline' => __('Gray outline', 'theme'),
            ],
            'default_value' => 'blue',
            'required' => true,
          ],
        ],
      ],
    ];
  }
}
