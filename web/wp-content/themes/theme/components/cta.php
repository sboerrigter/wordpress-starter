<footer class="wrapper">
  <?php if (get_field('show_cta')) { ?>
    <?php
    $title = get_field('cta_title') ?: get_field('cta_title', 'option');
    $text = get_field('cta_text') ?: get_field('cta_text', 'option');
    $buttons = get_field('cta_buttons') ?: get_field('cta_buttons', 'option');
    ?>

    <div class="px-5 py-10 md:py-15 bg-primary-50 rounded-lg">
      <div class="w-full max-w-[720px] mx-auto text-center flex flex-col items-center">
        <h2>
          <?= $title ?>
        </h2>

        <?= get_field('cta_text', 'option') ?>

        <?= component('buttons', [
          'buttons' => $buttons,
          'class' => 'justify-center',
        ]) ?>
      </div>
    </div>
  <?php } else { ?>
    <hr />
  <?php } ?>
</footer>

