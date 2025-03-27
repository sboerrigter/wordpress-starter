<div class="
  menu-item group relative
  <?= !isset($isChild)
    ? 'max-lg:border-t max-lg:last:border-b border-white/25 font-semibold'
    : 'font-normal' ?>
">
  <div class="flex">
    <a
      class="
        flex gap-1 items-center max-lg:w-full no-underline
        text-white/75 hover:text-white/100
        <?= !isset($isChild)
          ? 'p-3 lg:px-4 lg:py-3 lg:text-gray-800 lg:hover:text-brand-600'
          : 'p-1 lg:px-4 lg:w-full' ?>
      "
      href="<?= $item->url ?>"
    >
      <?= $item->title ?>

      <?php if ($item->children) { ?>
        <?= component('svg/chevron-down', [
          'class' => 'hidden lg:block w-5 h-5',
        ]) ?>
      <?php } ?>
    </a>

    <?php if ($item->children) { ?>
      <div class="
        menu-item-toggle
        flex items-center justify-center
        w-12 h-12
        text-white/50 hover:text-white/100
        -rotate-90 transition-all
        cursor-pointer user-select-none

        lg:hidden
      ">
        <?= component('svg/chevron-down', ['class' => 'w-5 h-5']) ?>
      </div>
    <?php } ?>
  </div>

  <?php if ($item->children) { ?>
    <div class="
      menu-item-children hidden flex-col
      max-lg:ml-5 max-lg:mb-5

      lg:group-hover:flex lg:bg-brand-900 lg:rounded lg:w-60 lg:py-3
      lg:absolute lg:left-0 lg:group-last:left-auto lg:group-last:right-0
    ">
      <?php foreach ($item->children as $item) { ?>
        <?= component('menu-item', [
          'item' => $item,
          'isChild' => true,
        ]) ?>
      <?php } ?>
    </div>
  <?php } ?>
</div>