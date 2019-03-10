<?php

function getHtmlProduct($templateName, $product)
{
    $productData = [
        'productId'          => $product['id'],
        'productName'        => $product['name'],
        'productDescription' => $product['description'],
        'productPrice'       => $product['price'],
        'productImageSource' => $product['image'],
        'productControl'     => $product['productControl'],
    ];
    return render($templateName, $productData);
}

function getHtmlProducts($products)
{
    $catalogHtml = '';
    foreach ($products as $product) {
        $catalogHtml .= getHtmlProduct(PRODUCT_CARD_TEMPLATE, $product);
    }
    return $catalogHtml;
}

function getHtmlCatalog($catalogHtml)
{
    $catalogData = ['productsCatalog' => $catalogHtml];
    if (adminCheck()) {
        $catalogData['productAdd'] = render(PRODUCT_ADD_TEMPLATE);
    } else {
        $catalogData['productAdd'] = '';
    }
    return render(PRODUCTS_CATALOG_TEMPLATE, $catalogData);
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
