<?php
if (!$youtubeId) {
  return;
}

// Get thumbnail image URL
$image = "https://i.ytimg.com/vi/{$youtubeId}/maxresdefault.jpg";
$status = wp_remote_retrieve_response_code(wp_remote_get($image));

if ($status !== 200) {
  $image = "https://i.ytimg.com/vi/{$youtubeId}/hqdefault.jpg";
}
?>

<div class="w-full aspect-video rounded overflow-hidden bg-gray-600">
  <button
    aria-label="Play YouTube video"
    class="youtube relative cursor-pointer group"
    data-youtube-id="<?= $youtubeId ?>"
  >
    <div class="
      absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2
      flex items-center justify-center w-1/6 aspect-square rounded-full
      bg-primary-600 text-white group-hover:bg-primary-800 transition-colors
    ">
      <svg
        class="w-1/3 h-1/3 translate-x-1/8"
        viewBox="0 0 40 40"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path d="m0 0 40 20-40 20z" fill="currentColor"/>
      </svg>
    </div>

    <img
      src="<?= $image ?>"
      width="720"
      height="<?= round((720 / 16) * 9) ?>"
      loading="lazy"
    />
  </button>
</div>
