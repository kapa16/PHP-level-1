<?php

require_once(__DIR__ . '/../config/config.php');

if (empty($_GET['product-id'])) {
    header('Location: /products.php');
    die;
}

$productId = +$_GET['product-id'];

$product = getProduct($productId);

if (!$product) {
    header('Location: /products.php');
    die;
}

$productHtml = getHtmlProduct($product, PRODUCT_VIEW_TEMPLATE);
$viewHtml = getHtmlCatalog($productHtml);

$templateData = [
    'title'         => 'Product',
    'header'        => 'Информация о товаре',
    'currentYear'   => date('Y'),
    'content'       => $viewHtml,
    'reviewsHeader' => '',
    'reviews'       => '',
];

echo render(INDEX_TEMPLATE, $templateData);

setPhotoViews($productId, $views);
