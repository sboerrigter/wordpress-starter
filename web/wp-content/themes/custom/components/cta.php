<?php
if (!get_field('cta_title', 'option')) {
  return;
} ?>

<footer class="wrapper">
  <div class="flex flex-col items-center p-5 bg-gray-100 rounded-lg">
    <h2>
      <?= get_field('cta_title', 'option') ?>
    </h2>

    <?= get_field('cta_text', 'option') ?>

    <?= component('button', get_field('cta_button', 'option')) ?>
  </div>
</footer>
