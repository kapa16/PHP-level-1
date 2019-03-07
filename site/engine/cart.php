<?php

function getCart(int $userId)
{
    $sql = 'SELECT * FROM `cart` WHERE `user_id`=' . $userId . ';';
    return getAssocData($sql)[0];
}

function getCartProducts(int $userId)
{
    $cart = getCart($userId);
    if (!$cart) {
        return null;
    }
    $sql = "SELECT `cart_id` , `products`.`id` AS 'id_product', `products`.`name` AS 'product_name', `quantity`, `price` 
        FROM `cart_product` 
        LEFT JOIN `products` ON `products`.`id` = `cart_product`.`product_id` 
        WHERE `cart_product`.`cart_id`=" . $cart['id'] . ';';
    return getAssocData($sql);
}

function createCart(int $userId)
{
    $sql = 'INSERT INTO `cart` (`user_id`) VALUES (?);';
    return executePrepareQuery($sql, ['d', $userId], true);
}

function addProductToCart(int $userId, $product)
{
    $cart = getCart($userId);

    if (!$cart) {
        $cartId = createCart($userId);
    } else {
        $cartId = $cart['id'];
    }

    $sql = 'INSERT INTO `cart_product` (`cart_id`, `product_id`, `quantity`) 
        VALUES (?, ?, ?);';
    return executePrepareQuery($sql, ['ddd', $cartId, +$product['productId'], +$product['quantity']], true);
}

function deleteCartProduct(int $userId, $product)
{
    $cart = getCart($userId);
    if (!$cart) {
        return null;
    }
    $sql = 'DELETE FROM `cart_product` 
        WHERE `product_id`=' . $product['productId'] . ' 
        AND `cart_id`=' . $cart['id'] . ';';
    return executeQuery($sql);
}

function changeQuantityProductCart(int $userId, $product)
{
    $cart = getCart($userId);
    if (!$cart) {
        return null;
    }
    $sql = 'UPDATE `cart_product` 
        SET `quantity` = ' . $product['quantity'] . ' 
        WHERE `product_id`=' . $product['productId'] . ' 
        AND `cart_id`=' . $cart['id'] . ';';
    return executeQuery($sql);
}