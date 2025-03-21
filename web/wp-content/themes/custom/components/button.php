<a class="button <?= $class ?? '' ?>"
    <?php
    if (!empty($url)) {
      echo 'href="' . $url . '" ';
    }
    if (!empty($target)) {
      echo 'target="' . $target . '" ';
    }
    if (!empty($target) && $target === '_blank') {
      echo 'rel="nofollow" ';
    }
    ?>
>
    <?= $title ?>
</a>
