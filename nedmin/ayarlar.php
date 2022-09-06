<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SITE GENEL AYARLARI</h1>

                <?php
                if ($_GET['durum'] == "ok") { ?>

                    <h1 style="color:green;" class="page-subhead-line">Kayitlar basariyla guncellendi...</h1>

                <?php } elseif ($_GET['durum'] == "no") { ?>

                    <h1 style="color:red;" class="page-subhead-line">Kayitlar guncellenemedi degisiklik yapmamis olabilirsiniz....</h1>

                <?php } else { ?>

                    <h1 class="page-subhead-line">Sitenizin genel ayarlarini bu sayfadan duzenleyebilirsiniz...</h1>

                <?php }
                ?>



            </div>
        </div>
        <!-- /. ROW  -->

        <form action="netting/islem.php" method="POST">

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Site Basligi</label>
                    <input class="form-control" type="text" name="ayar_title" value="<?php echo $ayarcek['ayar_title']; ?>">
                </div>
            </div>



            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Site Aciklamasi</label>
                    <input class="form-control" type="text" name="ayar_description" value="<?php echo $ayarcek['ayar_description']; ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Site Anahtar Kelimeler</label>
                    <input class="form-control" type="text" name="ayar_keywords" value="<?php echo $ayarcek['ayar_keywords']; ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <label>Telefon Numaraniz</label>
                    <input class="form-control" type="text" name="ayar_telefon" value="<?php echo $ayarcek['ayar_telefon']; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label>Facebook Adresiniz</label>
                    <input class="form-control" type="text" name="ayar_facebook" value="<?php echo $ayarcek['ayar_facebook']; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label>Twitter</label>
                    <input class="form-control" type="text" name="ayar_twitter" value="<?php echo $ayarcek['ayar_twitter']; ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Site Footer</label>
                    <input class="form-control" type="text" name="ayar_footer" value="<?php echo $ayarcek['ayar_footer']; ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Adresiniz</label>
                    <input class="form-control" type="text" name="ayar_adres" value="<?php echo $ayarcek['ayar_adres']; ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Mail adresiniz</label>
                    <input class="form-control" type="text" name="ayar_mail" value="<?php echo $ayarcek['ayar_mail']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Fax Numaraniz</label>
                    <input class="form-control" type="text" name="ayar_fax" value="<?php echo $ayarcek['ayar_fax']; ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <input style="width: 100%" class="btn btn-success" type="submit" name="ayarkaydet" value="Ayarlari Kaydet">
                </div>
            </div>



        </form>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->

<?php include 'footer.php'; ?>