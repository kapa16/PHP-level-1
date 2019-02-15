<?php
//4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
// где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
// В зависимости от переданного значения операции выполнить одну из арифметических операций
// (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case '+':
            return addition($arg1, $arg2);
        case '-':
            return subtraction($arg1, $arg2);
        case '*':
            return multiplication($arg1, $arg2);
        case '/':
            return division($arg1, $arg2);
        default:
            return 'unknown operation';
    }
}

echo 'Задание 4.<br>';
echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';
echo '+:  &nbsp;&nbsp;&nbsp;' . mathOperation($a, $b, '+') . '<br>';
echo '-:  &nbsp;&nbsp;&nbsp;' . mathOperation($a, $b, '-') . '<br>';
echo '*:  &nbsp;&nbsp;&nbsp;' . mathOperation($a, $b, '*') . '<br>';
echo '/:  &nbsp;&nbsp;&nbsp;' . mathOperation($a, $b, '/') . '<hr>';