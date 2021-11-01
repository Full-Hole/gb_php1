<?php
$data = '[
    {
      "id_product": 1,
      "product_name": "T-SHIRT with print",
      "price": 50,
      "img": "img/f-item1.jpg"
    },
    {
      "id_product": 2,
      "product_name": "Red Something",
      "price": 183,
      "img": "img/f-item2.jpg"
    },
    {
      "id_product": 3,
      "product_name": "DarkBlue Something",
      "price": 465,
      "img": "img/f-item3.jpg"
    },
    {
      "id_product": 4,
      "product_name": "Something with flowers",
      "price": 317,
      "img": "img/f-item4.jpg"
    },
    {
      "id_product": 5,
      "product_name": "Strange Something",
      "price": 230,
      "img": "img/f-item5.jpg"
    },
    {
      "id_product": 6,
      "product_name": "Fancy Dude",
      "price": 2000,
      "img": "img/f-item6.jpg"
    },
    {
      "id_product": 7,
      "product_name": "Body without head",
      "price": 599,
      "img": "img/f-item7.jpg"
    },
    {
      "id_product": 8,
      "product_name": "another fancy dude",
      "price": 3000,
      "img": "img/f-item8.jpg"
    }
  ]';
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
