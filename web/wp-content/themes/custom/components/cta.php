<?php
if (!get_field('cta_title', 'option')) {
  return;
} ?>

<footer class="wrapper">
  <div class="px-5 py-10 md:py-15 bg-brand-50 rounded-lg">
    <div class="w-full max-w-[720px] mx-auto text-center flex flex-col items-center">
      <h2>
        <?= get_field('cta_title', 'option') ?>
      </h2>

      <?= get_field('cta_text', 'option') ?>

      <?= component('button', get_field('cta_button', 'option')) ?>
    </div>
  </div>
</footer>
