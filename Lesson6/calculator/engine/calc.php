<?php
$x = 0;
$y = 0;
$sign = '';
$result = '';

if (!empty($_POST)){
    if (filter_var($_POST['x'], FILTER_VALIDATE_FLOAT)) {
        $x = +$_POST['x'];
    }
    if (filter_var($_POST['y'], FILTER_VALIDATE_FLOAT)) {
        $y = +$_POST['y'];
    }
    if (!empty($_POST['sign'])) {
        $sign = $_POST['sign'];
    }
}

switch ($sign){
    case 'addition':
        $result = $x + $y;
        break;
    case 'subtraction':
        $result =  $x - $y;
        break;
    case 'multiplication':
        $result =  $x * $y;
        break;
    case 'division':
        $result =  $x / $y;
        break;
}

