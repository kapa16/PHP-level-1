<?php

require_once __DIR__ . '/../../config/config.php';

if (empty($_GET['product-id'])) {
    header('Location: /products.php');
    die;
}

$productId = +$_GET['product-id'];
$result = deleteProduct($productId);

if ($result) {
    echo 'Товар удален';
    echo '<hr>';
    echo '<a href="/">На главную</a>';
}
