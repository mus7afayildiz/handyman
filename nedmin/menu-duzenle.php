<?php
include 'header.php';
include 'sidebar.php';

$menu_id = $_GET['menu_id'];
$menu = "SELECT * FROM menuler WHERE menu_id='$menu_id'";
$menusor = mysqli_query($baglan, $menu);
$menucek = mysqli_fetch_array($menusor);


?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">MENU DUZELIYORSUNUZ</h1>

                <?php

                if ($_GET['durum'] == "ok") { ?>

                    <h1 style="color:green;" class="page-subhead-line">Menu basariyla duzenlendi...</h1>

                <?php } elseif ($_GET['durum'] == "no") { ?>

                    <h1 style="color:red;" class="page-subhead-line">Menu duzenlenemedi....</h1>

                <?php } else { ?>

                    <h1 class="page-subhead-line">Menu duzenliyorsunuz...</h1>

                <?php  }

                ?>

            </div>
        </div>
        <!-- /. ROW  -->

        <form action="netting/islem.php" method="POST">

            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width: 100%" class="btn btn-success" type="submit" name="menuduzenle" value="Menu Duzenle">
                </div>
            </div>

            <input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id']; ?>">

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menu Adi</label>
                    <input class="form-control" type="text" name="menu_ad" value="<?php echo $menucek['menu_ad']; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menu Link</label>
                    <input class="form-control" type="text" name="menu_link" value="<?php echo $menucek['menu_link']; ?>">
                </div>
            </div>


        </form>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->

<?php include 'footer.php'; ?>