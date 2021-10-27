<?php include("database/data.php") ?>
<!doctype html>
<html class="no-js" lang="zxx">


   <body>
    <!-- Preloader Start -->
    <?php include "include/preloader.php" ?>
    <?php
        include "include/header.php"; 
    ?>
    <main>
    <!-- slider Area Start-->
    <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider   slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="hero__caption">
                                <a style="font-size: 50px; font-style:Bold; color:Black ">Khám Phá Thú Vị</a>
                                    <h1 style=" color:Black; magin: bottom 10px;  ">Chúng Ta<span></span> </h1>
                                    <br>
                                    <h1 style="font-size: 50px; color:white ">Cùng Chung Khoảnh Khắc</h1>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-xl-4" >
                                <!-- form -->
                                <form  action="#" class="search-box">
                                    
                                    <div style="border-width: thin; border-style: groove;"  class="input-form mb-30">
                                        <input type="text" placeholder="Bạn muốn đi đâu ?">
                                    </div>

                                    <div class="search-form">
                                        <a href="#">Tìm kiếm</a>
                                    </div>	
                                   
                                </form>	
                            </div>
                        </div>
        <!-- slider Area End-->

        <!-- Favourite Places Start -->
        <div class="favourite-place place-padding">
            <div class="container">
                
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2>Địa điểm du lịch ưa thích</h2>
                        </div>
                    </div>
                </div>
                <?php
                    
                    $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem ORDER BY TongDanhGia DESC LIMIT 6";
                    $result = mysqli_query($conn,$sql);
                ?>
                <div class="row">
                    <?php  

                    while($row = mysqli_fetch_array($result)) { 
                                    $sql1 = "SELECT * FROM hinhanh WHERE IDDiaDiem = '".$row['IDDiaDiemDuLich']."' LIMIT 1";
                                    $result1 = mysqli_query($conn,$sql1);
                                    while($row1 = mysqli_fetch_array($result1))
                                        {;

                                    ?>



                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-place mb-30">
                            <div class="place-img">
                                <img style="height: 350px;width: 350px" src="assets/img/service/<?php echo $row1['image']; ?>" alt="">
                            </div>
                            <div class="place-cap">
                                <div class="place-cap-top">
                                    <span><i class="fas fa-star"></i><span><?php echo $row['TongDanhGia'] ?> sao</span> </span>
                                    <h3><a href="detail-location.php?diadiem=<?php echo $row['IDDiaDiemDuLich']; ?>"><?php echo $row['TenDiaDiemDL']; ?></a></h3>
                                    <p class="dolor"><?php echo $row['TenDanhMuc'] ?><span></span></p>

                                </div>
                                <div class="place-cap-bottom">
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i><?php echo $row['TenDiaDiem']; ?></li>
                                        <li><?php if($row['dangmocua'] == true){ echo 'Đang mở cửa';} else echo 'Đóng cửa'; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                } ?>
                </div>
            </div>
        </div>
        <!-- Favourite Places End -->
  


</html>
