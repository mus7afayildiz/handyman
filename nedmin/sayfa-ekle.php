<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>


<!-- /. NAV SIDE  -->

<head>

<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

</head>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SAYFA EKLIYORSUNUZ</h1>

                <?php

                if ($_GET['durum'] == "ok") { ?>

                    <h1 style="color:green;" class="page-subhead-line">Sayfa basariyla eklendi...</h1>

                <?php } elseif ($_GET['durum'] == "no") { ?>

                    <h1 style="color:red;" class="page-subhead-line">Sayfa eklenemedi....</h1>

                <?php } else { ?>

                    <h1 class="page-subhead-line">Sitenize sayfa ekliyorsunuz...</h1>

                <?php  }

                ?>

            </div>
        </div>
        <!-- /. ROW  -->

        <form action="netting/islem.php" method="POST">

            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width: 100%" class="btn btn-success" type="submit" name="sayfakaydet" value="Sayfa Kaydet">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sayfa Adi</label>
                    <input class="form-control" type="text" name="sayfa_ad" placeholder="Sayfa Adi Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>Sayfa Icerik</label>
                    <textarea name="sayfa_icerik" class="ckeditor"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sayfa Sira</label>
                    <input class="form-control" type="text" name="sayfa_sira" placeholder="Sayfa Sirasini Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Anasayfada Goster</label>
                    <select name="sayfa_anasayfa" class="form-control">
                        <option value="0">HAYIR</option>
                        <option value="1">EVET</option>

                    </select>
                </div>
            </div>
        </form>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->

<?php include 'footer.php'; ?>