<?php 
  include "../database/data.php";
?>
<?php include "preloader.php"; ?>
<?php include "header.php"; ?>

<head>

    <form action="" method="POST">
    <div class="container justify-content-between text-center single-footer-caption mb-50">
    <h1>Đăng Nhập</h1>
    
     <div class="form-group single-footer-caption mb-50">
       <input class="col-lg-4 btn-lg"  type="text"  name="txtTK" placeholder="Tài khoản " id="txtTK">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group single-footer-caption mb-50">
       
       <input class="col-lg-4 btn-lg"  type="password"  name="txtMK" placeholder="Mật khẩu" id="txtMK">
       <i class="fa fa-lock"></i>
     </div>
      
     <input type="submit" style="backgroud-color:7FABBB" class="btn btn-secondary btn-lg active" id="btn" value="Đăng nhập" name="btn">    
           <i><a href="../index.php" class="btn btn-secondary btn-lg active" > Thoát</a></i>
     <p style="color: red">
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
                  echo "Đăng nhập thất bại";
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
   </div>
  </form>
</body>
</html>

<?php include "footer.php"; ?>