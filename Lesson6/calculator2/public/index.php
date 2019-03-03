<?php
require_once __DIR__ . '/../engine/calc1.php'
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
<h2>Задание №1.</h2>
<form action="/" method="post" name="calc">
    <label>X: <input type="number" step="0.0001" name="x" value="<?= $x ?>"></label>
    <select name="sign">
        <option value="addition" <?php if ($sign === 'addition') {echo 'selected';}?>>+</option>
        <option value="subtraction" <?php if ($sign === 'subtraction') {echo 'selected';}?>>-</option>
        <option value="multiplication" <?php if ($sign === 'multiplication') {echo 'selected';}?>>*</option>
        <option value="division" <?php if ($sign === 'division') {echo 'selected';}?>>/</option>
    </select>
    <label>Y: <input type="number" step="0.0001" name="y" value="<?= $y ?>"></label>
    <button type="submit">=</button>
    <span><?=$result?></span>
</form>

<h2>Задание №2.</h2>
<form action="/" method="post" name="calc2">
    <label>X: <input type="number" step="0.0001" name="x1" value="<?= $x ?>"></label>
    <input type="submit" value="+">
    <label>Y: <input type="number" step="0.0001" name="y1" value="<?= $y ?>"></label>
    <span><?=$result?></span>
</form>
</body>
</html>