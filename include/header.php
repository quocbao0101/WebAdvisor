    <?php 
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            $hoten = $_SESSION['ho'] ." ". $_SESSION['ten'];
        }
        else 
        {
            $id = 0;
        }
    ?>
        <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Travel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <!-- CSS here -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/main.css">
   </head>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
               <div class="header-bottom  header-sticky" style="background-color:white;">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                  <a href="index.php"><img src="assets/img/logo/Untitled.png" ; alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <?php
                                        if($id > 0)
                                        {
                                            $avatar = $_SESSION['avatar'];
                                            ?>
                                        <nav>               
                                        <ul id='navigation'>                                                                        

                                            <li><a href='http://localhost/Travel/index.php'>Trang chủ</a></li>
                                            <li><a href='#'>Trang</a>
                                                <ul class='submenu'>
                                                    <li><a href='http://localhost/Travel/location.php'>Địa điểm du lịch</a></li>
                                                    <li><a href='http://localhost/Travel/hotel.php'>Khách sạn</a></li>
                                                </ul>
                                            </li>
                                            <li><a href='#'><?php echo $hoten ?>
                                            <img class='img-profile rounded-circle' 
                                            src="<?php
                                                if($_SESSION['avatar'] == NULL) 
                                                {
                                                    echo 'https://www.hoteljob.vn/cong-dong/frontend/images/default_avatar.png';
                                                }
                                                else 
                                                {
                                                    
                                                    echo 'http://localhost/Travel/assets/img/avatar/'.$avatar.'';
                                                }
                                                ?>"></a>
                                                <ul class='submenu'>
                                                    <li><a href='http://localhost/Travel/Users/doimatkhau.php'>Đổi mật khẩu</a></li>
                                                    <li><a href=''>Thông tin</a></li>
                                                    <li><a href='http://localhost/Travel/Users/logout.php'>Đăng xuất</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                    <?php 
                                        }  
                                        else
                                        {
                                        echo "<nav>               
                                        <ul id='navigation'>                                                                        

                                            <li><a href='http://localhost/Travel/index.php'>Trang chủ</a></li>
                                            <li><a href='#'>Trang</a>
                                                <ul class='submenu'>
                                                    <li><a href='http://localhost/Travel/location.php'>Địa điểm du lịch</a></li>
                                                    <li><a href='http://localhost/Travel/hotel.php'>Khách sạn</a></li>

                                                </ul>
                                            </li>
                                            <li><a href='#'><img src='http://localhost/Travel/assets/img/icon/user.png' style='height:30px;width: 30px; margin-bottom: 10px;'></a>
                                                <ul class='submenu'>
                                                    <li><a href='http://localhost/Travel/Users/dangnhap.php'>Đăng nhập</a></li>
                                                    <li><a href='http://localhost/Travel/Users/dangky.php'>Đăng ký</a></li>
                                                    <li><a href='http://localhost/Travel/Users/forgot_password.php'>Quên mật khẩu</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>";
                                        }
                                    ?> 

                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

