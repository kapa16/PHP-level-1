<?php

function getOrderStatusList()
{
    $sql = 'SELECT * FROM `order_status`;';
    return getAssocData($sql);
}

function getUserOrders(int $userId)
{
    $sql = "SELECT `order`.`id`, os.`status` FROM `order` 
        LEFT JOIN `order_status` os ON `order`.`status_id` = os.`id` 
        WHERE `user_id`='{$userId}'
        ORDER BY `create_data`;";
    return getAssocData($sql);
}

function getOrders()
{
    $sql = 'SELECT `order`.`id`, os.`status`, `status_id` FROM `order` 
        LEFT JOIN `order_status` os ON `order`.`status_id` = os.`id`
        ORDER BY `create_data`;';
    return getAssocData($sql);
}

function getOrderProducts(int $orderId)
{
    $sql = "SELECT `products`.`id` AS 'id', `name`, `quantity`, `price`
        FROM `order_product`
        LEFT JOIN `products` ON `products`.`id` = `order_product`.`product_id`
        WHERE `order_product`.`order_id`={$orderId};";
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

function changeOrderStatus($orderId, $orderStatus)
{
    $sql = "UPDATE `order` 
        SET `status_id`={$orderStatus}, `change_data`=NOW()
        WHERE `id`={$orderId};";
    return executeQuery($sql);
}
