<?php

require_once __DIR__ . '/../config/config.php';


$products = getProducts();
if (!$products) {
    fillTestProduct();
    header('Location: /products.php');
    exit;
}
$productsHtml = getHtmlProducts($products);
$catalogHtml = getHtmlCatalog($productsHtml);

$reviews = getReviews();
$reviewsHtml = getHtmlReviews($reviews);

$templateData['title'] = 'Shop';
$templateData['header'] = 'Каталог магазина';
$templateData['content'] = $catalogHtml;

echo render(INDEX_TEMPLATE, $templateData);

