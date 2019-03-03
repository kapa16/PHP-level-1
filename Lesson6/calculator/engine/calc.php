<?php
$x = 0;
$y = 0;
$sign = '';
$result = '';

if (!empty($_POST)){
    if (!empty($_POST['x'])) {
        $x = (float)$_POST['x'];
    }
    if (!empty($_POST['y'])) {
        $y = (float)$_POST['y'];
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

