<?php

namespace Starter;

class Content
{
  public static function init()
  {
    add_filter('the_content', [static::class, 'removeEmptyParagraphs']);
  }

  // Remove empty paragraphs from the content
  public static function removeEmptyParagraphs(string $content)
  {
    //  @todo
    return $content;
  }
}
