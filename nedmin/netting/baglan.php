<?php
ob_start();
session_start();
?>



<?php
$username = "root";
$password = "root";
$sunucu = "localhost";
$database = "tamirci";



$baglan = @new mysqli($sunucu, $username, $password, $database);
$baglan->set_charset("utf8");

if ($baglan->connect_errno) {
    die("mySQL bağlantısı başarısız oldu: " . $baglan->connect_error);
}
?> 
    