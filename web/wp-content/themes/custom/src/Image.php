<?php

namespace Theme;

class Image
{
  public array $args;

  public function __construct(array $args)
  {
    // Set src and alt attributes if an image ID is passed to $args['src']
    if (
      is_int($args['src']) &&
      ($src = wp_get_attachment_image_url($args['src'], 'full'))
    ) {
      $id = $args['src'];
      $alt = get_post_meta($id, '_wp_attachment_image_alt', true);

      $args['src'] = $src;
      $args['alt'] = $args['alt'] ?? $alt;
    }

    // Set defaults
    $args['class'] = $args['class'] ?? 'object-cover bg-slate-600';
    $args['height'] = $args['height'] ?? 'auto';
    $args['loading'] = $args['loading'] ?? 'lazy';
    $args['sizes'] = $args['sizes'] ?? 'auto';
    $args['width'] = $args['width'] ?? 'auto';

    // Set srcset argument
    // @todo

    // Set arguments
    $this->args = $args;
  }

  // Get <img> element with arguments
  public function element()
  {
    $args = $this->args;

    // Bail if image has no src argument
    if (!isset($args['src'])) {
      return null;
    }

    // Remove empty and non string values arguments
    $args = array_filter($args, function ($value) {
      return !empty($value) && (is_string($value) || is_numeric($value));
    });

    // Map arguments array to string
    $attributes = implode(
      ' ',
      array_map(function ($key) use ($args) {
        $value = strval($args[$key]);
        return "{$key}='{$value}'";
      }, array_keys($args))
    );

    return "<img {$attributes} />";
  }
}
