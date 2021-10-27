<?php
    include "../database/data.php";
    if(isset($_SESSION['otp']) && isset($_SESSION['email']))
    {

        if(isset($_POST['submit']))
        {
            $code_otp = $_SESSION['otp'];
            $email = $_SESSION['email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,6);
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
                        window.location.href="dangnhap.php"
                    </script>';
                }
                else{
                    echo 'Doi mat khau that bai';
                }
            }
            else echo 'Mat khau ban vua nhap khong dung';
        }
    } 
    else {
        echo 
        "<script>                 
                window.location.href='forgot_password.html';
        </script>";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container p-3 border border-5 rounded-3" style="width: 40%">
        <h1 class="display-6 text-center p-2 bg-light">
            Đổi mật khẩu
        </h1>
        <form action="" method="post">
            <div class="row mb-3 justify-content-md-center">
                <label for="inputEmail" class="col-4 col-form-label">Mật khẩu</label>
                <div class="col-lg-auto">
                    <input type="password" name="password"  class="form-control">
                </div>
            </div>
            <div class="row mb-3 justify-content-md-center">
                <label for="inputEmail" class="col-4 col-form-label">Nhập lại mật khẩu</label>
                <div class="col-lg-auto">
                    <input type="password" name="repassword"  class="form-control">
                </div>
            </div>
            <div class="row mb-3 justify-content-md-center">
                <div class="col-8">
                    <input type="submit" class="btn btn-primary" name="submit" value="Xác nhận"></button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>