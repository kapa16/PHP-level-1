<?php
//-------------------------------------------
//1. Установить программное обеспечение: веб-сервер, базу данных, интерпретатор, текстовый редактор.
// Проверить, что все работает правильно.

//Поставил, проверил

//-------------------------------------------
//2. Выполнить примеры из методички и разобраться, как это работает.

//Разобрался

//-------------------------------------------
//4. Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP.
// Создать блок переменных в начале страницы.
// Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных.

$title = 'Урок 1';
$header = 'Выполнение заданий к первому уроку';
$currentYear = date('Y');

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>

<h1><?= $header ?></h1>

<hr>
<h3>3. Объяснить, как работает данный код:</h3>
<?php
$a = 5;
$b = '05';
var_dump($a == $b);         // Почему true?
echo 'т.к. сравнение по значению, то обе переменные приводятся к одному типу, <br>';
echo 'в данном случае переменная $b приводится к числу, получаем $b = 5 и сравнивается 5 == 5, это истина<br>';

var_dump((int)'012345');     // Почему 12345?
echo 'явное приведение строки к целому числу с помощью (int), поэтому получаем целое число 12345<br>';

var_dump((float)123.0 === (int)123.0); // Почему false?
echo 'сравнение по типу и значению, типы указаны явно<br>';
echo '(float) не равно (int) - типы не равны, значит все выражение false<br>';

var_dump((int)0 === (int)'hello, world'); // Почему true?
echo 'Строка явно приводится к числу, получаем 0, типы равны и значения тоже равны<br>';
?>
<hr>
<h3>5. *Используя только две переменные, поменяйте их значение местами. <br>
    Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2. <br>
    Дополнительные переменные использовать нельзя.</h3>
<?php
$a = rand(1, 100);
$b = rand(1, 100);
echo 'имеем:<br>';
echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';

echo 'меняем местами:<br>';
//list($b, $a) = [$a, $b];
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';
?>

<hr>
<footer>Copyright &copy; <?= $currentYear ?></footer>

</body>
</html>