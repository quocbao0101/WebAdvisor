    <?php 
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM users WHERE ID = $id";
            $result = mysqli_query($conn,$sql);
            $row_user = mysqli_fetch_array($result);
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
        <link rel="shortcut icon" type="image/x-icon" href="http://localhost:8080/Travel/assets/img/logonho.png">

        <!-- CSS here -->
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/flaticon.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/slicknav.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/animate.min.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/themify-icons.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/slick.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/nice-select.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/style.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/main.css">
            <link rel="stylesheet" href="http://localhost:8080/Travel/assets/css/breadcrum.css">

            
   </head>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
               <div class="header-bottom  header-sticky" style="background-color:white;margin-bottom: 4%; box-shadow: 1px 1px #AAA;">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                  <a href="../index.php"><img src="../assets/img/Untitled.png"; alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <?php
                                        if($id > 0)
                                        {
                                            $avatar = $row_user['avatar'];
                                            $hoten = $row_user['ho'] ." ". $row_user['ten'];
                                            ?>
                                        <nav>               
                                        <ul id='navigation'>                                                                        

                                            <li><a href='http://localhost:8080/Travel/index.php'>Trang ch???</a></li>
                                            <li><a href='#'>Danh M???c</a>
                                                <ul class='submenu'>
                                                    <li><a href='http://localhost:8080/Travel/location.php'>Chuy??n M???c Du L???ch</a></li>
                                                    <li><a href='http://localhost:8080/Travel/hotel.php'>Chuy??n M???c Kh??ch S???n</a></li>
                                                </ul>
                                            </li>
                                            <li><a href='#'><?php echo $hoten ?>
                                            <img class='img-profile rounded-circle' 
                                            src="<?php
                                                if($avatar == NULL) 
                                                {
                                                    echo 'https://www.hoteljob.vn/cong-dong/frontend/images/default_avatar.png';
                                                }
                                                else 
                                                {
                                                    
                                                    echo 'http://localhost:8080/Travel/assets/img/avatar/'.$avatar.'';
                                                }
                                                ?>"></a>
                                                <ul class='submenu'>
                                                    <li><a href='http://localhost:8080/Travel/Users/doimatkhau.php'>?????i m???t kh???u</a></li>
                                                    <li><a href='http://localhost:8080/Travel/Users/thongtin.php'>Th??ng tin</a></li>
                                                    <li><a href='http://localhost:8080/Travel/Users/logout.php'>????ng xu???t</a></li>
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

                                            <li><a href='http://localhost:8080/Travel/index.php'>Trang ch???</a></li>
                                            <li><a href='#'>Danh M???c</a>
                                            <ul class='submenu'>
                                                <li><a href='http://localhost:8080/Travel/location.php'>Chuy??n M???c Du L???ch</a></li>
                                                <li><a href='http://localhost:8080/Travel/hotel.php'>Chuy??n M???c Kh??ch S???n</a></li> 
                                            </ul>
                                            </li>
                                            <li><a href='#'><img src='http://localhost:8080/Travel/assets/img/icon/user.png' style='height:30px;width: 30px; margin-bottom: 10px;'></a>
                                                <ul class='submenu'>
                                                    <li><a href='http://localhost:8080/Travel/Users/dangnhap.php'>????ng nh???p</a></li>
                                                    <li><a href='http://localhost:8080/Travel/Users/dangky.php'>????ng k??</a></li>
                                                    <li><a href='http://localhost:8080/Travel/Users/forgot_password.php'>Qu??n m???t kh???u</a></li>
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

