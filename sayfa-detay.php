<?php 

include 'header.php'; 

$sayfa_id = $_GET['sayfa_id'];
$sayfasor = $baglan->query("SELECT * FROM sayfalar WHERE sayfa_id='$sayfa_id'");
$sayfacek = mysqli_fetch_array($sayfasor);

?>

<!--==============================aside================================-->
<aside>
  <div class="wrapper">

      <div style="padding-left:13px;" class="column-2">
        <div class="box">
          <div class="aligncenter">
            <h4> <?php echo $sayfacek['sayfa_ad']; ?></h4>
          </div>
          <div class="box-bg maxheight">
            <div class="padding">
              
              <p><?php echo substr($sayfacek['sayfa_icerik'],0,200); ?></p>
            </div>
            <div class="aligncenter"> <a class="button" href="#">More Details</a> </div>
          </div>
        </div>
      </div>


  </div>
</aside>
<!--==============================content================================-->


</div>
</div>

<?php include 'footer.php' ?>