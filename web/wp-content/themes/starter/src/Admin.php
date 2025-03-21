<?php

namespace Starter;

use WP_Admin_Bar;

final class Admin
{
  public static function init()
  {
    add_action('admin_head', [static::class, 'admin_notices']);
    add_action('admin_bar_menu', [static::class, 'admin_bar']);
    add_action('admin_menu', [static::class, 'admin_menu']);
    add_filter('custom_menu_order', '__return_true');
    add_action('menu_order', [static::class, 'menu_order']);
  }

  // Hide WordPress update notice
  public static function admin_notices()
  {
    remove_action('admin_notices', 'update_nag', 3);
  }

  // Remove admin bar items
  public static function admin_bar(WP_Admin_Bar $admin_bar)
  {
    $admin_bar->remove_menu('comments');
  }

  // Add and remove admin menu items
  public static function admin_menu()
  {
    global $menu;

    // Add extra menu separator
    $menu[] = ['', 'read', 'separator3', '', 'wp-menu-separator'];

    // Remove menu items
    remove_menu_page('edit-comments.php');
  }

  // Reorder admin menu items and put any items not in this list at the end
  public static function menu_order(array $order)
  {
    $newOrder = [
      'index.php', // Dashboard

      'separator1',

      'edit.php?post_type=page', // Pages
      'edit.php', // Posts

      'separator2',

      'general-content', // General content
      'upload.php', // Media
      'edit-comments.php', // Comments

      'separator3',

      'themes.php', // Appaerance
      'plugins.php', // Plugins
      'users.php', // Users
      'tools.php', // Tools
      'options-general.php', // Settings

      'separator-last',

      'edit.php?post_type=acf-field-group', // ACF
      'varnish-page', // Proxy cache
      'rank-math', // Rank Math SEO
      'wp-mail-smtp', // WP Mail SMTP
    ];

    return array_merge($newOrder, array_diff($order, $newOrder));
  }
}
