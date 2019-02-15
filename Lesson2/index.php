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

//2. Присвоить переменной $а значение в промежутке [0..15].
// С помощью оператора switch организовать вывод чисел от $a до 15.

function getNumbers($a) {
    $result = '';
    switch ($a) {
        case 0:
            $result .= '0 ';
        case 1:
            $result .= '1 ';
        case 2:
            $result .= '2 ';
        case 3:
            $result .= '3 ';
        case 4:
            $result .= '4 ';
        case 5:
            $result .= '5 ';
        case 6:
            $result .= '6 ';
        case 7:
            $result .= '7 ';
        case 8:
            $result .= '8 ';
        case 9:
            $result .= '9 ';
        case 0:
            $result .= '10 ';
        case 11:
            $result .= '11 ';
        case 12:
            $result .= '12 ';
        case 13:
            $result .= '13 ';
        case 14:
            $result .= '14 ';
        case 15:
            $result .= '15 ';
    }
    return $result;
}

$a = rand(0, 15);
echo 'Задание 2.<br>';
echo 'a = ' . $a . '<br>';
echo getNumbers($a) . '<br>';
