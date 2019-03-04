<?php

function getHtmlProduct($product, $templateName)
{
    $productData = [
        'productId'        => $product['id'],
        'productName'        => $product['name'],
        'productDescription' => $product['description'],
        'productPrice'       => $product['price'],
        'productImageSource' => $product['image'],
    ];
    return render($templateName, $productData);
}

function getHtmlProducts($products)
{
    $catalogHtml = '';
    foreach ($products as $product) {
        $catalogHtml .= getHtmlProduct($product, PRODUCT_CARD_TEMPLATE);
    }
    return $catalogHtml;
}

function getHtmlCatalog($catalogHtml)
{
    return render(PRODUCTS_CATALOG_TEMPLATE, ['productsCatalog' => $catalogHtml]);
}

function getProducts()
{
    return readRecords('products', SORT_BY_NAME);
}

function getProduct($productId)
{
    return readRecord('products', $productId)[0];

}

function fillTestProduct()
{
    $product = [];
    for ($i = 1; $i <= 20; $i++) {
        $product['name'] = 'Товар ' . $i;
        $product['description'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos distinctio dolorum facilis fugiat molestiae nihil quos reiciendis rem vel? Iusto.';
        $product['price'] = 100 * $i;
        $imsSrc = 'img/products/man/product' . $i . '.jpg';
        if (!is_file($imsSrc)) {
            $imsSrc = 'img/products/woman/product' . $i . '.jpg';
        }
        $product['image'] = $imsSrc;
        createProduct($product);
    }
}
