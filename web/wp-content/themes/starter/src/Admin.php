<?php

namespace Starter;

use WP_Admin_Bar;

final class Admin
{
  public static function init()
  {
    add_action('admin_head', [static::class, 'adminNotices']);
    add_action('admin_bar_menu', [static::class, 'adminBar']);
    add_action('admin_menu', [static::class, 'adminMenu']);
    add_filter('custom_menu_order', '__return_true');
    add_action('menu_order', [static::class, 'menuOrder']);
  }

  // Hide WordPress update notice
  public static function adminNotices()
  {
    remove_action('admin_notices', 'update_nag', 3);
  }

  // Remove admin bar items
  public static function adminBar(WP_Admin_Bar $adminBar)
  {
    $adminBar->remove_menu('comments');
  }

  // Add and remove admin menu items
  public static function adminMenu()
  {
    global $menu;

    // Add extra menu separator
    $menu[] = ['', 'read', 'separator3', '', 'wp-menu-separator'];

    // Remove menu items
    remove_menu_page('edit-comments.php');
  }

  // Reorder admin menu items and put any items not in this list at the end
  public static function menuOrder(array $order)
  {
    $newOrder = [
      'index.php', // Dashboard

      'separator1', // ---

      'edit.php?post_type=page', // Pages
      'edit.php', // Posts

      'separator2', // ---

      'general-content', // General content
      'upload.php', // Media

      'separator3', // ---

      'themes.php', // Appaerance
      'plugins.php', // Plugins
      'users.php', // Users
      'tools.php', // Tools
      'options-general.php', // Settings

      'separator-last', // ---

      'edit.php?post_type=acf-field-group', // ACF
      'varnish-page', // Proxy cache
      'rank-math', // Rank Math SEO
      'wp-mail-smtp', // WP Mail SMTP
    ];

    return array_merge($newOrder, array_diff($order, $newOrder));
  }
}
