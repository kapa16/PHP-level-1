<?php
$x = 0;
$y = 0;
$sign = '';
$result = '';
var_dump($_POST);
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
    case '+':
        $result = $x + $y;
        break;
    case '-':
        $result =  $x - $y;
        break;
    case '*':
        $result =  $x * $y;
        break;
    case '/':
        if ($y !== 0) {
            $result = $x / $y;
        } else {
            $result = 0;
        }
        break;
}

