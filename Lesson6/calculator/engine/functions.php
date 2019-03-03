<?php
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
    if ($b != 0) {
        return $a / $b;
    } else {
        return 'деление на 0';
    }
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'addition':
        case '+':
            return addition($arg1, $arg2);
        case 'subtraction':
        case '-':
            return subtraction($arg1, $arg2);
        case 'multiplication':
        case '*':
            return multiplication($arg1, $arg2);
        case 'division':
        case '/':
            return division($arg1, $arg2);
        default:
            return '';
    }
}