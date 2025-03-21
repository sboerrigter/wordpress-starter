<div class="
  menu-item
  <?= !isset($isChild)
    ? 'max-lg:border-t max-lg:last:border-b max-lg:border-white/25 font-semibold'
    : 'font-normal' ?>
">
      <div class="flex">
        <a
          class="
            <?= !isset($isChild) ? 'p-3' : 'p-1' ?>

            text-white/75 hover:text-white/100
            max-lg:w-full
            flex gap-1 items-center
            lg:py-2 lg:text-gray-800 lg:hover:text-blue-500
          "
          href="<?= $item->url ?>"
        >
          <?= $item->title ?>

          <?php if ($item->children) { ?>
            <div class="hidden lg:block">
              <?= component('svg/chevron-down', ['class' => 'w-5 h-5']) ?>
            </div>
          <?php } ?>
        </a>

        <?php if ($item->children) { ?>
          <div class="
            menu-item-toggle
            flex items-center justify-center
            w-12 h-12
            text-white/50 hover:text-white/100 transition-colors
            -rotate-90 transition:transform
            cursor-pointer user-select-none

            lg:hidden
          ">
            <?= component('svg/chevron-down', ['class' => 'w-5 h-5']) ?>
          </div>
        <?php } ?>
      </div>

      <?php if ($item->children) { ?>
        <div class="menu-item-children hidden flex-col ml-5 mb-5">
          <?php foreach ($item->children as $item) { ?>
            <?= component('menu-item', [
              'item' => $item,
              'isChild' => true,
            ]) ?>
          <?php } ?>
        </div>
      <?php } ?>
    </div>