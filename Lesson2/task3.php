<?php
//3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
// Обязательно использовать оператор return.

function addition(float $a, float $b)
{
    return $a + $b;
}

function subtraction(float $a, float $b)
{
    return $a - $b;
}

function multiplication(float $a, float $b)
{
    return $a * $b;
}

function division(float $a, float $b)
{
    return $a / $b;
}

$a = rand(-10, 10);
$b = rand(-10, 10);
echo 'Задание 3.<br>';
echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';
echo 'addition ' . addition($a, $b) . '<br>';
echo 'subtraction ' . subtraction($a, $b) . '<br>';
echo 'multiplication ' . multiplication($a, $b) . '<br>';
echo 'division ' . division($a, $b) . '<hr>';
