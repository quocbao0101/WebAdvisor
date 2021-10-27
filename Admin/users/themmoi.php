<?php include "../../database/data.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../admin.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm mới</title>
    <style>
        .container {
            max-width: 900px;
        }

        .has-error label,
        .has-error input,
        .has-error textarea {
            color: red;
            border-color: red;
        }

        .list-unstyled li {
            font-size: 13px;
            padding: 4px 0 0;
            color: red;
        }
    </style>
</head>
<body>
    <form action="#" method="POST">
    <div class="header">
        <h1 class="header__title">Thêm mới tài khoản</h1>
    </div>
    <br>
    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header text-center">Thêm tài khoản:</h5>
            <div class="card-body">
                    <div class="form-group">
                        <label>Tài khoản</label>
                        <input class="form-control" type="text" required name="txtTK">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" required name="txtMK">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" required name="txtEmail">
                    </div>
                    <div class="form-group">
                        <label>Họ</label>
                        <input class="form-control" type="text" required name="txtHo">
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" type="text" required name="txtTen">
                    </div>
                    <div class="form-group">
                        <label>Phân quyền</label>
                        <select id="txtPhanQuyen" name="txtPhanQuyen" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Khách hàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary btn-block" type="submit" name="btn_them" value="Thêm">
                        <br>
                        <a href="index.php" class="btn"><i class="fas fa-sign-out-alt"></i> Thoát</a>
                    </div>
                    <?php
                            if(isset($_POST['btn_them']))
                            {
                                $taikhoan = $_POST['txtTK'];
                                $matkhau = $_POST['txtMK'];
                                $email = $_POST['txtEmail'];
                                $ho = $_POST['txtHo'];
                                $ten = $_POST['txtTen'];
                                $idphanquyen = $_POST['txtPhanQuyen'];
                                $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,6);

                                
                                $caulenh = "select * from users where taikhoan = '".$taikhoan."'";
                                $ketqua = mysqli_query($conn,$caulenh);
                                if(mysqli_num_rows($ketqua)>=1)
                                {
                                            echo "<script type='text/javascript' >";
                                            echo "alert('Tài khoản đã có người sử dụng!');";
                                            echo "window.location.href='themmoi.php'";
                                            echo "</script>";
                                }
                                else
                                {
                                    $themmoi = "INSERT INTO users(taikhoan,matkhau,email,ho,ten,idphanquyen,lancuoidangnhap,code) values('".$taikhoan."','".$matkhau."','".$email."','".$ho."','".$ten."','".$idphanquyen."',CURRENT_TIMESTAMP,'".$code."')";
                                    $kq_themmoi = mysqli_query($conn,$themmoi);
                                    echo 'Thêm tài khoản thành công';
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>