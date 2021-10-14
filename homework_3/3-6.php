<?php
/*6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
 Необходимо представить пункты меню как элементы массива и вывести их циклом.
  Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать. */
  function createList(array $listData){
      $htmlList = "<ul>";
      foreach($listData as $list => $elem){


      }
      $htmlList .= "</ul>";
  }

  $dataList =[
      "Домашняя работа 1" => [],
      "Домашняя работа 2" => [],
      "Домашняя работа 3" => [],

  ];
  /*<ul>
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
    <li> Домашняя работа 3
        <ul>
            <li><a href="homework_3/3-1.php"> Задание 3-1</a></li>
            <li><a href="homework_3/3-2.php"> Задание 3-2</a></li>
            <li><a href="homework_3/3-3.php"> Задание 3-3</a></li>
            <li><a href="homework_3/3-4.php"> Задание 3-4</a></li>
            <li><a href="homework_3/3-5.php"> Задание 3-5</a></li>
            <li><a href="homework_3/3-6.php"> Задание 3-6</a></li>
        </ul>
    </li>
    </ul> */