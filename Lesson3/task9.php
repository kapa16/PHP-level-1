<?php

//9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
// производит транслитерацию и замену пробелов на подчеркивания
// (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

echo 'Задание 9. <br>';

function convertUrl($url) {
    return translitStr(changeSpaces($url));
}

echo convertUrl('Объединить две ранее написанные функции в одну');

echo '<hr>';