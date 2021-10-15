<?php
$year = date('Y');
echo $year;
$h1 = '<h1>Скажем Вместе: Ave PHP</h1>';
$title = 'Дз 1-4';
$body = '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$title.'</title>
</head>
<body>'.$h1.'<ul>
    
<div>
<span>Кстати сейчас '.$year.' год </span></div>
</body>
</html>';
echo $body;
