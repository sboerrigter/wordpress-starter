<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  <title><?= wp_title() ?></title>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
  </head>

  <body class="font-[Inter] text-gray-800 antialiased">
    <?php wp_body_open(); ?>
