<?php
    include "../database/data.php";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container p-3 border border-5 rounded-3" style="width: 40%">
        <h1 class="display-6 text-center p-2 bg-light">
            Xác thực mã OTP
        </h1>
        <form action="" method="post">
            <div class="row mb-3 justify-content-md-center">
                <label for="inputEmail" class="col-4 col-form-label">Mã OTP</label>
                <div class="col-lg-auto">
                    <input type="text" name="otp"  class="form-control">
                </div>
            </div>
            <div class="row mb-3 justify-content-md-center">
                <div class="col-8">
                    <input type="submit" class="btn btn-primary" name="verify" value="Xác thực"></button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>