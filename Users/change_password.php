<?php
    include "../database/data.php";
?>


<?php 
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
</head>
<body>
    <div class="container col-xl-4 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
        <h1 style="margin-bottom: 5%;">
            Đổi mật khẩu
        </h1>
        <form action="" method="post">
            <div class="form-group single-footer-caption mb-50">
                    <input type="password" placeholder="Mật khẩu"  name="password"  class="col-lg-8 btn-lg" required>
            </div>
            <div class="form-group single-footer-caption mb-50">
                    <input type="password" placeholder="Nhập lại mật khẩu" name="repassword"  class="col-lg-8 btn-lg" required>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Xác nhận"></button>
            <i><a href="../index.php" class="btn btn-secondary btn-lg active" > Thoát</a></i>
        </form>
            <?php
        if(isset($_SESSION['otp']) && isset($_SESSION['email']))
        {

            if(isset($_POST['submit']))
            {
                $code_otp = $_SESSION['otp'];
                $email = $_SESSION['email'];
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,6);

                if (!$password || !$repassword)
                {
                      echo '<div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Đăng ký thất bại!</strong> Vui lòng nhập đầy đủ thông tin!
                      </div>
                      ';                    
                }                 
                else if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
                      echo '<div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Đăng ký thất bại!</strong> Mật khẩu của bạn không hợp lệ (Bao gồm hơn 6 ký tự lẫn chữ hoa và thường)!
                      </div>
                      ';    
                        
                }
                else
                {
                    if($password == $repassword)
                    {
                        $sql = "UPDATE users set matkhau = '$password' where code = '$code_otp' AND email = '$email'";
                        $result = mysqli_query($conn,$sql) or die('Error');
                        if($result)
                        {
                            
                            $sql1 = "UPDATE users set code = '$code' where email = '$email'";
                            mysqli_query($conn,$sql1);
                            echo '<script>
                                alert("Đổi mật khẩu thành công.");
                                window.location.href="logout.php"
                            </script>';
                        }
                        else{
                        echo '<div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Đổi mật khẩu thất bại!</strong> 
                          </div>
                          ';   
                        }
                    }
                    else                       echo '<div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Thất bại</strong> Mật khẩu bạn vừa nhập không trùng với nhau!
                          </div>
                          ';   
                    }
            }
        } 
        else {
            echo 
            "<script>                 
                    window.location.href='forgot_password.html';
            </script>";
        } 
    ?>
    </div>

</body>
</html>
<?php include "footer.php" ?>
<script type="text/javascript">
      window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>