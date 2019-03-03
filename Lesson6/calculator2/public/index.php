<?php
require_once __DIR__ . '/../engine/calc.php'
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
<h2>Задание №2.</h2>
<form action="/" method="post" name="calc">
    <label>X: <input type="number" step="any" name="x" value="<?= $x ?>"></label>
    <input type="submit" name="sign" value="+">
    <input type="submit" name="sign" value="-">
    <input type="submit" name="sign" value="*">
    <input type="submit" name="sign" value="/">
    <label>Y: <input type="number" step="any" name="y" value="<?= $y ?>"></label>
    <span> = <?=$result?></span>
</form>
</body>
</html>