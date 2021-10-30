<?php 
include "database/data.php";
 ?>
<!doctype html>
<html class="no-js" lang="zxx">

   <body>
        <?php include "include/preloader.php" ?>
    <header>
        <?php include "include/header.php" ?>
    </header>


<script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>

<div class="container" style="margin-top: 10%;  width: 50%; height: 50%; ">
                    
    <div class="row">
        <div class="col-md-12">
                <h2>Địa điểm du lịch</h2>  
                <?php include "action/search_hotel.php"; ?>  
        </div>
    </div>
</div>
    <main>
        <div class="favourite-place place-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">

                        </div>
                    </div>
                </div>
                
                <?php include "action/itemhotel.php"; ?>
            </div>
        </div>
    </main>



    <?php include "include/footer.php" ?>    
    </body>
</html>