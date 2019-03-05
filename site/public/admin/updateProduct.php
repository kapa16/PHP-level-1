<?php

require_once __DIR__ . '/../../config/config.php';

if (empty($_GET['product-id'])) {
    header('Location: /products.php');
    die;
}

$productId = +$_GET['product-id'];
$product = getProduct($productId);

$action = $_POST['update'] ?? false;
$name = $_POST['name'] ?? $product['name'];
$description = $_POST['description'] ?? $product['description'];
$price = $_POST['price'] ?? $product['price'];
$image = $_POST['image'] ?? $product['image'];

if (empty($name)) {
    echo 'Введите имя <br>';
}
if (empty($description)) {
    echo 'Введите описание <br>';
}
if (empty($price)) {
    echo 'Введите цену <br>';
}
if (empty($image)) {
    echo 'Введите путь к изображению <br>';
}

if ($action) {
    $result = updateProduct($productId, $name, $description, $price, $image);
    if ($result) {
        $name = '';
        $description = '';
        $price = '';
        $image = '';
        echo 'Данные товара обновлены';
        echo '<hr>';
    }
}

$buttonTitle = 'Обновить';
$action = '/admin/updateProduct.php';
require_once 'product_form.php';