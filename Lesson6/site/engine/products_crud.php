<?php

function createProduct($name, $description, $price, $image)
{
    $sql = "INSERT INTO `geek_brains_shop`.`products` (`name`, `description`, `price`, `image`)
                VALUES ('" . htmlspecialchars($name) . "',
                '" . htmlspecialchars($description) . "',
                " . htmlspecialchars($price) . ", 
                '" . htmlspecialchars($image) . "');";
    return executeQuery($sql);
}

function readProduct($productId)
{
    $sql = 'SELECT * FROM `geek_brains_shop`.`products` WHERE `id`=' . $productId;
    return executeQuery($sql);
}

function updateProduct($productId, $name, $description, $price, $image)
{
    $sql = "UPDATE `geek_brains_shop`.`products` SET `name` = '" . $name .
        "', `description` = '" . $description .
        "', `price` = '" . $price .
        "', `image` = '" . $image . "' WHERE `id`=" . $productId;

    return executeQuery($sql);
}

function deleteProduct($productId)
{
    $sql = 'DELETE FROM `geek_brains_shop`.`products` WHERE `id`=' . $productId;
    return executeQuery($sql);
}