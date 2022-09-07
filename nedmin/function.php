<?php
ob_start();
session_start();

function giriskontrol()
{
    include 'netting/baglan.php';

    $admin_kadi = $_SESSION['admin_kadi'];

    $adminsor = mysqli_query($baglan, "SELECT * FROM admin WHERE admin_kadi='$admin_kadi'");
    $adminsay = mysqli_fetch_array($adminsor);
    if ($adminsay == 0) {

        header('Location:http:login.php');
    }
}
