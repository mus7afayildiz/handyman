<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<head>
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">HABER EKLIYORSUNUZ</h1>

                <?php

                if ($_GET['durum'] == "ok") { ?>

                    <h1 style="color:green;" class="page-subhead-line">Haber basariyla eklendi...</h1>

                <?php } elseif ($_GET['durum'] == "no") { ?>

                    <h1 style="color:red;" class="page-subhead-line">Haber eklenemedi....</h1>

                <?php } else { ?>

                    <h1 class="page-subhead-line">Sitenize Haber ekliyorsunuz...</h1>

                <?php  }

                ?>

            </div>
        </div>
        <!-- /. ROW  -->

        <form action="netting/islem.php" method="POST" enctype="multipart/form-data">

            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width: 100%" class="btn btn-success" type="submit" name="haberekle" value="Haber Kaydet">
                </div>
            </div>

            <div class="col-md-6">

                <div class="form-group">
                    <label class="control-label col-lg-4">Haber Resim</label>
                    <div class="">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <span class="btn btn-file btn-default">
                                <span class="fileupload-new">Resim Sec</span>
                                <span class="fileupload-exists">Degistir</span>
                                <input type="file" name="haber_resimyol">
                            </span>
                            <span class="fileupload-preview"></span>
                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Haber Adi</label>
                    <input class="form-control" type="text" name="haber_ad" required="" placeholder="Haber Adi Giriniz">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>Haber Icerik</label>
                    <textarea name="haber_detay" class="ckeditor"></textarea>
                </div>
            </div>


        </form>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->

<?php include 'footer.php'; ?>