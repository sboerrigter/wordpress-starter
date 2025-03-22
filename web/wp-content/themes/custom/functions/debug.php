<?php
// Dump a variable and die
function debug($vars)
{
  if (!is_array($vars)) {
    $vars = [$vars];
  } ?>
  <div class="
    fixed left-0 top-0
    flex flex-col gap-5
    w-screen h-screen px-5 py-10
    bg-gray-900/75
    overflow-y-auto z-50
  ">

    <?php foreach ($vars as $var) { ?>
      <pre class="
        bg-gray-800 rounded-md
        text-white text-base
        w-full max-w-screen-md p-5 mx-auto
      "><?php var_dump($var); ?></pre>
      <?php } ?>
  </div>
  <?php
}

// Log a variable to debug.log
function debug_log($vars)
{
  error_log(json_encode($vars));
}

// Aliasses
function dump($vars)
{
  return debug($vars);
}

function dd($vars)
{
  return debug($vars);
}
