<?php

//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

echo 'Задание 5. <br>';

function changeSpaces($str) {
    $arrStr = explode(' ', $str);
    return implode('_', $arrStr);
}

echo changeSpaces('Написать функцию, которая заменяет в строке пробелы на подчеркивания.') . '<br>';

echo '<hr>';