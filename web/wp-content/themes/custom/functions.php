<?php

namespace Theme;

// Require functions
require_once 'functions/component.php';

// Initialize classes
Admin::init();
Assets::init();
Editor::init();
Media::init();
Security::init();
Menu::init();
WordPress::init();

Plugins\Acf\GeneralContent::init();

PostTypes\Page::init();
PostTypes\Post::init();
