<?php

namespace Starter;

class Security
{
  public static function init()
  {
    // Disable XML-RPC and REST API
    add_filter('xmlrpc_enabled', '__return_false');
    add_filter('rest_enabled', '__return_false');

    // Hide WordPress version
    remove_action('wp_head', 'wp_generator');
    add_filter('the_generator', '__return_empty_string');
  }
}
