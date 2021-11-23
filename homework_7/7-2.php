<?php
$var = 'ABCDEFGH:/MNRPQR/';
echo "Оригинал: $var<hr />\n";

/* Обе следующих строки заменяют всю строку $var на 'bob'. */
echo substr_replace($var, 'bob', 0) . "<br />\n";
echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n";

/* Вставляет 'bob' в начало $var. */
echo substr_replace($var, 'bob', 0, 0) . "<br />\n";

/* Обе следующих строки заменяют 'MNRPQR' в $var на 'bob'. */
echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
echo substr_replace($var, 'bob', -7, -1) . "<br />\n";

/* Удаляет 'MNRPQR' из $var. */
echo substr_replace($var, '', 10, -1) . "<br />\n";
?>