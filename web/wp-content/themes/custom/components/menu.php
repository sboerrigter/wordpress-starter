
<div class="
  menu flex flex-col z-10

  max-lg:bg-primary-900
  max-lg:w-full max-lg:min-h-screen max-lg:p-5 max-lg:pt-20
  max-lg:absolute top-0 left-0
  max-lg:opacity-0 max-lg:transition-opacity max-lg:-translate-y-full max-lg:pointer-events-none

  lg:flex-row lg:py-4
">
  <?php foreach (Theme\Menu::items('main') as $item) { ?>
    <?= component('menu-item', ['item' => $item]) ?>
  <?php } ?>
</div>