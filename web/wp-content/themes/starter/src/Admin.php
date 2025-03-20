<?php

namespace Starter;

final class Admin
{
  public static function init()
  {
    add_action('admin_head', [static::class, 'admin_head']);
    add_action('admin_menu', [static::class, 'admin_menu']);
    add_filter('custom_menu_order', '__return_true');
    add_action('menu_order', [static::class, 'menu_order'], 10, 1);
    add_action('admin_bar_menu', [static::class, 'admin_bar_menu']);
  }

  // Hide WordPress update notice
  public static function admin_head(): void
  {
    remove_action('admin_notices', 'update_nag', 3);
  }

  // Add and remove admin menu items
  public static function admin_menu()
  {
    global $menu;

    remove_menu_page('edit-comments.php');

    // Add extra menu separator
    $menu[] = ['', 'read', 'separator3', '', 'wp-menu-separator'];
  }

  // Reorder admin menu items and put any items not in this list at the end
  public static function menu_order($order)
  {
    $newOrder = [
      'index.php', // Dashboard

      'separator1', // ---

      'edit.php?post_type=page', // Pages
      'edit.php', // Posts

      'separator2', // ---

      'general', // General content
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

  // Remove admin bar items
  public static function admin_bar_menu($adminBar)
  {
    $adminBar->remove_menu('comments');
  }
}
