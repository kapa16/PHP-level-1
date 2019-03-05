<?php

require_once __DIR__ . '/../../config/config.php';

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$image = $_POST['image'] ?? '';

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

$result = createProduct($name, $description, $price, $image);
if ($result) {
    $name = '';
    $description = '';
    $price = '';
    $image = '';
}

$buttonTitle = 'Добавить';
$action = '/admin/createProduct.php';
require_once 'product_form.php';