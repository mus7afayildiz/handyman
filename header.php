<?php
include 'nedmin/netting/baglan.php';

$tamirci = "SELECT * FROM ayarlar";
$ayarsor = mysqli_query($baglan, $tamirci);
$ayarcek = mysqli_fetch_array($ayarsor);

$menu = "SELECT * FROM menuler";
$menusor = mysqli_query($baglan, $menu);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $ayarcek['ayar_title'] ?></title>
  <meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
  <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
  <meta name="author" content="Star yazilim">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
  <script src="js/jquery-1.6.3.min.js"></script>
  <script src="js/cufon-yui.js"></script>
  <script src="js/cufon-replace.js"></script>
  <script src="js/FF-cash.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery.equalheights.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/tms-0.3.js"></script>
  <script src="js/tms_presets.js"></script>
  <script src="js/easyTooltip.js"></script>
  <!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>

<body id="page1">
  <div class="extra">
    <div class="main">
      <!--==============================header=================================-->
      <header>
        <div class="indent">
          <div class="row-top">
            <div class="wrapper">
              <h1><a href="index.php">Handyman</a></h1>
              <strong class="support"><?php echo $ayarcek['ayar_telefon'] ?></strong>
            </div>
          </div>
          <nav>
            <ul class="menu">
              <li><a class="active" href="index.php">Home</a></li>


              <?php

              $menusay = mysqli_num_rows($menusor);
              $say = 0;

              while ($menucek = mysqli_fetch_array($menusor)) {
                $say++; ?>

                <li class="<?php
                            if ($menusay == $say) {
                              echo "last";
                            }
                            ?>"><a href="<?php echo $menucek['menu_link']; ?>"><?php echo $menucek['menu_ad']; ?> </a></li>

              <?php }
              ?>

















            </ul>
          </nav>
        </div>
        
      </header>