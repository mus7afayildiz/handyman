<?php
include 'header.php';
include 'sidebar.php';

if(!isset($_SESSION['admin_kadi'])){
    header('Location:login.php');
}

?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">HABERLER</h1>
                <h1 class="page-subhead-line">Sitenizdeki haberleri buradan yonetebilirsiniz.</h1>
            </div>
            <div class="col-md-12">
                <a href="haber-ekle.php"><button class="btn btn-success">Haber Ekle</button></a>
                <hr>
            </div>



        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <!--    Hover Rows  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ekli olan Haberler
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Haber Zaman</th>
                                        <th>Haber Baslik</th>
                                        <th>Haber Hit</th>
                                        <th style="width: 20px;"></th>
                                        <th style="width: 20px;"></th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <?php
                                    $haber = "SELECT * FROM haber";
                                    $habersor = mysqli_query($baglan, $haber);

                                    while ($habercek = mysqli_fetch_array($habersor)) { ?>

                                        <tr>
                                            <td><?php echo $habercek['haber_id']; ?></td>
                                            <td><?php echo $habercek['haber_zaman']; ?></td>
                                            <td><?php echo $habercek['haber_ad']; ?></td>
                                            <td><?php echo $habercek['haber_hit']; ?></td>
                                                                                     
                                            <td><a href="haber-duzenle.php?haber_id=<?php echo $habercek['haber_id']; ?>">
                                                    <button class="btn btn-primary">Duzenle</button></a></td>
                                            <td><a href="netting/islem.php?haber_id= <?php echo $habercek['haber_id']; ?>&habersil=ok">
                                                    <button class="btn btn-danger">Sil</button></a></td>
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