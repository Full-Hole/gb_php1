<?php  /*1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка. */
$i = 0;
while($i++ < 100){ //работает потому что сначала берётся значение $i и только потом увеличивается на 1
    if($i%3==0)
        echo "$i <br/>";
    //$i++;
}
