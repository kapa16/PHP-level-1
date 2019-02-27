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

define('SORT_IMAGE_BY_VIEWS', 'views');
define('SORT_IMAGE_BY_NAME', 'title');
define('SORT_IMAGE_BY_ID', 'id');

require_once(ENGINE_DIR . 'db.php');
require_once(ENGINE_DIR . 'functions.php');
