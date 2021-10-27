<?php include "../../database/data.php"; ?>
<?php
include('../assets/includes/header.php'); 
include('../assets/includes/navbar.php'); 
?>
<?php
    
    if(isset($_GET['ID']))  
    {
        $ID = $_GET['ID'];
    }
    $lenhpq = "select * from phanquyen";
    $kqpq = mysqli_query($conn,$lenhpq);

    $caulenh = "select * from users where ID = '".$ID."'";
    $ketqua = mysqli_query($conn,$caulenh);
    $row = mysqli_fetch_array($ketqua);
    $tk = $row['taikhoan'];
    $em = $row['email'];
    $pq = $row['idphanquyen'];
    $h = $row['ho'];
    $t = $row['ten'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa tài khoản</title>

</head>
<body>
    <form action="#" method="POST">
    <div class="container">
        <div class="card shadow">
        <div class="card-header py-3">
            <h2 class="font-weight-bold text-primary text-center" style="margin-top:10px">Sửa Thông Tin</h2> </div>
            <div class="card-body">
                    <div class="form-group">
                        <label>Tài khoản</label>
                        <input class="form-control" type="text" value="<?php echo $row['taikhoan'] ?>" required disabled name="txtTK">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" required name="txtMK">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" value="<?php echo $row['email'] ?>" required disabled name="txtEmail">
                    </div>
                    <div class="form-group">
                        <label>Họ</label>
                        <input class="form-control" type="text" value="<?php echo $row['ho'] ?>" required name="txtHo">
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" type="text" value="<?php echo $row['ten'] ?>" required name="txtTen">
                    </div>
                    <div class="form-group">
                        <label>Phân quyền</label>
                        <select id="txtPhanQuyen" name="txtPhanQuyen" class="form-control">
                            <option selected disabled>--- Chọn phân quyền ---</option>
                            <?php while ($dong = mysqli_fetch_array($kqpq)): ?>
                                <option <?php if($row['idphanquyen'] === $dong['ID']){echo 'selected';}  ?> value="<?php echo $dong['ID'] ?>"><?php echo $dong['tenphanquyen']; ?></option>
                            <?php endwhile;  ?>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <input class="btn btn-primary" type="submit" name="btn_sua" value="Sửa">
                        <a href="index.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Thoát</a>
                    </div>
                    <?php
                        	if(isset($_POST['btn_sua']))
                        	{
                        		
                        		$matkhau = $_POST['txtMK'];
                        		$phanquyen = $_POST['txtPhanQuyen'];
                        		$ho = $_POST['txtHo'];
                                $ten = $_POST['txtTen'];

                        		$themmoi = "UPDATE users set matkhau = '".$matkhau."',idphanquyen = '".$phanquyen."',ho = '".$ho."',ten = '".$ten."' where ID = '".$ID."'";
                        		$kq_themmoi = mysqli_query($conn,$themmoi);
											               
                        	}
                        ?>
                            </div>
                        </div>
                    </div>
                    </form>
                    

<?php
include('../assets/includes/footer.php');
?>

</html>








  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/chart-area-demo.js"></script>
  <script src="../assets/js/demo/chart-pie-demo.js"></script>