<?php

namespace Theme;

use WP_Error;

class Security
{
  public static function init()
  {
    // Disable XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');
    add_filter('xmlrpc_methods', '__return_false');

    // Disable REST API
    add_filter('rest_authentication_errors', [static::class, 'rest_errors']);
    add_filter('rest_endpoints', [static::class, 'disable_rest_endpoints']);

    // Hide WordPress version
    remove_action('wp_head', 'wp_generator');
    add_filter('the_generator', '__return_empty_string');
  }

  // Deny access to Rest API if user is not logged in
  static function rest_errors($errors)
  {
    if (!is_user_logged_in()) {
      return new WP_Error('access_denied', 'Rest API is disabled', [
        'status' => 403,
      ]);
    }

    return $errors;
  }

  static function disable_rest_endpoints(array $endpoints)
  {
    if (!is_user_logged_in()) {
      if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
      }

      if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
      }
    }

    return $endpoints;
  }
}
