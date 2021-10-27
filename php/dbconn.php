<?php
$db = mysqli_connect("172.23.160.1", "php_gallery","MySecurePassword!","gallery",3306);
if(!$db){
    die('DB not foind');
}
