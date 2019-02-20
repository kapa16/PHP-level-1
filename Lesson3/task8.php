<?php

//8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».

echo 'Задание 8. <br>';

foreach ($regions as $region => $cities) {
    echo $region . ":<br>";
    $citiesK = array_filter ($cities, function ($city) {
        return mb_substr($city, 0, 1) === 'К';
    });
    echo implode(', ', $citiesK) . "<br>";
}

echo '<hr>';