<?php
header('Location: /index.php');
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

