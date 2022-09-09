<?php

include 'header.php';

$haber_id = $_GET['haber_id'];
$habersor = $baglan->query ("SELECT * FROM haber WHERE haber_id='$haber_id'");
$habercek = mysqli_fetch_array($habersor);
/*
$haber_hit = $habercek['haber_hit'];
$haber_hit++ ;
$haberhit = $baglan->query("UPDATE haber SET haber_hit ='" . $haber_hit . "' WHERE haber_id='$haber_id'"); */

?>
<!--==============================content================================-->
<section id="content">
    <div class="wrapper">
        <article class="col-1">

            <div class="indent-left">
                <center>
                    <figure class="img-indent"><img width="200" height="200" src="nedmin/<?php echo $habercek['haber_resimyol']; ?>" alt=""></figure>
                </center>

                <div class="wrapper prev-indent-bot">

                    <div class="extra-wrap">

                        <h6 class="prev-indent-bot"><?php echo $habercek['haber_ad']; ?></h6>
                        <?php echo $habercek['haber_detay']; ?>

                    </div>
                </div>

            </div>
            <br><br>



        </article>
        <article class="col-2">
            <h4 style="font-size:20px;" class="p1">En Cok Okunan Haberler</h4>
            <ul class="list-1">

                <?php
                $haber = "SELECT * FROM haber ORDER BY haber_hit DESC LIMIT 10 ";
                $habersor = mysqli_query($baglan, $haber);

                while ($habercek = mysqli_fetch_array($habersor)) { ?>


                    <li><a href="#"><?php echo $habercek['haber_ad'] ?></a></li>

                <?php  } ?>

            </ul>
        </article>
    </div>
</section>
<!--==============================aside================================-->
<aside>


    <div class="block"></div>
</aside>
</div>
</div>
<!--==============================footer=================================-->
<?php include 'footer.php'; ?>