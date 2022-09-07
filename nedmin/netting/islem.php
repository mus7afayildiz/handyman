<?php
ob_start();
session_start();
try {
  $db = new PDO('mysql:host=localhost;dbname=tamirci;charset=utf8', 'root', 'root'); //1.Root = Kullanıcı Adı 2.Root = Şifre
} catch (PDOException $e) {
  echo 'Hata: ' . $e->getMessage();
}
?>

     <?php

      include 'baglan.php';

      //this codes for update settings
      if (isset($_POST['ayarkaydet'])) {
        $id = 0;

        $ayarguncelle = $db->prepare("update ayarlar set ayar_title='" . $_POST['ayar_title'] . "',
       ayar_description='" . $_POST['ayar_description'] . "',
       ayar_keywords='" . $_POST['ayar_keywords'] . "',
       ayar_telefon='" . $_POST['ayar_telefon'] . "',
       ayar_facebook='" . $_POST['ayar_facebook'] . "',
       ayar_twitter='" . $_POST['ayar_twitter'] . "',
       ayar_footer='" . $_POST['ayar_footer'] . "',
       ayar_adres='" . $_POST['ayar_adres'] . "',
       ayar_mail='" . $_POST['ayar_mail'] . "',
       ayar_fax='" . $_POST['ayar_fax'] . "' where ayar_id='$id'");

        $ayarguncelle->execute();

        if ($ayarguncelle->rowCount() > 0) //Bu kısım PDO için değiştirilmiştir.
        {
          header("Location:../ayarlar.php?durum=ok");
        } else {
          header("Location:../ayarlar.php?durum=no");
        }
      }

      //this codes for Admin login
      if (isset($_POST['login'])) {

        $admin_kadi = $_POST['admin_kadi'];
        $admin_sifre = md5($_POST['admin_sifre']);

        echo $admin_kadi;

        if ($admin_kadi && $admin_sifre) {

          $sorgula = $baglan->query("SELECT * FROM admin WHERE admin_kadi='$admin_kadi' and admin_sifre='$admin_sifre'");
          $verisay = $sorgula->num_rows;

          if ($verisay > 0) {
            $_SESSION['admin_kadi'] = $admin_kadi;
            header('Location:../index.php');
            echo $verisay;
          } else {
            header('Location:../login.php?login=no');
          }
        }
      }

      // this codes for create a menu    
      if (isset($_POST['menukaydet'])) {
        $kaydet = $db->prepare("INSERT INTO menuler SET menu_ad=:menu_ad, menu_link=:menu_link");
        $ekle = $kaydet->execute(array(
          'menu_ad' => $_POST['menu_ad'],
          'menu_link' => $_POST['menu_link']
        ));

        if ($ekle) {
          header('Location:../menu-ekle.php?durum=ok');
        } else {
          header('Location:../menu-ekle.php?durum=no');
        }
      }

      // this codes for edit menu
      if (isset($_POST['menuduzenle'])) {

        $menu_id = $_POST['menu_id'];
        $menuduzenle = $db->prepare("UPDATE menuler SET menu_ad ='" . $_POST['menu_ad'] . "',
 menu_link='" . $_POST['menu_link'] . "' WHERE menu_id='$menu_id'");

        $menuduzenle->execute();

        if ($menuduzenle->rowCount() > 0) //Bu kısım PDO için değiştirilmiştir.
        {
          header("Location:../menu-duzenle.php?durum=ok&menu_id=$menu_id");
        } else {
          header("Location:../menu-duzenle.php?durum=no&menu_id=$menu_id");
        }
      }

      // this codes for delete menu
      if ($_GET['menusil'] == "ok") {
        echo "cok yoruldum";
        $menusil = $baglan->query("DELETE FROM menuler WHERE menu_id='" . $_GET['menu_id'] . "'");

        if ($baglan->affected_rows) {

          header('Location:../menuler.php?durum=ok');
        } else {
          header('Location:../menuler.php?durum=no');
        }
      }

      //add slide
      if (isset($_POST['sliderekle'])) {

        $uploads_dir = '../uploads';
        @$tmp_name = $_FILES['slidegorsel']["tmp_name"];
        @$name = $_FILES['slidegorsel']["name"];
        $benzersizsayi1 = rand(20000, 32000);
        $benzersizsayi2 = rand(20000, 32000);
        $benzersizsayi3 = rand(20000, 32000);
        $benzersizsayi4 = rand(20000, 32000);
        $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
        $refimgyol = substr($uploads_dir, 3) . "/" . $benzersizad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

        $sliderekle = $baglan->query("INSERT into slider (slider_resimyol,slider_url,slider_sira,slider_ad)
VALUES ('" . $refimgyol . "','" . $_POST['slider_url'] . "','" . $_POST['slider_sira'] . "','" . $_POST['slider_ad'] . "')");

        if ($baglan->affected_rows) {
          header("Location:../slider-ekle.php?durum=ok");
        } else {
          header("Location:../slider-ekle.php?durum=no");
        }
      }

      //delete slide
      if ($_GET['slidersil'] == "ok") {


        $slidersil = $baglan->query("DELETE FROM slider WHERE slider_id='" . $_GET['slider_id'] . "'");

        if ($baglan->affected_rows) {
          $resim_sil = $_GET['sliderresimsil'];
          unlink("../$resim_sil");
          header('Location:../slider.php?durum=ok');
        } else {

          header('Location:../slider.php=durum=no');
        }
      }

      //update slide order number
      if ($_GET['slider_sira_guncelle'] == "ok") {

        $slide_sira_guncelle = $db->prepare("UPDATE slider SET slider_sira='" . $_POST['slider_sira'] . "',
       WHERE slider_id='$slider_id'");

        $slider_sira_guncelle->execute();

        if ($slider_sira_guncelle->rowCount() > 0) //Bu kısım PDO için değiştirilmiştir.
        {
          header("Location:../slider.php?durum=ok");
        } else {
          header("Location:../slider.php?durum=no");
        }
      }

      //save page
      if (isset($_POST['sayfakaydet'])) {
        $zaman = date('Y-m-d H:i');

        $sayfaekle = $baglan->query("INSERT INTO sayfalar (sayfa_ad,sayfa_icerik,sayfa_sira,sayfa_anasayfa,sayfa_tarih) VALUES 
        ('" . $_POST['sayfa_ad'] . "','" . $_POST['sayfa_icerik'] . "','" . $_POST['sayfa_sira'] . "','" . $_POST['sayfa_anasayfa'] . "','" . $zaman . "')");


        if ($baglan->affected_rows) {
          header('Location:../sayfalar.php?durum=ok');
        } else {
          header('Location:../sayfalar.php?durum=no');
        }
      }

      //delete page
      if ($_GET['sayfasil'] == "ok") {
        echo "cok yoruldum";
        $sayfasil = $baglan->query("DELETE FROM sayfalar WHERE sayfa_id='" . $_GET['sayfa_id'] . "'");

        if ($baglan->affected_rows) {

          header('Location:../sayfalar.php?durum=ok');
        } else {
          header('Location:../sayfalar.php?durum=no');
        }
      }

      //edit page

      if (isset($_POST['sayfaduzenle'])) {

        $sayfa_id = $_POST['sayfa_id'];
        $sayfaduzenle = $db->prepare("UPDATE sayfalar SET 
        sayfa_ad = '" . $_POST['sayfa_ad'] . "',
        sayfa_icerik = '" . $_POST['sayfa_icerik'] . "',
        sayfa_sira = '" . $_POST['sayfa_sira'] . "', 
        sayfa_anasayfa = '" . $_POST['sayfa_anasayfa'] . "'  
        WHERE sayfa_id='$sayfa_id'");

        $sayfaduzenle->execute();

        if ($sayfaduzenle->rowCount() > 0) //Bu kısım PDO için değiştirilmiştir.
        {
          header("Location:../sayfa-duzenle.php?durum=ok&sayfa_id=$sayfa_id");
        } else {
          header("Location:../sayfa-duzenle.php?durum=no&sayfa_id=$sayfa_id");
        }
      }





      ?>