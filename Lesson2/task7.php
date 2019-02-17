<?php
//7. *Написать функцию, которая вычисляет текущее время и
// возвращает его в формате с правильными склонениями, например:
//22 часа 15 минут
//21 час 43 минуты

function declination(int $number, string $word1, string $word2, string $word5) {
    if ($number % 100 > 10 && $number % 100 < 20) {
        return $word5;
    }
    if ($number % 10 >= 2 && $number % 10 <= 4) {
        return $word2;
    }
    if ($number % 10 === 1) {
        return $word1;
    }
    return $word5;
}

date_default_timezone_set('Asia/Yekaterinburg');
$hour = (int) date('H');
$minute = (int) date('i');
$hourStr = declination($hour, ' час', ' часа', ' часов');
$minuteStr = declination($minute, ' минута', ' минуты', ' минут');

echo 'Задание 7.<br>';
echo $hour . $hourStr . ' ' . $minute . $minuteStr . '<hr>';