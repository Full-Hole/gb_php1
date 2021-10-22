<?php

/**Строить фотогалерею, не указывая статичные ссылки к файлам,
 *  а просто передавая в функцию построения адрес папки с изображениями.
 *  Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
 */
$title = 'Дз 4-2';
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

<?php require("../php/footer.php"); ?>