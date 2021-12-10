
<?php 
include "../database/data.php"; 
include "header.php";
?>
<?php include "preloader.php"; ?>
<?php
    if(isset($_GET['email']))
    {

        $email = $_GET['email'];
        $_SESSION['email'] = $email;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $verifyQuery = mysqli_query($conn,$sql) or die("Lỗi");
        $row = mysqli_fetch_array($verifyQuery);
        if(isset($_POST['verify']))
        {
            $otp = $_POST['otp'];
            $_SESSION['otp'] = $otp;
            if($otp == $row['code'])
            {              
                echo "<script>
                    window.location.href='change_password.php';
                </script>";
                
            }
            else
            {
                echo "<script>
                    alert('Mã OTP của bạn không đúng.');
                    window.location.href='otp.php?email=$email';
                </script>";
            }

        }
    }
    else{
       echo "<script> window.location.href='forgot_password.html'</script>";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực OTP</title>
</head>
<body>
    <div class="container col-xl-4 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
        <h1 style="margin-bottom: 5%;">
            Xác thực mã OTP
        </h1>
        <form action="" method="post">


            <div class="form-group single-footer-caption mb-50">
       
               <input class="col-lg-8 btn-lg"  type="text"  name="otp" placeholder="Mã OTP" required=>
               <i class="fa fa-lock"></i>
            </div>
              
            <input type="submit" class="btn btn-primary" value="Xác thực" name="verify">    
            <i><a href="../index.php" class="btn btn-secondary btn-lg active" > Thoát</a></i>

        </form>
    </div>
</body>
</html>
<?php include "footer.php" ?>