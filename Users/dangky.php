<?php 
include "../database/data.php";
 ?>
<?php include "preloader.php"; ?>



  <body>
  <?php include "header.php"; ?>
    <div class="login-form">
     
     <form method="POST" action="dangky.php" class="container col-xl-4 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
          <h1><img src="../assets/img/Untitled.png"; alt=""></h1>
     <h2>Hãy Là Thành Viên Mới Của Travel</h2>
     <br>
     <div class="form-group ">
       <input type="text" class="col-lg-8 btn-lg" placeholder="Tài khoản " name="user"  >
       <i class="fa fa-user"></i>
     </div>
      <div class="form-group log-status">
       <input type="password" class="col-lg-8 btn-lg" placeholder="Mật khẩu" name="pass1">
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="col-lg-8 btn-lg" placeholder="Nhập lại mật khẩu" name="pass2">
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="text" class="col-lg-8 btn-lg" placeholder="Họ" name="ho">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="text" class="col-lg-8 btn-lg" placeholder="Tên" name="ten">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="email" class="col-lg-8 btn-lg" placeholder="Email" name="email">
       <i class="fa fa-envelope"></i>
     </div>
     <div class="form-group">
        <input type="text" class="col-lg-8 btn-lg" name="date" id="date" placeholder="Ngày sinh" />
        <i class="fa fa-calendar"></i>
     </div>
     <input type="submit" name="btn_dangky" style="margin-bottom: 5%;" class="btn btn-lg active" class="log-btn" value="Đăng ký">
      <i><a href="../index.php" class="btn btn-secondary btn-lg active" style="margin-bottom:5%;"> Thoát</a></i>

            <?php
             
            if(isset($_POST['btn_dangky']))
            {
              $taikhoan = $_POST['user'];
              $matkhau = $_POST['pass1'];
              $nlmatkhau = $_POST['pass2'];
              $ho = $_POST['ho'];
              $ten = $_POST['ten'];
              $email = $_POST['email'];
              $date = $_POST['date'];
              $date = str_replace('/', '-', $date);
              $date = date('Y-m-d', strtotime($date));

              $caulenh_kiemtra = "select * from users where taikhoan='".$taikhoan."'"; // Câu lệnh
              $ketqua_kiemtra = mysqli_query($conn,$caulenh_kiemtra); // Thực thi câu lệnh 
              $uppercase = preg_match('@[A-Z]@', $matkhau);
              $lowercase = preg_match('@[a-z]@', $matkhau);
              $number    = preg_match('@[0-9]@', $matkhau);
              $checkmail = "SELECT * FROM users WHERE email = '".$email."'";
              $kq = mysqli_query($conn,$checkmail);
             
              if (!$taikhoan || !$matkhau || !$ho || !$ten || !$email || !$date)
              {
                  echo '<div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Đăng ký thất bại!</strong> Vui lòng nhập đầy đủ thông tin!
                  </div>
                  ';                    
              }                 
              else if(!$uppercase || !$lowercase || !$number || strlen($matkhau) < 6) {
                  echo '<div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Đăng ký thất bại!</strong> Mật khẩu của bạn không hợp lệ (Bao gồm hơn 6 ký tự lẫn chữ hoa và thường)!
                  </div>
                  ';    
                    
              }
              else
              {
                if ($matkhau == $nlmatkhau)
                {
                    if(mysqli_num_rows($ketqua_kiemtra)>=1)
                    {                   
                        echo '<div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Đăng ký thất bại!</strong> Tên tài khoản của bạn đã có người đăng ký!
                        </div>
                        ';                   
                    }
                    else if(mysqli_num_rows($kq)>=1)
                    {
                        echo '<div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Đăng ký thất bại!</strong> Email của bạn đã có người đăng ký!
                        </div>
                        ';  
                    }
                    else
                    {                                     
                      $caulenh = "INSERT INTO users(taikhoan,matkhau,idphanquyen,ho,ten,email,birthday,avatar) values('".$taikhoan."','".$matkhau."','1','".$ho."','".$ten."','".$email."','".$date."','ava.png')";
                      $ketqua =  mysqli_query($conn,$caulenh);  
                                        echo '<div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Đăng ký thành công!</strong>
                  </div>
                  ';  
                    }
                }
                else echo '<div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Đăng ký thất bại!</strong> Mật khẩu bạn vừa nhẩu không trùng khớp
                  </div>
                  ';  
             }
           }

           
      ?>
       <br>
      <div class="form-group single-footer-caption mb-50">
       <i>Nếu Bạn Đã Đăng Ký Thành Công, Hãy Quay Lại </i>
       <a style="font-weight: bold; color: 014B85" href='dangnhap.php'> Đăng Nhập</a>
     </div>
    </form>

  </body>
</html>






<?php include "footer.php"; ?>
<script type="text/javascript">
  $(function () {
  $("#date").datepicker();
});
</script>
<script type="text/javascript">
      window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>
