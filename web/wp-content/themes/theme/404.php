<?php
$text = __(
  'Unfortunately, this page does not exist. You can go to the homepage, or use the menu above to navigate to other pages.',
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
