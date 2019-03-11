<form action="" method="post">
    <select name="status">
        {{SELECTOPTIONS}}
    </select>
    <button class="btn btn-primary order__status_change" type="submit" data-id="{{ORDERID}}">Изменить статус заказа</button>
</form>