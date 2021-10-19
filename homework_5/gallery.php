<?php
$title = 'Gallery';
require("../php/header.php");
require("../php/dbconn.php");

$img_id=$_GET["img_id"] ?? null;

if($img_id && is_numeric($img_id)){
    mysqli_query($db, "UPDATE images SET views=views+1 WHERE id=$img_id");
    $gallery= mysqli_query($db, "SELECT * FROM images WHERE id=$img_id");
    $img_data = mysqli_fetch_assoc($gallery);
    if($img_data)
        echo "<div class=\"fullpage-img-wrapper\">
        <img id=\"".$img_data['id']."\" src=\"".$img_data['img_path']."\" class=\"fullpage-img\">
            <div class=\"img-views\">".$img_data['views']." Views</div>
        </div>";
    else
        die('Image Not Found');

    mysqli_close($db);
}
//  var_dump($img_id);
?>

