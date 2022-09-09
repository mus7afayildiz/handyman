<?php include 'header.php'; ?>
<!--==============================content================================-->
<section id="content">
  <div class="wrapper">
    <article class="col-1">

      <!-- While Baslangic -->

      <!-- Sayfalama Baslangic -->
      <?php

      $sayfada = 4; // sayfada gosterilecek icerik miktarini belirtiyoruz.

      $sorgu = mysqli_query($baglan, "SELECT * FROM haber");
      $toplam_icerik = mysqli_num_rows($sorgu);

      $toplam_sayfa = ceil($toplam_icerik / $sayfada);

      //eger sayfa girilmemisse 1 varsayalim
      $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

      //eger 1'den kucuk bir sayfa sayisi girildiyse 1 yapalim
      if ($sayfa < 1) $sayfa = 1;

      //toplam sayfa sayimizdan fazla yazilirsa en son sayfayi varsayalim.
      if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
      $limit = ($sayfa - 1) + $sayfada;

      //sayfalama bitis

      ?>

      <!-- Sayfalama -->




      <?php
      $haber = "SELECT * FROM haber ORDER BY haber_ad DESC LIMIT $limit,$sayfada";


      $habersor = mysqli_query($baglan, $haber);

      while ($habercek = mysqli_fetch_assoc($habersor)) { ?>

        <div class="indent-left">
          <h3 class="prev-indent-bot">HABER BLOGU</h3>
          <div class="wrapper prev-indent-bot">
            <figure class="img-indent"><img width="200" height="200" src="nedmin/<?php echo $habercek['haber_resimyol']; ?>" alt=""></figure>
            <div class="extra-wrap">

              <h6 class="prev-indent-bot"><?php echo $habercek['haber_ad'] ?></h6>
              <?php echo substr($habercek['haber_detay'], 0, 300); ?>
            </div>
          </div>
          <div style="float:right; padding-bottom: 15px;" class="indent-right">
            <a class="button-2" href="haber-detay.php?haber_id=<?php echo $habercek['haber_id']; ?>">Read More</a>
          </div>
        </div>
        <br><br>
        <hr>

      <?php }  ?>
      <!-- While Bitis -->

      <!-- paging -->
      <div align="right" class="col-md-12">
        <?php

        $s = 0;

        while ($s < $toplam_sayfa) {

          $s++; ?>

          <a href="haberler.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

        <?php }
        ?>
      </div>

      <!-- paging -->




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