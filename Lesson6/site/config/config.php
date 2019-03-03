<?php

define('SITE_DIR', __DIR__ . '/../');
define('TEMPLATE_DIR', SITE_DIR . 'templates/');
define('CONFIG_DIR', SITE_DIR . 'config/');
define('DATA_DIR', SITE_DIR . 'dta/');
define('WWW_DIR', SITE_DIR . 'public/');
define('ENGINE_DIR', SITE_DIR . 'engine/');

define('DB_HOST', 'localhost');
define('DB_USER', 'geek_brains');
define('DB_PASS', '123123');
define('DB_NAME', 'geek_brains_shop');

define('SORT_BY_ID', 'id');
define('SORT_BY_DATE', 'date');
define('SORT_BY_TITLE', 'title');
define('SORT_BY_VIEWS', 'views');

define('INDEX_TEMPLATE', TEMPLATE_DIR . 'index.tpl');
define('IMAGE_GALLERY_TEMPLATE', TEMPLATE_DIR . 'gallery.tpl');
define('IMAGE_CARD_TEMPLATE', TEMPLATE_DIR . 'image_card.tpl');
define('IMAGE_VIEW_TEMPLATE', TEMPLATE_DIR . 'image_view.tpl');

require_once(ENGINE_DIR . 'db.php');
require_once(ENGINE_DIR . 'functions.php');
require_once(ENGINE_DIR . 'gallery.php');
