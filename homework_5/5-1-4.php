<?php
$title = 'Дз 5';
require("../php/header.php");
require("../php/dbconn.php");

$gallery= mysqli_query($db, "SELECT * FROM images ORDER BY views DESC");

$images = mysqli_fetch_all($gallery,MYSQLI_ASSOC);

function placeImage($images)
{
    foreach($images as $img_data){    
            echo "<a href=\"gallery.php?img_id=".$img_data['id']."\" target=\"_blank\"><img id=\"".$img_data['id']."\" src=\"".$img_data['img_path']."\" class=\"gallery-img\"></a>";
    }
}
?>
<div class="gallery">
<?php placeImage($images); ?>
</div>

<?php

mysqli_close($db);