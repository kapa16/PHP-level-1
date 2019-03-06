<?php

function getCart(int $userId)
{
    $sql = 'SELECT * FROM `geek_brains_shop`.`cart` WHERE `user_id`=' . $userId . ';';
    return getAssocData($sql)[0];
}

function getCartProducts(int $userId)
{
    $cart = getCart($userId);
    if (!$cart) {
        return null;
    }
}

function createCart(int $userId)
{
    $sql = 'INSERT INTO `geek_brains_shop`.`cart` (`user_id`) VALUES (?);';
    $resultSql = executePrepareQuery($sql, ['d', $userId], true);
    return $resultSql;
}

function addProductToCart(int $userId, $product)
{
    $cart = getCart($userId);

    if (!$cart) {
        $cartId = createCart($userId);
    } else {
        $cartId = $cart['id'];
    }

    $sql = 'INSERT INTO `geek_brains_shop`.`cart_product` (`cart_id`, `product_id`, `quantity`) VALUES (?, ?, ?);';
    $resultSql = executePrepareQuery($sql, ['ddd', $cartId, $product['productId'], $product['quantity']], true);
    return $resultSql;
}

function deleteCartProduct()
{

}
