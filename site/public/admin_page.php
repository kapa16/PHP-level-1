<?php

require_once __DIR__ . '/../config/config.php';

if (!getAdminRole()) {
    header('location: /');
}

$orderStatuses = getOrderStatusList();

$orders = getOrders();
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

    $orderStatusesHtml = '';
    foreach ($orderStatuses as $orderStatus) {
        extract($orderStatus, EXTR_OVERWRITE);
        $selected = '';
        if ($order['status_id'] === $id) {
            $selected = 'selected ';
        }
//        var_dump($orderStatus, $id, $order['status_id'], $status);
//        die;
        $orderStatusesHtml .= "<option {$selected} vlaue='{$id}'>{$status}</option>";
    }


    $adminOrderControlData = [
        'selectOptions' => $orderStatusesHtml,
        'orderId' => $order['id'],
    ];

    $adminOrderControlHtml = render(ADMIN_ORDER_CONTROL_TEMPLATE, $adminOrderControlData);

    $orderData = [
        'orderId' => $order['id'],
        'orderStatus' => mb_strtolower($order['status']),
        'orderProducts' => $orderProductsHtml,
        'adminOrderControl' => $adminOrderControlHtml,
    ];
    $ordersHtml .= render(ORDERS_LIST, $orderData);
}

$adminPageHtml = render(ADMIN_PAGE_TEMPLATE, ['orders' => $ordersHtml]);

$templateData['title'] = 'Shop admin';
$templateData['header'] = 'Панель управления магазином';
$templateData['content'] = $adminPageHtml;

echo render(INDEX_TEMPLATE, $templateData);