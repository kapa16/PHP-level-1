<?php
session_start();

//---------Path------------
define('SITE_DIR', __DIR__ . '/../');
define('TEMPLATE_DIR', SITE_DIR . 'templates/');
define('CONFIG_DIR', SITE_DIR . 'config/');
define('DATA_DIR', SITE_DIR . 'dta/');
define('WWW_DIR', SITE_DIR . 'public/');
define('ENGINE_DIR', SITE_DIR . 'engine/');

//---------Database------------
define('DB_HOST', 'localhost');
define('DB_USER', 'geek_brains');
define('DB_PASS', '123123');
define('DB_NAME', 'geek_brains_shop');

//---------Sort methods------------
define('SORT_BY_ID', 'id');
define('SORT_BY_DATE', 'date');
define('SORT_BY_TITLE', 'title');
define('SORT_BY_NAME', 'name');
define('SORT_BY_VIEWS', 'views');

//---------Templates------------
define('INDEX_TEMPLATE', TEMPLATE_DIR . 'index.tpl');
define('LOGIN_TEMPLATE', TEMPLATE_DIR . 'login.tpl');
define('REGISTRATION_TEMPLATE', TEMPLATE_DIR . 'registration.tpl');
define('PERSONAL_AREA_TEMPLATE', TEMPLATE_DIR . 'personal_area.tpl');

define('IMAGE_GALLERY_TEMPLATE', TEMPLATE_DIR . 'gallery.tpl');
define('IMAGE_CARD_TEMPLATE', TEMPLATE_DIR . 'image_card.tpl');
define('IMAGE_VIEW_TEMPLATE', TEMPLATE_DIR . 'image_view.tpl');

define('REVIEW_CARD_TEMPLATE', TEMPLATE_DIR . 'review_card.tpl');
define('REVIEW_CONTAINER_TEMPLATE', TEMPLATE_DIR . 'reviews_container.tpl');

define('PRODUCTS_CATALOG_TEMPLATE', TEMPLATE_DIR . 'product_catalog.tpl');
define('PRODUCT_CARD_TEMPLATE', TEMPLATE_DIR . 'product_card.tpl');
define('PRODUCT_VIEW_TEMPLATE', TEMPLATE_DIR . 'product_view.tpl');

//---------Load engine------------
require_once ENGINE_DIR . 'menu.php';
require_once ENGINE_DIR . 'db.php';
require_once ENGINE_DIR . 'functions.php';
require_once ENGINE_DIR . 'gallery.php';
require_once ENGINE_DIR . 'reviews.php';
require_once ENGINE_DIR . 'products.php';
require_once ENGINE_DIR . 'products_crud.php';
require_once ENGINE_DIR . 'users.php';
require_once ENGINE_DIR . 'cart.php';