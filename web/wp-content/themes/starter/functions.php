<?php

namespace Starter;

// Require functions
require_once 'functions/component.php';

// Initialize classes
Admin::init();
Assets::init();
Editor::init();
Media::init();

Plugins\Acf\GeneralContent::init();
