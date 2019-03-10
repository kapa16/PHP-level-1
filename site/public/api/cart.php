<?php

require_once __DIR__ . '/../../config/config.php';

if (empty($_REQUEST['apiMethod'])) {
    die;
}

$userId = $_SESSION['login']['id'] ?? 0;
$cart = $_COOKIE['cart'] ?? [];

$productId = $_REQUEST['postData']['productId'] ?? 0;
$quantity = $_REQUEST['postData']['quantity'] ?? 0;


switch ($_REQUEST['apiMethod']) {
    case 'getCart':
        if (count($cart) === 0) {
            echo json_encode(['contents' => []]);
            exit;
        }
        $productsId = array_keys($cart);
        $listId = implode(', ', $productsId);
        $products = readRecordsByIdList(TABLE_PRODUCT, $listId);
        foreach ($products as &$product) {
            $product['quantity'] = $cart[$product['id']];
        }
        $json = ['contents' => $products];
        echo json_encode($json);
        break;
    case 'addToCart':
    case 'changeQuantityProductCart':
        if (!$productId) {
            error('ID товара не передан');
        }
        setcookie("cart[{$productId}]", $quantity);
        success();
        break;
    case 'deleteFromCart':
        if (!$productId) {
            error('ID товара не передан');
        }
        setcookie("cart[{$productId}]", null, time() - 3600);
        success();
        break;
    case 'createOrder':
        if (!$cart) {
            error('Корзина пуста');
        }
        if (!$userId) {
            header('Location: /login.php');
            error('Для создания заказа необходимо авторизоваться');
        }

        $orderId = createOrder($userId);
        foreach ($cart as $productId => $quantity) {
            addProductToOrder($orderId, $productId, $quantity);
        }

        $productsId = array_keys($cart);
        foreach ($productsId as $id) {
            setcookie("cart[{$id}]", null, time() - 3600);
        }

        success();
        break;
}

