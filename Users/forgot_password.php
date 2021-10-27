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
    <div class="container p-3 border border-5 rounded-3" style="height: 50%; margin-bottom: 5%;">
        <h1 class="display-6 text-center p-2 bg-light">Làm mới mật khẩu</h1>
        <form action="forgot_password_process.php" method="post">
            <div class="row mb-3 justify-content-md-center">
                <div class="col-auto">
                    <input type="email" name="email" placeholder="Email address" class="form-control">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" name="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php include "footer.php" ?>