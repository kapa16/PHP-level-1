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

$templateData['title'] = 'Product';
$templateData['header'] = 'Информация о товаре';
$templateData['content'] = $viewHtml;

echo render(INDEX_TEMPLATE, $templateData);

setPhotoViews($productId, $views);
