<?php
/**4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
 *  где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
 *  В зависимости от переданного значения операции выполнить одну из арифметических операций
 *  (использовать функции из пункта 3) и вернуть полученное значение (использовать switch). */
include '2-3.php';

$op_array=['addition', 'subtraction', 'multiplication', 'division'];
$op_random = random_int(0, 3);
echo '<hr/><br/>Святой рандом сказал '.$op_array[$op_random];

function mathOperation($arg1, $arg2, $operation){
    switch ($operation) {
        case 'addition':
            echo '<br/>Cумма $a и $b равна '.addition($arg1,$arg2);
            break;
        case 'subtraction':
            echo '<br/>Разность $a и $b равна '.subtraction($arg1,$arg2);
            break;
        case 'multiplication':
            echo '<br/>Произведение $a и $b равно '.multiplication($arg1,$arg2);
            break;
        case 'division':
            echo '<br/>Частное $a и $b равно '.division($arg1,$arg2);
            break;
        default:
            echo 'Кто то свернул не туда';
            break;
    }
}

mathOperation($a, $b, $op_array[$op_random]);