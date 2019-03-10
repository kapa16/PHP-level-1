<?php

require_once __DIR__ . '/../../config/config.php';

if (empty($_REQUEST['apiMethod'])) {
    die;
}

$orderId = $_REQUEST['postData']['id'] ?? 0;
$orderStatus = $_REQUEST['postData']['status'] ?? 0;

switch ($_REQUEST['apiMethod']) {
    case 'changeOrderStatus':
        if (!$orderId || !$orderStatus) {
            error('Неверные данные');
        }
        changeOrderStatus($orderId, $orderStatus);
        success();
}