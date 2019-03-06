<?php

require_once __DIR__ . '/../../config/config.php';

if (empty($_REQUEST)) {
    die;
}
//header('Content-Type: application/x-javascript; charset=utf8');
$userId = empty($_SESSION['id']) ? 1 : $_SESSION['id'];

if ($_REQUEST['apiMethod'] === 'getCart') {

    $products = getCartProducts($userId);

    $json = ['contents' => []];
    if ($products) {
        $json['contents'] = $products;
    }
    echo json_encode($json);
}

if ($_REQUEST['apiMethod'] === 'addToCart') {
    addProductToCart($userId, $_REQUEST['postData']);
}

