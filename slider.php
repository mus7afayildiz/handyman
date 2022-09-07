<div class="wrapper">
    <div class="slider">
        <ul class="items">

            <?php
            $slider = "SELECT * FROM slider ORDER BY slider_sira DESC";
            $slidersor = mysqli_query($baglan, $slider);

            while ($slidercek = mysqli_fetch_array($slidersor)) {
            ?>

                <li><img src="nedmin/<?php echo $slidercek['slider_resimyol']; ?>" alt="<?php echo $slidercek['slider_ad']; ?>"></li>

            <?php } ?>
        </ul>
    </div>
    <a class="prev">prev</a> <a class="next">next</a>
    <div class="banner1-bg"></div>
    <div class="banner-1"></div>
</div>