<?php

function getHtmlProduct($product, $templateName)
{
    $productData = [
        'productId'          => $product['id'],
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
    return readRecords(TABLE_PRODUCT, SORT_BY_NAME);
}

function getProduct($productId)
{
    return readRecordsByIdList(TABLE_PRODUCT, $productId)[0];

}

function fillTestProduct()
{
    $product = [];
    for ($i = 1; $i <= 20; $i++) {
        $name = 'Товар ' . $i;
        $description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos distinctio dolorum facilis fugiat molestiae nihil quos reiciendis rem vel? Iusto.';
        $price = 100 * $i;
        $imsSrc = 'img/products/man/product' . $i . '.jpg';
        if (!is_file($imsSrc)) {
            $imsSrc = 'img/products/woman/product' . $i . '.jpg';
        }
        $image = $imsSrc;
        createProduct($name, $description, $price, $image);
    }
}
