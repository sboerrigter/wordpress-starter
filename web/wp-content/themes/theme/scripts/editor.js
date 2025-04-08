wp.domReady(function () {
  // Unregister block styles
  wp.blocks.unregisterBlockStyle('core/image', 'default');
  wp.blocks.unregisterBlockStyle('core/image', 'rounded');

  wp.blocks.unregisterBlockStyle('core/separator', 'default');
  wp.blocks.unregisterBlockStyle('core/separator', 'dots');
  wp.blocks.unregisterBlockStyle('core/separator', 'wide');

  wp.blocks.unregisterBlockStyle('core/quote', 'default');
  wp.blocks.unregisterBlockStyle('core/quote', 'plain');
});
