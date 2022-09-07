<?php
include 'header.php';
include 'sidebar.php';


?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SLIDER</h1>
                <h1 class="page-subhead-line">Sitenizdeki sliderlari bu sayfadan yonetebilirsiniz.</h1>
            </div>
            <div class="col-md-12">
                <a href="slider-ekle.php"><button class="btn btn-success">Slider Ekle</button></a>
                <hr>
            </div>



        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <!--    Hover Rows  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ekli olan Sliderlar
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Slider Adi</th>
                                        <th>Slider Resmi</th>
                                        <th>Slider Link</th>
                                        <th>Slider Sira</th>
                                        <th style="width: 20px;"></th>
                                        <th style="width: 20px;"></th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <?php
                                    $menu = "SELECT * FROM slider";
                                    $slidersor = mysqli_query($baglan, $menu);

                                    while ($slidercek = mysqli_fetch_array($slidersor)) { ?>

                                        <tr>
                                            <td><?php echo $slidercek['slider_id']; ?></td>
                                            <td><?php echo $slidercek['slider_ad']; ?></td>


                                            <td>
                                                <img width="200" src="<?php echo $slidercek['slider_resimyol']; ?>" alt="Slider Resmi">
                                            </td>


                                            <td><?php echo $slidercek['slider_url']; ?></td>
                                            <td><input type="text" name="slider_sira" value="<?php echo $slidercek['slider_sira']; ?>">
                                                <a href="netting/islem.php?slider_sira= <?php echo $slidercek['slider_sira']; ?>&slider_sira_guncelle=ok">
                                                    <button type="submit" name="slide_sira_guncelle" class="btn btn-primary">Guncelle</button></a>
                                            </td>
                                            <td><a href="netting/islem.php?slider_id= <?php echo $slidercek['slider_id']; ?>&slidersil=ok&sliderresimsil=<?php echo $slidercek['slider_resimyol'];?>">
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