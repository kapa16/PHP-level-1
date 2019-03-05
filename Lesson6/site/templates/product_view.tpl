<div class="product__view_wrap">
    <div class="product__control">
        <a href="/admin/updateProduct.php?product-id={{PRODUCTID}}" class="product__control_btn">Редактировать товар</a>
        <a href="/admin/deleteProduct.php?product-id={{PRODUCTID}}" class="product__control_btn">Удалить товар</a>

    </div>
    <div class="product__view">
        <h3>{{PRODUCTNAME}}</h3>
        <img
                src="{{PRODUCTIMAGESOURCE}}"
                alt="{{PRODUCTNAME}}"
                class="product__image"
                title="Просмотр товара"
        >
        <p>Цена: {{PRODUCTPRICE}}</p>
        <p>Описание: {{PRODUCTDESCRIPTION}}</p>
    </div>
</div>
