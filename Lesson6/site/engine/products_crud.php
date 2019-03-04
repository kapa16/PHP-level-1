<?php

function createProduct($product)
{
    $sql = "INSERT INTO `geek_brains_shop`.`products` (`name`, `description`, `price`, `image`)
                VALUES ('" . $product['name'] . "',
                '" . $product['description'] . "',
                " . $product['price'] . ", 
                '" . $product['image'] . "');";
    executeQuery($sql);
}

function readProduct($productId) {
    $sql = 'SELECT * FROM `geek_brains_shop`.`products` WHERE `id`=' . $productId;
    executeQuery($sql);
}

function updateProduct($productId, $fieldName, $newValue) {
    $sql = 'UPDATE `geek_brains_shop`.`products` SET `' . $fieldName . '` = ' . $newValue . ' WHERE `id`=' . $productId;
    executeQuery($sql);
}

function deleteProduct($productId) {
    $sql = 'DELETE FROM `geek_brains_shop`.`products` WHERE `id`=' . $productId;
    executeQuery($sql);
}