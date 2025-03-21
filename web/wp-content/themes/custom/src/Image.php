<?php

namespace Theme;

class Image
{
  static $args;

  public function __construct(array $args)
  {
    // Set arguments
    static::$args = $args;
  }

  // Render <img> element with arguments
  public function element()
  {
    $args = static::$args;

    // Bail if image has no src or width args
    if (!isset($args['src']) || !isset($args['width'])) {
      return null;
    }

    // Map arguments array to string
    $attributes = array_map(function ($key) use ($args) {
      $value = $args[$key];
      return "{$key}={$value}";
    }, array_keys($args));
    $attributes = implode(' ', $attributes);

    return "<img {$attributes} />";
  }
}
