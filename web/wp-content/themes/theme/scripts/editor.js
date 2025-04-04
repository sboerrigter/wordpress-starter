wp.domReady(() => {
  // @todo check if this stuff is still needed
  //   // Unregister block styles
  //   wp.blocks.unregisterBlockStyle('core/button', 'outline');

  wp.blocks.unregisterBlockStyle('core/image', 'default');
  wp.blocks.unregisterBlockStyle('core/image', 'rounded');

  wp.blocks.unregisterBlockStyle('core/separator', 'default');
  wp.blocks.unregisterBlockStyle('core/separator', 'dots');
  wp.blocks.unregisterBlockStyle('core/separator', 'wide');

  //   // Unregister format types
  //   wp.richText.unregisterFormatType('core/code');
  //   wp.richText.unregisterFormatType('core/image');
  //   wp.richText.unregisterFormatType('core/keyboard');
});
