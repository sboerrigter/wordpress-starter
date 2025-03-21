<?php
// Get template component from components folder with optional variables
function component(string $name, array $variables = [])
{
  $file = dirname(__FILE__, 2) . '/components/' . $name . '.php';

  extract($variables);
  ob_start();
  require $file;

  return ob_get_clean();
}
