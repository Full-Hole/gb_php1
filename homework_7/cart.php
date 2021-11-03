<?php
$data = '{
  "amount": 46600,
  "countGoods": 2,
  "contents": [
      {
          "quantity": 1,
          "id_product": 1,
          "product_name": "T-SHIRT with print",
          "price": 50,
          "img": "img/f-item1.jpg"
      },
      {
          "quantity": 1,
          "id_product": 2,
          "product_name": "Red Something",
          "price": 183,
          "img": "img/f-item2.jpg"
      }
  ]
}';
header('Content-Type: application/json; charset=utf-8');
echo $data;
