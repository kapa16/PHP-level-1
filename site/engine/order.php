<?php

function getUserOrders(int $userId)
{
    $sql = "SELECT `order`.`id`, os.`status` FROM `order` 
        LEFT JOIN `order_status` os ON `order`.`status_id` = os.`id` 
        WHERE `user_id`='{$userId}';";
    return getAssocData($sql);
}

//function getOrderProducts(int $userId)
//{
//    $order = getOrder($userId);
//    if (!$order) {
//        return null;
//    }
//    $sql = "SELECT `order_id` , `products`.`id` AS 'id_product', `products`.`name` AS 'product_name', `quantity`, `price`
//        FROM `order_product`
//        LEFT JOIN `products` ON `products`.`id` = `order_product`.`product_id`
//        WHERE `order_product`.`order_id`=" . $order['id'] . ';';
//    return getAssocData($sql);
//}

function getOrderProducts(int $orderId) {
    $sql = "SELECT `order_id` , `products`.`id` AS 'id_product', `products`.`name` AS 'product_name', `quantity`, `price`
        FROM `order_product`
        LEFT JOIN `products` ON `products`.`id` = `order_product`.`product_id`
        WHERE `order_product`.`order_id`=" . $orderId . ';';
    return getAssocData($sql);
}

function createOrder(int $userId)
{
    $sql = "INSERT INTO `order` (`user_id`, `status_id`) VALUES ({$userId}, 1);";
    return insert($sql);
}

function addProductToOrder($orderId, $productId, $quantity)
{
    $sql = "INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) 
        VALUES ({$orderId}, {$productId}, {$quantity});";
    return executeQuery($sql);
}

//function deleteOrderProduct(int $userId, $product)
//{
//    $order = getOrder($userId);
//    if (!$order) {
//        return null;
//    }
//    $sql = 'DELETE FROM `order_product`
//        WHERE `product_id`=' . $product['productId'] . '
//        AND `order_id`=' . $order['id'] . ';';
//    return executeQuery($sql);
//}
//
//function changeQuantityProductOrder(int $userId, $product)
//{
//    $order = getOrder($userId);
//    if (!$order) {
//        return null;
//    }
//    $sql = 'UPDATE `order_product`
//        SET `quantity` = ' . $product['quantity'] . '
//        WHERE `product_id`=' . $product['productId'] . '
//        AND `order_id`=' . $order['id'] . ';';
//    return executeQuery($sql);
//}