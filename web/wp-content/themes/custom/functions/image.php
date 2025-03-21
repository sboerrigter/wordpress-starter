<?php

use Theme\Image;

// Get image element based on a n array with arguments
function image(array $attributes = [])
{
  $image = new Image($attributes);
  echo $image->element();
}
