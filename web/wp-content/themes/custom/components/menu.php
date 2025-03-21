
<div class="
  menu bg-slate-800
  absolute top-0 left-0 z-10
  flex flex-col w-full min-h-screen p-5 pt-20
  opacity-0 transition-opacity -translate-y-full

  lg:flex-row lg:bg-transparent

  menu-open

  lg:p-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-y-0 lg:pointer-events-auto lg:py-4
">
  <?php foreach (Theme\Menu::items('main') as $item) { ?>
    <div class="
      group relative
      font-semibold text-white
      flex justify-between
      border-t last:border-b border-white/25
    ">
      <a
        class="
         p-3 text-white/75 hover:text-white/100




        lg:text-slate-800 lg:text-base lg:px-4 lg:py-2 lg:font-sans lg:hover:text-slate-500"
        href="<?= $item->url ?>"
      >
        <?= $item->title ?>


      </a>

      <?php if ($item->children) { ?>
          <div class="w-10 h-10 center">
            <?= component('svg/chevron-down', ['class' => 'w-4 h-4']) ?>
        </div>

        <?php } ?>
      </div>

      <?php if ($item->children) { ?>
        <div
          class="
          hidden


          flex flex-col pl-5
            lg:opacity-0 lg:-translate-y-2 lg:pointer-events-none lg:transition-all
            lg:group-hover:opacity-100 lg:group-hover:translate-y-0 lg:group-hover:pointer-events-auto
            lg:absolute lg:right-5 lg:top-12 lg:w-[300px] lg:bg-slate-800 lg:rounded
          ">
          <?php foreach ($item->children as $child) { ?>
            <a
              class="block py-1 font-semibold text-white hover:text-slate-500"
              href="<?= $child->url ?>">
              <?= $child->title ?>
            </a>
          <?php } ?>
        </div>
      <?php } ?>
  <?php } ?>
</div>