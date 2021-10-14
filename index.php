<?php
$year = date('Y');
echo $year;
$h1 = '<h1>Список Домашних Заданий</h1>';
$title = 'PHP_Course1';
$body = '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$title.'</title>
</head>
<body>'.$h1.'<ul>
    <li> Домашняя работа 1
        <ul>
            <li><a href="homework_1/1-2.php"> Задание 1-2</a></li>
            <li><a href="homework_1/1-3.php"> Задание 1-3</a></li>
            <li><a href="homework_1/1-4.php"> Задание 1-4</a></li>
            <li><a href="homework_1/1-5.php"> Задание 1-5</a></li>
        </ul>
    </li>
    <li> Домашняя работа 2
        <ul>
            <li><a href="homework_2/2-1.php"> Задание 2-1</a></li>
            <li><a href="homework_2/2-2.php"> Задание 2-2</a></li>
            <li><a href="homework_2/2-3.php"> Задание 2-3</a></li>
            <li><a href="homework_2/2-4.php"> Задание 2-4</a></li>
            <li><a href="homework_2/2-5.php"> Задание 2-5</a></li>
            <li><a href="homework_2/2-6.php"> Задание 2-6</a></li>
            <li><a href="homework_2/2-7.php"> Задание 2-7</a></li>
        </ul>
    </li>
    <li> Доманняя работа 3
        <ul>
            <li><a href="homework_3/3-1.php"> Задание 3-1</a></li>
            <li><a href="homework_3/3-2.php"> Задание 3-2</a></li>
            <li><a href="homework_3/3-3.php"> Задание 3-3</a></li>
        </ul>
    </li>
    </ul>
<div>
<span>Кстати сейчас '.$year.' год </span></div>
</body>
</html>';
echo $body;
