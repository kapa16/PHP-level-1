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

$result = mathOperation($x, $y, $sign);


