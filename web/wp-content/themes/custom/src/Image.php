<?php

namespace Theme;

use InvalidArgumentException;
use League\Glide\Filesystem\FileNotFoundException;
use League\Glide\ServerFactory;

class Image
{
  private int $id;
  private string $url;
  private array $attributes;
  private string $fit;
  private array $widths;
  private int $width;
  private int $height;

  public static function init()
  {
    add_action('after_setup_theme', [static::class, 'handle_resize']);
  }

  public function __construct(array $args)
  {
    // Throw error if src, width or height argument is not set
    if (
      !isset($args['src']) ||
      !isset($args['width']) ||
      !isset($args['height'])
    ) {
      throw new InvalidArgumentException('Missing required "src" argument.');
    }

    // Set URL and alt attributes if an image ID is passed to $args['src']
    if (
      is_int($args['src']) &&
      ($url = wp_get_attachment_image_url($args['src'], 'full'))
    ) {
      $this->id = $args['src'];
      $this->url = $url;

      $alt = get_post_meta($this->id, '_wp_attachment_image_alt', true);
      $args['alt'] = $args['alt'] ?? $alt;
    } else {
      $this->url = $args['src'];
    }

    // Set other properties
    $this->fit = $args['fit'] ?? 'crop';
    $this->height = $args['height'];
    $this->width = $args['width'];
    $this->widths = $args['widths'] ?? [];

    // Set image attributes
    $this->attributes['alt'] = $args['alt'];
    $this->attributes['class'] = $args['class'] ?? 'object-cover bg-slate-600';
    $this->attributes['height'] = $args['height'];
    $this->attributes['loading'] = $args['loading'] ?? 'lazy';
    $this->attributes['sizes'] = $args['sizes'] ?? 'auto';
    $this->attributes['src'] = $this->src();
    $this->attributes['srcset'] = $this->srcset();
    $this->attributes['width'] = $args['width'];
  }

  // Get <img> element with arguments
  public function element()
  {
    $attributes = $this->attributes;

    // Remove empty and non string values attributes
    $attributes = array_filter($attributes, function ($value) {
      return !empty($value) && (is_string($value) || is_numeric($value));
    });

    // Map arguments array to string
    $attributes = implode(
      ' ',
      array_map(function ($key) use ($attributes) {
        $value = strval($attributes[$key]);
        return "{$key}='{$value}'";
      }, array_keys($attributes))
    );

    return "<img {$attributes} />";
  }

  private function src()
  {
    return $this->resize([
      'h' => $this->height,
      'w' => $this->width,
    ]);
  }

  private function srcset()
  {
    // Add image width
    $widths = array_merge($this->widths, [$this->width]);

    // Add retina image sizes
    $widths = array_merge(
      $widths,
      array_map(function ($number) {
        return $number * 2;
      }, $widths)
    );

    // Remove duplicates widths and sort
    $widths = array_unique($widths);
    sort($widths);

    // Map widths to array with resized images and widths
    $images = array_map(function ($width) {
      $height = isset($this->height)
        ? intval(round(($width / $this->width) * $this->height))
        : null;

      $src = $this->resize([
        'h' => $height,
        'w' => $width,
      ]);

      return "{$src} {$width}w";
    }, $widths);

    return implode(', ', $images);
  }

  // Add resize parameters for Glide to image src
  private function resize(array $params)
  {
    // Replace image URL so it is handeled by Glide
    $src = str_replace('/wp-content/uploads', '/uploads', $this->url);

    // Add fit property
    $params = array_merge($params, ['fit' => $this->fit]);

    // Return image URL with Glide parameters
    $query = http_build_query($params);
    return "$src?$query";
  }

  // Handle image resizing with Glide
  public static function handle_resize()
  {
    $uri = strtok($_SERVER['REQUEST_URI'], '?');

    // Bail if this is not an image request or if 'w' parameter is not present
    if (!str_starts_with($uri, '/uploads/') || !isset($_GET['w'])) {
      return;
    }

    // Return the resized image or 404 error page if image is not found
    try {
      $server = ServerFactory::create([
        'source' => 'wp-content',
        'cache' => 'wp-content/uploads/cache',
        'max_image_size' => 2400 * 2400,
      ]);
      $server->outputImage($uri, $_GET);
    } catch (FileNotFoundException $exception) {
      status_header(404);
      include get_query_template('404');
    }

    die();
  }
}
