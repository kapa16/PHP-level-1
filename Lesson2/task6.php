<?php
//6. *С помощью рекурсии организовать функцию возведения числа в степень.
// Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow) {
    if ($pow <= 1) {
        return $val;
    }
    return $val * power($val, $pow - 1);
}

$a = 5;
$b = 2;
echo 'Задание 6.<br>';
echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';
echo power($a, $b) . '<hr>';