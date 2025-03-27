<header class="wrapper">
  <?php if ($image = get_field('_thumbnail_id')) { ?>
    <?= component('image', [
      'class' => 'rounded-lg max-h-[600px] object-cover',
      'src' => $image,
      'width' => 1200,
      'height' => 900,
      'widths' => [335, 480, 600, 1200],
    ]) ?>
  <?php } else { ?>
    <hr class="my-0" />
  <?php } ?>
</header>
