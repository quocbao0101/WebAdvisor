<?php include "header.php"; ?>
<?php include "preloader.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
</head>
<body>
    <div class="container col-xl-4 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
        <h1 style="margin-bottom: 5%;">Làm mới mật khẩu</h1>
        <form action="forgot_password_process.php" method="post">

            <div class="form-group single-footer-caption mb-50">
       
               <input class="col-lg-8 btn-lg"  type="email"  name="email" placeholder="Địa chỉ email" required=>
               <i class="fa fa-lock"></i>
            </div>
              
             <input type="submit" class="btn btn-primary" value="Làm mới mật khẩu" name="reset">    
                   <i><a href="../index.php" class="btn btn-secondary btn-lg active" > Thoát</a></i>

        </form>
    </div>
</body>
</html>
<?php include "footer.php" ?>