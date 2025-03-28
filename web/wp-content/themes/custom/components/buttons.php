<?php if (empty($buttons)) {
  return;
} ?>

<div class="flex gap-2 flex-wrap <?= $class ?? '' ?>">
  <?php foreach ($buttons as $button) { ?>
    <?= component(
      'button',
      array_merge(
        [
          'class' => "button-{$button['style']}",
        ],
        $button['link']
      )
    ) ?>
  <?php } ?>
</div>