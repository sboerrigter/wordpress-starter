<?php

namespace Starter;

class Content
{
  public static function init()
  {
    add_filter('the_content', [static::class, 'remove_empty_paragraphs']);
  }

  // Remove empty paragraphs from the content
  public static function remove_empty_paragraphs(string $content)
  {
    //  @todo
    return $content;
  }
}
