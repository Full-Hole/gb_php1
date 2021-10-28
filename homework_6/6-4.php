<?php /* Создать страницу каталога товаров:
товары хранятся в БД (структура прилагается);
страница формируется автоматически;
по клику на товар открывается карточка товара с подробным описанием.
подумать, как лучше всего хранить изображения товаров.
 */

require("../php/dbconn.php");

$db_upload= mysqli_query($db, "SELECT id, img_link, name, price FROM products WHERE is_deleted !=1 ORDER BY id DESC");
$product_list = mysqli_fetch_all($db_upload,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>6-4</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/6-4.css">
</head>

<body>

        <header>
            <div class="logo">E-shop</div>
        </header>
        <main>
        <div class="products">
            <?php
foreach($product_list as $product){
    echo "<a href=\"product.php?product_id=".$product["id"]."\"><div class=\"product-item\" id=\"".$product["id"]."\">
        <img src=\"".$product["img_link"]."\" alt=\"Some img\">
        <div class=\"desc\">
            <h3>".$product["name"]."</h3>
            <p>".$product["price"]." $</p>
            <button class=\"buy-btn\">Купить</button>
        </div>
    </div></a>";
}?>
</div>
            
        </main>
        

    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"
        integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP"
        crossorigin="anonymous"></script>
<?php
mysqli_close($db);
require("../php/footer.php"); ?>