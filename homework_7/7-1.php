<?php

require("../php/dbconn.php");



$data = '';
$row = date("H:i:s") . " 7-1 ";
if (!empty($_GET)) {
  if (isset($_GET["data"]) && !empty($_GET["data"])) {
    switch ($_GET["data"]) {
      case '1':
        $data = getProduct($db);
        break;
      case '2':
        $data = getCart();
        break;
      default:
        $data = "{}";
    }
    $row .= json_encode($_GET) . " GET\n";
    file_put_contents("test.txt", $row, FILE_APPEND);
  } else {
    $row .= "not set \n";
    file_put_contents("test.txt", $row, FILE_APPEND);
    $data = '{"result":0, "text": "nodata"}';
  }
}
if (!empty($_PUT)){
  $row .= json_encode($_PUT) . " PUT\n";
  file_put_contents("test.txt", $row, FILE_APPEND);
    $data = '{"result":0, "text": "nodata"}';
}

$method = $_SERVER['REQUEST_METHOD'];
if ('PUT' === $method) {
    parse_str(file_get_contents('php://input'), $_PUT);
    var_dump($_PUT); //$_PUT contains put fields 
}

header('Content-Type: application/json; charset=utf-8');
echo $data;



function getCart()
{
  return '{
    "amount": 46600,
    "countGoods": 2,
    "contents": [
        {
            "quantity": 2,
            "id_product": 1,
            "product_name": "T-SHIRT with print",
            "price": 50,
            "img": "img/f-item1.jpg"
        },
        {
            "quantity": 2,
            "id_product": 2,
            "product_name": "Red Something",
            "price": 183,
            "img": "img/f-item2.jpg"
        }
    ]
  }';
}

function getProduct(mysqli $db)
{
  $db_con= mysqli_query($db, "SELECT id, name, img_link, price FROM products WHERE is_deleted != 1 AND on_stock !=0 ORDER BY id DESC");
  $product_list = mysqli_fetch_all($db_con,MYSQLI_ASSOC);
  $prod_json = '[';
  for($i=0;$i<count($product_list); $i++ ){
    $prod_json .= '
    {
      "id_product": '.$product_list[$i]["id"].',
      "product_name": "'.$product_list[$i]["name"].'",
      "price": '.$product_list[$i]["price"].',
      "img": "'.$product_list[$i]["img_link"].'"
    },';

  }
 // $prod_json.=']';
  //echo;
  return  substr_replace($prod_json, ']', -1);
  //file_put_contents("test_prod.txt", $prod_json);
  return '[
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
}

mysqli_close($db);