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
    foreach ($files as $img) {
        if (is_file($path . $img)) {
            echo "<a href=\"$path$img\" target=\"_blank\" class=\"gallery-item\"><img src=\"$path$img\" class=\"gallery-img\"></a>";
        }
    }
}
?>
<div class="gallery-wrapper">
    <div class="gallery">
        <?php placeImage($dir); ?>
    </div>
    <div class="gallery-viewport">

    </div>
</div>
