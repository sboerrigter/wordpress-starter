<?php if (!get_field('cta_title', 'option')) {
  return;
} ?>

<footer class="wrapper">
  <div class="px-5 py-10 md:py-15 bg-primary-50 rounded-lg">
    <div class="w-full max-w-[720px] mx-auto text-center flex flex-col items-center">
      <h2>
        <?= get_field('cta_title', 'option') ?>
      </h2>

      <?= get_field('cta_text', 'option') ?>

      <?= component('buttons', [
        'buttons' => get_field('cta_buttons', 'option'),
        'class' => 'justify-center',
      ]) ?>
    </div>
  </div>
</footer>
