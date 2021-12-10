<?php include "../../../database/data.php"; ?>
<?php
include('../../assets/includes/header.php'); 
include('../../assets/includes/navbar.php'); 
?>
<?php
    
    if(isset($_GET['ID']))  
    {
        $ID = $_GET['ID'];
    }
    $caulenh = "SELECT * FROM diadiemdulich,danhmuc,diadiem,vung WHERE vung.IDVung = diadiemdulich.IDVUNG AND diadiemdulich.IDDanhMuc = danhmuc.IDDanhMuc AND diadiem.ID = vung.IDDiaDiem AND IDDiaDiemDuLich = $ID";
    $ketqua = mysqli_query($conn,$caulenh) or die("Loi");
    if($row = mysqli_fetch_array($ketqua))
    {
        $idvung = $row['IDVung'];
        $tenvung = $row['TenVung'];
        $open = $row['dangmocua'];

        $iddanhmuc = $row['IDDanhMuc'];
        $tendanhmuc = $row['TenDanhMuc'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Thông Tin Địa Điểm Du Lịch</title>
</head>




<body>
    <form action="" method="POST">
    <div class="container">
        <div class="card shadow">
            <div class="card-header py-3">
                <h2 class="font-weight-bold text-primary text-center" style="margin-top:10px">Sửa Thông Tin Địa Điểm Du Lịch</h2> 
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Tên địa điểm du lịch</label>
                        <input type="text" name="tendiadiem" class="form-control" value="<?php echo $row['TenDiaDiemDL'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Mô tả</label>
                        <textarea name="mota" class="form-control"><?php echo $row['MoTa'] ?></textarea> 
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Địa Chỉ</label>
                        <input type="text" name="diachi" class="form-control" value="<?php echo $row['DiaChi'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tổng đánh giá</label>
                        <input type="text" name="tongdanhgia" class="form-control" value="<?php echo $row['TongDanhGia'] ?>">
                    </div>
                    <div class="form-group ">
                        <label class="font-weight-bold">Tỉnh / Vùng</label>
                        <select name="province" class="form-control" id="province">
                            <option value="<?php echo $row['ID'] ?>"><?php echo $row['TenDiaDiem'] ?></option>
                            <option value="">Chọn tỉnh thành</option>
                            <?php
                             $query=mysqli_query($conn," select * from diadiem ");
                             while($row=mysqli_fetch_array($query)){ 
                             ?>
                            <option value="<?php echo $row['ID']; ?> "><?php echo $row ['TenDiaDiem']; ?> </option>
                        <?php } ?>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Chọn địa chỉ quận / huyện</label>
                        <select name="district" class="form-control" id="district">
                            <option value="<?php echo $idvung; ?>"><?php echo $tenvung; ?></option>
                            <option>--- Quận / Huyện ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tình Trạng Hoạt Động</label>
                        <select name="dangmocua" class="form-control">
                            <?php
                                if($open == 1)
                                {
                                    echo '<option value="1">Mở cửa</option>';
                                }
                                else
                                {
                                    echo '<option value="0">Đóng cửa</option>';
                                } 
                            ?>
                            <option>----- Đóng cửa / Mở cửa -----</option>
                            <option value="0">Đóng cửa</option>
                            <option value="1">Mở cửa</option>
                        </select> 
                    </div>
                    <div class="form-group ">   
                       <label class="font-weight-bold">Danh mục</label>
                       <select name="danhmuc" class="form-control" id="IDDanhMuc">
                            <option value="<?php echo $iddanhmuc ?>"><?php echo $tendanhmuc ?></option>
                            <option>--- Danh mục---</option>
                                <?php 
                                    $danhmuc = "SELECT * FROM danhmuc";
                                    $result_danhmuc = mysqli_query($conn,$danhmuc);
                                    while($row = mysqli_fetch_array($result_danhmuc))
                                    {
                                        ?>
                                        <option value="<?php echo $row['IDDanhMuc'];?>"><?php echo $row['TenDanhMuc'] ?>
                                                            
                            </option>
                                        <?php } 
                                    ?>
                        </select>
                    </div>  
                </div>
                <div class="form-group text-center">
                        <input class="btn btn-primary" type="submit" name="btn_sua" value="Sửa">
                        <a href="../index.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Thoát</a>
                </div>
        </div>
            <?php
                            if(isset($_POST['btn_sua']))
                            {
                                
                                $tendiadiem = $_POST['tendiadiem'];
                                $mota = $_POST['mota'];
                                $diachi = $_POST['diachi'];
                                $TongDanhGia = $_POST['tongdanhgia'];
                                $IDVung = $_POST['district'];
                                $Dangmocua = $_POST['dangmocua'];
                                $iddanhmuc = $_POST['danhmuc'];
                                $themmoi = "UPDATE diadiemdulich set TenDiaDiemDL = '".$tendiadiem."',MoTa = '".$mota."',DiaChi = '".$diachi."',TongDanhGia = '".$TongDanhGia."',IDVung = '".$IDVung."',dangmocua = '".$Dangmocua."',IDDanhMuc ='".$iddanhmuc."' where IDDiaDiemDuLich = '".$ID."'";
                                $kq_themmoi = mysqli_query($conn,$themmoi) or die("lỗi");
                                echo "<script>
                                    alert('Sửa thành công.');
                                    window.location.href='edit.php?ID=".$ID."'
                                </script>";                           
                            }
                        ?> 
    </div>
    </form>
</body>    












                    
<?php
include('../../assets/includes/footer.php');
?>

</html>
  <!-- Bootstrap core JavaScript-->
  <script type="text/javascript" src="../../../assets/js/jquery-3.6.0.min.js"></script>  
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../assets/js/demo/chart-area-demo.js"></script>
  <script src="../../assets/js/demo/chart-pie-demo.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
    $("#province").on('change',function(){
        var provinceId = $(this).val();
        $.ajax({
            method:"POST",
            url: "ajax.php",
            data:{id:provinceId},
            dataType:"html",
            success:function(data)
            {
                $("#district").html(data);
            }
        });
    });
});
</script>
