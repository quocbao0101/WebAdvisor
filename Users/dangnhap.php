<?php 
  include "../database/data.php";
?>
<?php include "preloader.php"; ?>
<?php include "header.php"; ?>

<head>

    <form action="" method="POST">
    <div class="container col-xl-4 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
    <h1><img src="../assets/img/Untitled.png"; alt=""></h1>
    <br>
    <br>
     <div class="form-group single-footer-caption mb-50">
       <input class="col-xl-8 btn-lg"  type="text"  name="txtTK" placeholder="Tài khoản " id="txtTK">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group single-footer-caption ">
       <input class="col-xl-8 btn-lg"  type="password"  name="txtMK" placeholder="Mật khẩu" id="txtMK">
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group single-footer-caption col-xl-10">
       <a style="font-weight: bold; color: Black; float : right" href='forgot_password.php'> Quên Mật Khẩu ?</a>
     </div>
      <br>
     <input type="submit" style="backgroud-color:7FABBB" class="btn btn-lg active" id="btn" value="Đăng nhập" name="btn">    
           <i><a href="../index.php" class="btn btn-secondary btn-lg active" > Thoát</a></i>
           <p style="font-weight: bold; color: darkred">
           
      <?php 
          if(isset($_POST['btn']))
          {
                $TK = $_POST['txtTK'];
                $MK = $_POST['txtMK'];
                $caulenh = "select * from users where taikhoan = '".$TK."' and matkhau = '".$MK."'";
                $ketqua = mysqli_query($conn, $caulenh);
                if($dong = mysqli_fetch_array($ketqua))
                {
                  $_SESSION['ho'] = $dong['ho'];
                  $_SESSION['ten'] = $dong['ten'];
                  $_SESSION['idphanquyen'] = $dong['idphanquyen'];
                  $_SESSION['id'] = $dong['ID'];
                  $_SESSION['avatar'] = $dong['avatar'];
                }
                if(mysqli_num_rows($ketqua) >=1)
                {
                  $update = "UPDATE users set lancuoidangnhap = CURRENT_TIMESTAMP where taikhoan ='".$TK."'";
                  mysqli_query($conn,$update);
                }
                else
                {
                  echo '<div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Đăng nhập thất bại ! Sai tài khoản hoặc mật khẩu
                  </div>
                  ';   
                  
                }
                if (isset($_SESSION['idphanquyen'])) 
                {
                    if ($_SESSION['idphanquyen'] == '2') 
                    {
                        echo "
                        <script> 
                          window.location.href = '../Admin/index.php';
                        </script>";
                    }
                    else 
                    {
                        echo "
                        <script> 
                          window.location.href = '../index.php';
                        </script>";
                    }
                }
          }
          ?>
      </p>
      <br>
      <div class="form-group single-footer-caption mb-50">
       <i>Nếu Bạn Chưa Là Thành Viên </i>
       <a style="font-weight: bold; color: 014B85" href='dangky.php'> Đăng Ký</a>
     </div>
   </div>
  </form>
</body>
</html>

<?php include "footer.php"; ?>
<script type="text/javascript">
      window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>