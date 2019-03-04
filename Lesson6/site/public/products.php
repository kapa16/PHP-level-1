<?php

require_once(__DIR__ . '/../config/config.php');


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

$templateData = [
    'title'         => 'Shop',
    'header'        => 'Каталог магазина',
    'currentYear'   => date('Y'),
    'content'       => $catalogHtml,
    'reviewsHeader' => 'Комментарии:',
    'reviews'       => $reviewsHtml,
];

echo render(INDEX_TEMPLATE, $templateData);

setPhotoViews($ProductId, $views);
