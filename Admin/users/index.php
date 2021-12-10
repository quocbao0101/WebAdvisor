<?php include "../../database/data.php" ?>
<?php
    
    $sodongtrentrang = 5;
    if(isset($_GET['trang']))
    {
        $trang = $_GET['trang'];
    }
    else $trang = 0;
    $lenhdem = "select * from users";
    $ketqualenhdem = mysqli_query($conn,$lenhdem);
    $sodong = mysqli_num_rows($ketqualenhdem);
    $sotrangdl = $sodong / $sodongtrentrang;
    $vitribatdau = $trang * $sodongtrentrang;
    if(isset($_GET['key']))
    {      
        $key = $_GET['key'];
        if($key != NULL)
        {
            $lenhphantrang = "SELECT users.ID,code,email,tenphanquyen,taikhoan,matkhau,ho,ten,lancuoidangnhap from users,phanquyen WHERE users.idphanquyen = phanquyen.ID AND taikhoan LIKE '%$key%' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$lenhphantrang);
        }
        else
        {
            $lenhphantrang = "SELECT users.ID,code,email,tenphanquyen,taikhoan,matkhau,ho,ten,lancuoidangnhap from users,phanquyen WHERE users.idphanquyen = phanquyen.ID LIMIT {$vitribatdau},{$sodongtrentrang} ";
            $ketquaphantrang = mysqli_query($conn,$lenhphantrang);
        }
    }
    else
    {        
        $lenhphantrang = "SELECT users.ID,code,email,tenphanquyen,taikhoan,matkhau,ho,ten,lancuoidangnhap from users,phanquyen WHERE users.idphanquyen = phanquyen.ID LIMIT {$vitribatdau},{$sodongtrentrang} ";
        $ketquaphantrang = mysqli_query($conn,$lenhphantrang);
    }

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Quản lý tài khoản</title>

</head>
<?php
include('../assets/includes/header.php'); 
include('../assets/includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản khách hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="code.php" method="POST">
        <div class="modal-body">

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
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
            <input type="submit" name="btn_them" class="btn btn-primary" value="Thêm tài khoản">
        </div>
        </form>
    </div>
  </div>
</div>





<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

    <h1 class="m-0 font-weight-bold text-primary">Quản Lý Tài Khoản </h1>
    <form action="search.php" method="POST">
        <input type="text" name="txtSearch" style="width: 20%;float: left;" class="form-control">
        <input type="submit" name="btn_search" style="float:left;"  class="btn btn-info" value="Tìm kiếm">  
    </form>
    

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" style="float: right;">
              Thêm mới tài khoản 
            </button>
    <form action="delete.php" method="POST">
    <input type="submit" name="btn_delete" style="margin-right: 1%;float:right;" class="btn btn-danger" value="Xóa tài khoản">

     
  </div>
  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="font-weight-bold text-primary text-center">ID</th>
            <th class="font-weight-bold text-primary text-center">Tên đăng nhập</th>
            <th class="font-weight-bold text-primary text-center">Mật khẩu</th>
            <th class="font-weight-bold text-primary text-center">Email</th>
            <th class="font-weight-bold text-primary text-center">Phân quyền</th>
            <th class="font-weight-bold text-primary text-center">Họ tên</th>
            <th class="font-weight-bold text-primary text-center">Lần cuối đăng nhập</th>
            <th class="font-weight-bold text-primary text-center">Code</th>
            <th class="font-weight-bold text-primary text-center">Sửa</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
     
            <?php
             while ($row = mysqli_fetch_array($ketquaphantrang)){
            ?>
                <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['taikhoan'];?></td>
                    <td><?php echo $row['matkhau']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['tenphanquyen'];?></td>
                    <td><?php echo $row['ho'].' '.$row['ten'];?></td>
                    <td><?php echo $row['lancuoidangnhap'];?></td>
                    <td><?php echo $row['code'];?></td>
                    <td class="text-center">
                        <a class="btn btn-info" href="edit.php?ID=<?php echo $row['ID']; ?>"><i class="fas fa-edit">Sửa</i></a>
                    </td>
                    <td >
                        <input type="checkbox" name="num[]" value="<?php echo $row['ID'];  ?>">
                    </td>
                </tr>
            <?php } ?>

        </tbody>
      </table>
      </form>

        <div style="margin-left: 50%;">
                <div class="pagination">
                    <ul class="pagination font-weight-bold text-primary">
                            <?php
                            for ($i = 0; $i <= $sotrangdl; $i++){
                                    $t = $i + 1;
                                    echo "<li class='page-item'><a  class='page-link' href='index.php?trang=".$i."'>".$t."</a></li>";
                            }    ?>
                    </ul>
                </div>
        </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

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