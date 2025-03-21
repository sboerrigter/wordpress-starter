<?php $items = wp_get_nav_menu_items(get_nav_menu_locations()['main']); ?>

<div class="
  menu
  flex flex-col absolute left-0 top-0 w-full px-5 py-15 bg-blue-900 z-10
  opacity-0 -translate-y-full pointer-events-none transition-all
  md:px-10
  lg:flex-row lg:bg-transparent lg:p-0 lg:relative lg:w-auto
  lg:opacity-100 lg:translate-y-0 lg:pointer-events-auto
">
  <?php foreach ($items as $item) {

    if ($item->menu_item_parent) {
      continue;
    }

    $children = array_filter($items, function ($i) use ($item) {
      return $i->menu_item_parent == $item->ID;
    });
    ?>
    <div class="group relative">
      <a
        class="
          flex items-center gap-1 py-2 font-heading font-bold text-2xl leading-normal text-white hover:text-sky-400
          lg:text-gray-900 lg:font-semibold lg:text-base lg:px-4 lg:py-3 lg:font-sans lg:hover:text-sky-400
        "
        href="<?= $item->url ?>">
        <?= $item->title ?>

        <?php if ($children) { ?>
          <svg
            class="hidden lg:flex flex-none w-4 h-4 translate-y-px"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        <?php } ?>
      </a>

      <?php if ($children) { ?>
        <div
          class="
            flex flex-col pl-5
            lg:opacity-0 lg:-translate-y-2 lg:pointer-events-none lg:transition-all
            lg:group-hover:opacity-100 lg:group-hover:translate-y-0 lg:group-hover:pointer-events-auto
            lg:absolute lg:left-4 lg:top-12 lg:w-[300px] lg:bg-blue-900 lg:p-5 lg:rounded
          ">
          <?php foreach ($children as $child) { ?>
            <a
              class="block py-1 font-semibold text-white hover:text-sky-400"
              href="<?= $child->url ?>">
              <?= $child->title ?>
            </a>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  <?php
  } ?>
</div>