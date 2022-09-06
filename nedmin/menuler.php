<?php
include 'header.php';
include 'sidebar.php';


?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">MENULER</h1>
                <h1 class="page-subhead-line">Sitenizdeki menuleri bu sayfadan yonetebilirsiniz.</h1>
            </div>
            <div class="col-md-12">
                <a href="menu-ekle.php"><button class="btn btn-success">Menu Ekle</button></a>
                <hr>
            </div>



        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <!--    Hover Rows  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ekli olan Menuler
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 400px;">Menu Adi</th>
                                        <th>Menu Link</th>
                                        <th style="width: 20px;">#</th>
                                        <th style="width: 20px;">#</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <?php
                                    $menu = "SELECT * FROM menuler";
                                    $menusor = mysqli_query($baglan, $menu);

                                    while ($menucek = mysqli_fetch_array($menusor)) { ?>

                                        <tr>
                                            <td><?php echo $menucek['menu_id']; ?></td>
                                            <td><?php echo $menucek['menu_ad']; ?></td>
                                            <td><?php echo $menucek['menu_link']; ?></td>
                                            <td><a href="menu-duzenle.php?menu_id= <?php echo $menucek['menu_id']; ?>"><button class="btn btn-primary">Duzenle</button></a></td>
                                            <td><a href="netting/islem.php?menu_id= <?php echo $menucek['menu_id']; ?>&menusil=ok"><button class="btn btn-danger">Sil</button></a></td>
                                        </tr>


                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->

        <?php include 'footer.php'; ?>