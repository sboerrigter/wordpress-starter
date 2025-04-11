<?php
$text = __(
  'Unfortunately, this page doesn\'t exists. You can go to the homepage, or use the menu above to find the page you are looking for.',
  'theme'
);
$button = component('button', [
  'title' => __('To the homepage', 'theme'),
  'url' => home_url(),
]);
$content = "<p>{$text}</p> {$button}";
?>

<?= component('head') ?>
<?= component('header') ?>
<?= component('hero') ?>
<?= component('content', [
  'title' => __('Page not found', 'theme'),
  'content' => $content,
]) ?>
<?= component('cta') ?>
<?= component('footer') ?>
