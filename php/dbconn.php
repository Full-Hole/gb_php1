<?php
$db = mysqli_connect("172.24.240.1", "php_gallery","MySecurePassword!","gallery",3306);
if(!$db){
    die('DB not foind');
}
