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
<div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider hero-overly  slider-height d-flex align-items-center" data-background="assets/img/hero/image1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="hero__caption text-center">
                                    <h1 style="  color:white; magin: bottom 10px;  ">CHUYÊN MỤC KHÁCH SẠN<span></span> </h1>
                                    <br>
                                    <a style="font-size: 50px; color:white ">Những Điểm Dừng Chân Uy Tín Cho Bạn</a>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        
                    </div>
                </div>
            </div>
</div>
<div class="container" style="margin-top: 10%;  width: 50%; height: 50%; ">
                    
    <div class="row">
        <div class="col-md-12">
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
                        <div class="section-tittle" style="margin-bottom:5%">
                                                        <?php if(isset($_SESSION['id']))
                            { 
                              echo '<a class="btn" href="Users/themkhachsan.php">Cùng Chia Sẽ Khách Sạn Uy Tín</a>';  ?>
                             
                         <?php }
                         else{} ?>
                             
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