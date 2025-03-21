<?php

namespace Theme;

// Require functions
require_once 'functions/component.php';
require_once 'functions/image.php';

// Initialize classes
Admin::init();
Assets::init();
Editor::init();
Image::init();
Media::init();
Menu::init();
Security::init();
WordPress::init();

Plugins\Acf\GeneralContent::init();

PostTypes\Page::init();
PostTypes\Post::init();
