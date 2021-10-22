<?php 
/***[ для тех, кто изучал JS-1 ] 
 * При клике по миниатюре нужно показывать полноразмерное изображение в модальном окне
 * (материал в помощь: https://www.internet-technologies.ru/articles/sozdaem-prostoe-modalnoe-okno-s-pomoschyu-jquery.html)
 */

$title = 'Дз 4-3';
require("../php/header.php");
$dir    = '../img/';
function placeImage(string $path)
{
    $files = scandir($path);
    //var_dump($files1);
    for($i=0; $i < count($files);$i++){
    //foreach ($files as $img) {
        if (is_file($path . $files[$i])) {
            //echo "<a href=\"$path$img\" target=\"_blank\" class=\"gallery-item\"><img src=\"$path$img\" class=\"gallery-img\"></a>";
            echo "<img id='img_$i' src=\"$path$files[$i]\" class=\"gallery-img\">";
        }
    }
}
?>
<div class="gallery-wrapper">
    <div class="gallery">
        <?php placeImage($dir); ?>
    </div>
    <div class="gallery-viewport">
        <div class="vieport-wrapper">
        <img src="" alt="Bigimg" class="viewport">
        </div>
    </div>
</div>
<script src="../js/main.js"></script>
