<?php
require_once __DIR__ . '/calc/index.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="/" method="post" name="calc">
    <input type="number" name="x1">
    <select name="sign">
        <option value="addition">+</option>
        <option value="subtraction">-</option>
        <option value="multiplication">*</option>
        <option value="plus">/</option>
    </select>
    <input type="number" name="y1">
    <button type="submit">Расчет</button>
</form>


</body>
</html>