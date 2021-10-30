<?php 
include "../database/data.php";
 ?>
  <?//php include "preloader.php"; ?>


<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Travel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/logonho.png">

        <!-- CSS here -->
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="../assets/css/flaticon.css">
            <link rel="stylesheet" href="../assets/css/slicknav.css">
            <link rel="stylesheet" href="../assets/css/animate.min.css">
            <link rel="stylesheet" href="../assets/css/magnific-popup.css">
            <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="../assets/css/themify-icons.css">
            <link rel="stylesheet" href="../assets/css/slick.css">
            <link rel="stylesheet" href="../assets/css/nice-select.css">
            <link rel="stylesheet" href="../assets/css/style.css">
   </head>

  <body>
  <?php include "header.php"; ?>
    <div class="login-form">
     
     <form method="POST" action="dangky1.php" class="container justify-content-between text-center single-footer-caption mb-50">
     <h2>Đăng Ký Tài Khoản</h2>
     <div class="form-group ">
       <input type="text" class="col-lg-4 btn-lg" placeholder="Tài khoản " name="user"  >
       <i class="fa fa-user"></i>
     </div>
      <div class="form-group log-status">
       <input type="password" class="col-lg-4 btn-lg" placeholder="Mật khẩu" name="pass1">
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="col-lg-4 btn-lg" placeholder="Nhập lại mật khẩu" name="pass2">
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="fullname" class="col-lg-4 btn-lg" placeholder="Họ" name="ho">
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="fullname" class="col-lg-4 btn-lg" placeholder="Tên" name="ten">
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="email" class="col-lg-4 btn-lg" placeholder="Email" name="email">
       <i class="fa fa-lock"></i>
     </div>
     <input type="submit" name="btn_dangky" class="btn btn-lg active" class="log-btn" value="Đăng ký">
      <i><a href="../index.php" class="btn btn-secondary btn-lg active"> Thoát</a></i>
      <p style="color: darkred">
      <?php
             
            if(isset($_POST['btn_dangky']))
            {
              $taikhoan = $_POST['user'];
              $matkhau = $_POST['pass1'];
              $nlmatkhau = $_POST['pass2'];
              $ho = $_POST['ho'];
              $ten = $_POST['ten'];
              $email = $_POST['email'];
              $conn = mysqli_connect("localhost","root","","tripadvisor") or die("Không thể kết nối tới CSDL");
                   // kết nối tới máy chủ SQL của Xampp
              $caulenh_kiemtra = "select * from users where taikhoan='".$taikhoan."'"; // Câu lệnh
              $ketqua_kiemtra = mysqli_query($conn,$caulenh_kiemtra); // Thực thi câu lệnh 
              $uppercase = preg_match('@[A-Z]@', $matkhau);
              $lowercase = preg_match('@[a-z]@', $matkhau);
              $number    = preg_match('@[0-9]@', $matkhau);
              $checkmail = "SELECT * FROM users WHERE email = '".$email."'";
              $kq = mysqli_query($conn,$checkmail);
             
              if (!$taikhoan || !$matkhau || !$ho || !$ten || !$email)
              {
                    
                    echo '(*) Vui lòng nhập đầy đủ thông tin';
                    
                      
              }                 
              if(!$uppercase || !$lowercase || !$number || strlen($matkhau) < 6) {
                    // tell the user something went wrong
                  
                    
                    echo '(*) Mật khẩu của bạn không hợp lệ';
                    
              }
              if (!filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                    
                    echo '(*) Email của bạn không hợp lệ';
                    
                      
              }
              if ($matkhau == $nlmatkhau)
              {
                  if(mysqli_num_rows($ketqua_kiemtra)>=1)
                  {                   
                    echo '(*) Tài khoản của bạn đã bị trùng';                 
                  }
                  else if(mysqli_num_rows($kq)>=1)
                  {
                    echo '(*) Email của bạn đã bị trùng';
                  }
                  else
                  {                                     
                    $caulenh = "INSERT INTO users(taikhoan,matkhau,idphanquyen,ho,ten,email) values('".$taikhoan."','".$matkhau."','1','".$ho."','".$ten."','".$email."')";
                    $ketqua =  mysqli_query($conn,$caulenh);  
                    echo 'Đăng ký tài khoản thành công';
                  }
              }
              else echo '(*) Vui lòng kiểm tra lại tài khoản hoặc mật khẩu.';
           }
           
      ?></p>
</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </form>
  </body>
</html>
<?php include "footer.php"; ?>