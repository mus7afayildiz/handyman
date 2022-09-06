<?php 
include 'header.php'; 
include 'sidebar.php'; 

if (!isset($_SESSION['admin_kadi'])){
    header('Location:login.php');
}

?>


<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">TAMIRCI ADMIN PANELE HOSGELDINIZ</h1>
                        <h1 class="page-subhead-line">Sitenizi yonetmek icin sol tarafta yer alan menuleri kullanabilirsiniz </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->

<?php include 'footer.php'; ?>
