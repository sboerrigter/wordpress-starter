<?php
namespace Theme\Plugins\Acf;

class GeneralContent
{
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
      'fields' => [
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
          'label' => __('Call to action title', 'starter'),
          'type' => 'text',
        ],
        [
          'key' => "field_{$key}_cta_text",
          'name' => 'cta_text',
          'label' => __('Call to action text', 'starter'),
          'type' => 'wysiwyg',
          'media_upload' => false,
          'tabs' => 'visual',
          'toolbar' => 'minial',
        ],
        [
          'key' => "field_{$key}_cta_button",
          'name' => 'cta_button',
          'label' => __('Call to action button', 'starter'),
          'type' => 'link',
        ],
      ],
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
