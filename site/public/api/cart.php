<?php

require_once __DIR__ . '/../../config/config.php';

if (empty($_REQUEST)) {
    die;
}

$userId = empty($_SESSION['id']) ? 1 : $_SESSION['id'];

switch ($_REQUEST['apiMethod']) {
    case 'getCart':
        {

            $products = getCartProducts($userId);

            $json = ['contents' => []];
            if ($products) {
                $json['contents'] = $products;
            }
            echo json_encode($json);
        }
        break;
    case 'addToCart':
        {
            echo addProductToCart($userId, $_REQUEST['postData']);
        }
        break;
    case 'changeQuantityProductCart':
        {
            echo changeQuantityProductCart($userId, $_REQUEST['postData']);
        }
        break;
    case 'deleteFromCart':
        {
            deleteCartProduct($userId, $_REQUEST['postData']);
        }
        break;
}
