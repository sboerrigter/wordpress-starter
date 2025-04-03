<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  <title><?= wp_title() ?></title>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
  </head>

  <body class="font-[Inter] bg-white text-gray-800 antialiased">
    <?php wp_body_open(); ?>
