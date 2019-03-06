<div class="card col-xs-12 col-md-6 col-lg-4 col-xl-3 py-3">
    <a href="product_view.php?product-id={{PRODUCTID}}">
        <img
                src="{{PRODUCTIMAGESOURCE}}"
                alt="{{PRODUCTNAME}}"
                class="product__image card-img-top"
                title="Просмотр товара"
        >
        <div class="card-body">
            <h5 class="card-title">{{PRODUCTNAME}}</h5>
            <p class="card-text">Цена: {{PRODUCTPRICE}}</p>
            <button class="btn btn-primary btn-buy" data-id="{{PRODUCTID}}" data-name="{{PRODUCTNAME}}"
                    data-price="{{PRODUCTPRICE}}">
                Купить
            </button>
        </div>
    </a>

</div>
