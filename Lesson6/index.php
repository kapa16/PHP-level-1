<?php
if (empty($_POST) || empty($_POST['x1']) || empty($_POST['y1'])) {
    exit;
}

$x = $_POST['x1'];
$y = $_POST['y1'];

switch ($_POST['sign']){
    case 'addition':
        echo $x + $y;
        break;
    case 'subtraction':
        echo $x + $y;
        break;
    case 'multiplication':
        echo $x + $y;
        break;
    case 'plus':
        echo $x + $y;
        break;
    default:
        echo 'Неизвестная операция';
}
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