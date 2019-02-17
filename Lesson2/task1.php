<?php
//1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
// Затем написать скрипт, который работает по следующему принципу:
//если $a и $b положительные, вывести их разность;
//если $а и $b отрицательные, вывести их произведение;
//если $а и $b разных знаков, вывести их сумму;
//Ноль можно считать положительным числом.

function compare(int $a, int $b) {
    if ($a >= 0 && $b >= 0) {
        return $a - $b;
    }
    if ($a < 0 && $b < 0) {
        return $a * $b;
    }
    return $a + $b;
}

$a = rand(-10, 10);
$b = rand(-10, 10);
echo 'Задание 1.<br>';
echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';
echo compare($a, $b) . '<hr>';