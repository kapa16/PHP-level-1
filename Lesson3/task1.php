<?php

//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
echo 'Задание 1. <br>';

$i = 0;
while ($i <= 100) {
    if ($i % 3 === 0) {
        echo $i . '&nbsp;&nbsp;';
    }
    $i++;
};

echo '<hr>';