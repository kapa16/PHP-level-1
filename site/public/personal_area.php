<?php

require_once __DIR__ . '/../config/config.php';

if (empty($_SESSION['login'])) {
    header('Location: /');
}
$user = $_SESSION['login'];

$userId = $user['id'] ?? 0;

$orders = getUserOrders($userId);
$ordersHtml = '';
foreach ($orders as $order) {
    $orderProducts = getOrderProducts($order['id']);
    $orderProductsHtml = '';
    foreach ($orderProducts as $product) {
        $orderProductsData = [
            'name' => $product['name'],
            'quantity' => $product['quantity'],
            'price' => $product['price'],
            'sum' => $product['quantity'] * $product['price'],
        ];
        $orderProductsHtml .= render(ORDER_PRODUCTS, $orderProductsData);
    }

    $orderData = [
        'orderId' => $order['id'],
        'orderStatus' => mb_strtolower($order['status']),
        'orderProducts' => $orderProductsHtml,
    ];
    $ordersHtml .= render(ORDERS_LIST, $orderData);
}


$personalAreaData = [
    'personalAreaText'  => 'Добро пожаловать в наш магазин',
    'personalAreaName'  => $user['name'],
    'personalAreaLogin' => $user['login'],
    'orders'            => $ordersHtml,
];

$loginHtml = render(PERSONAL_AREA_TEMPLATE, $personalAreaData);

$templateData['title'] = 'Shop';
$templateData['header'] = 'Личный кабинет';
$templateData['content'] = $loginHtml;

echo render(INDEX_TEMPLATE, $templateData);