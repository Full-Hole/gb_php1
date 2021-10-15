<?php
/*6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
 Необходимо представить пункты меню как элементы массива и вывести их циклом.
  Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать. */
  function createList(array $listData){
      $htmlList = "<ul>";
      foreach($listData as $list => $exercise){
        $htmlList.="<li> Домашняя работа №$list<ul>";
            foreach($exercise as $number){
                $htmlList.="<li><a href='../homework_$list/$list-$number.php'> Задание $list-$number</a></li>";
            }

        $htmlList.="</ul></li>";
      }
      $htmlList .= "</ul>";
      return $htmlList;
  }

  $dataList =[
      1 => [2,3,4,5],
      2 => [1,2,3,4,5,6,7],
      3 => [1,2,3,4,5,6,7,8,9],

  ];
  $year = date('Y');
    $h1 = '<h1>Список Домашних Заданий</h1>';
    $title = 'PHP_Course1';
  $body = "<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>$title</title>
</head>
<body>$h1".
createList($dataList)
."<div>
<span>Кстати сейчас $year год </span></div>
</body>
</html>";
echo $body;