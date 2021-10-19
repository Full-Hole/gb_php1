<?php
/**5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP. */

echo $year;
$h1 = '<h1>Скажем Вместе: Ave PHP</h1>';
$title = 'Дз 2-5';
$body = '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$title.'</title>
</head>
<body>'.$h1.'<ul>
<p>Непонял текст задания, так что немного переделал задание 1-4</p>
    
<footer>
<span>Кстати сейчас '.date('Y').' год </span></footer>
</body>
</html>';
echo $body;