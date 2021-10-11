<?php
/***С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
 */
$val = random_int(1, 10);
$pow = random_int(1, 10);
echo $val.' в степени '.$pow;
echo '<br/>';
function power($val, $pow){
    if($pow > 2)
        return power($val, $pow-1)* $val;
    else if($pow==2)
        return $val * $val;
    return $val; //на случай единицы
}
echo power($val, $pow);