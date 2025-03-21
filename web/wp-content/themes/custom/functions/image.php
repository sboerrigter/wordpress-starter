<?php

use Theme\Image;

// Get image element based on a n array with arguments
function image(array $args = [])
{
  $image = new Image($args);
  echo $image->element();
}
