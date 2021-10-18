<?php
/*Создать галерею фотографий. Она должна состоять из одной страницы,
 на которой пользователь видит все картинки в уменьшенном виде.
  При клике на фотографию она должна открыться в браузере в новой вкладке.
   Размер картинок можно ограничивать с помощью свойства width.
 */
$title = 'Дз 4-1';
require("../php/header.php"); 

function placeImage($imglist){
  foreach($imglist as $imgpath){
    echo "<a href=\"../img/$imgpath\" target=\"_blank\" class=\"gallery-item\"><img src=\"../img/$imgpath\" class=\"gallery-img\"></a>";
  }
}
$imglist=['img1.jpg','img2.jpg','img3.jpg','img4.jpg','img5.jpg','img6.jpg'];


?>
<div class="gallery-wrapper">
<div class="gallery">
<?php placeImage($imglist);?>
</div>
<div class="gallery-viewport">

</div>
</div>

<?php require("../php/footer.php"); ?>