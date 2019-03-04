
<form action="" method="post">
    <label>
        Название товара: <input type="text" name="name" value="<?=$name?>">
    </label>
    <label>
        Описание: <input type="text" name="description" value="<?=$description?>">
    </label>
    <label>
        Цена: <input type="number" step="0.01" name="price" value="<?=$price?>">
    </label>
    <label>
        Изображение: <input type="text" name="image" value="<?=$image?>">
    </label>
    <label><input type="submit" name="update" value="<?=$buttonTitle?>"></label>
</form>

<a href="/">На главную</a>