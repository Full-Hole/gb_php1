<?php   
/**3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return. */
$min=-1000;
$max=1000;
$a = random_int($min, $max);
$b = random_int($min, $max);

function addition(int $first_num, int $second_num){
    return $first_num+$second_num;
}
function subtraction(int $first_num, int $second_num){
    return $first_num-$second_num;
}
function multiplication(int $first_num, int $second_num){
    return $first_num*$second_num;
}
function division(int $first_num, int $second_num){
    return $first_num/$second_num;
}

echo 'Переменная $a= '.$a.'<br/>Переменная $b= '.$b.'<br/>';
echo '<br/>Cумма $a и $b равна '.addition($a,$b);
echo '<br/>Разность $a и $b равна '.subtraction($a,$b);
echo '<br/>Произведение $a и $b равно '.multiplication($a,$b);
echo '<br/>Частное $a и $b равно '.division($a,$b);