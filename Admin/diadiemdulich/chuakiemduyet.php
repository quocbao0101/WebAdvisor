<?php include "../../database/data.php" ?>
<?php
    
    $sodongtrentrang = 6;
    if(isset($_GET['trang']))
    {
        $trang = $_GET['trang'];
    }
    else $trang = 0;
    
    $lenhdem = "SELECT * from diadiemdulich";
    $ketqualenhdem = mysqli_query($conn,$lenhdem);
    $sodong = mysqli_num_rows($ketqualenhdem);
    $sotrangdl = $sodong / $sodongtrentrang;
    $vitribatdau = $trang * $sodongtrentrang;
    if(isset($_GET['key']))
    {      
        $key = $_GET['key'];
        if($key != NULL)
        {
            $lenhphantrang = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$key%' AND pheduyet ='0' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$lenhphantrang);
        }
        else
        {
            $lenhphantrang = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND pheduyet ='0' LIMIT {$vitribatdau},{$sodongtrentrang} ";
            $ketquaphantrang = mysqli_query($conn,$lenhphantrang);
        }
    }
    else
    {        
        $lenhphantrang = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND pheduyet ='0' LIMIT {$vitribatdau},{$sodongtrentrang}";
        $ketquaphantrang = mysqli_query($conn,$lenhphantrang);
    }
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Quản Lý Địa Điểm</title>

</head>
<?php
include('../assets/includes/header.php'); 
include('../assets/includes/navbar.php'); 
?>








<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
            <h1 class="font-weight-bold text-primary">Danh Mục Du Lịch</h1>

            <div class="header__btn" >

        <form action="include/delete.php" method="POST">
        <input type="submit" style="float:right ;margin-right: 1%;"  class="btn btn-danger" name="delete" value="Xóa Địa Điểm">
                    </div>
           
        
        <input type="submit" style="float:right ;margin-right: 1%;"  class="btn btn-success" name="update" value="Phê duyệt">
     
</div>
        <div class="card-body" >
        <div>
            <a class="btn btn-info" href="index.php" ><i class="fas fa-sign-out-alt"></i> Đã kiểm duyệt</a>
        </div>
<br>
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <th class="font-weight-bold text-primary text-center"> ID </th>
                <th class="font-weight-bold text-primary text-center" style="width : 150px"> Tên địa điểm </th>
                <th class="font-weight-bold text-primary text-center"> Mô tả </th>
                <th class="font-weight-bold text-primary text-center"> Địa chỉ </th>
                <th class="font-weight-bold text-primary text-center"> Hình ảnh </th>
                <th class="font-weight-bold text-primary text-center"> Đánh giá </th>
                <th class="font-weight-bold text-primary text-center"> Khu vực </th>
                <th class="font-weight-bold text-primary text-center"> Danh mục</th>
                <th class="font-weight-bold text-primary text-center"> Đang mở cửa</th>
                <th class="font-weight-bold text-primary text-center" style="width : 150px">  </th>
                <?php
                 while ($row = mysqli_fetch_array($ketquaphantrang)){
                        $sql = "SELECT * FROM hinhanh WHERE IDDiaDiem = '".$row['IDDiaDiemDuLich']."'";
                        $result = mysqli_query($conn,$sql);
                             ?>
                    <tr>
                        
                        <td class="font-weight-bold text-center"><?php echo $row['IDDiaDiemDuLich'];?></td>
                        <td><?php echo $row['TenDiaDiemDL'];?></td>
                        <td><?php echo $row['MoTa'];?></td>
                        <td><?php echo $row['DiaChi'];?></td>


                        <td >
                            <?php
                                while($row_hinhanh = mysqli_fetch_array($result))
                                { 
                            ?>
                            <img style="height: 100px;width:100px" src="../../assets/img/service/<?php echo $row_hinhanh['image'];
                        ?>">
                    <?php } ?>
                        </td>


                        <td><?php echo $row['TongDanhGia'];?></td>
                        <td><?php echo $row['TenVung'];?></td>
                        <td><?php echo $row['TenDanhMuc'] ?></td>
                        <td><?php
                            if($row['dangmocua'] == 1)
                            {
                                echo 'true';
                            }  
                            else {
                                echo 'false';
                            }
                        ?></td>
                        <td>
                            <a class="btn btn-info" href="edit.php?ID=<?php echo $row['IDDiaDiemDuLich']; ?>">Xem chi tiết</i></a>
                        </td>
                        <td >
                            <input type="checkbox" name="num[]" value="<?php echo $row['IDDiaDiemDuLich'];  ?>">
                        </td>
                        
                    </tr>
                <?php 
            } ?>
            </table>
            <div style="margin-left: 50%;">
              <div class="pagination">
                    <ul class="pagination">
                        <?php
                        for ($i = 0; $i <= $sotrangdl; $i++){
                                $t = $i + 1;
                                echo "<li class='page-item'><a  class='page-link' href='chuakiemduyet.php?trang=".$i."'>".$t."</a></li>";
                        }    ?>
                    </ul>
              </div>
            </div>
        </div>
        </form>
    </div>
</div>
    
</body>
<?php
include('../assets/includes/footer.php');
?>

</html>








  <!-- Bootstrap core JavaScript-->
  <script type="text/javascript" src="../../assets/js/jquery-3.6.0.min.js"></script>  
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/chart-area-demo.js"></script>
  <script src="../assets/js/demo/chart-pie-demo.js"></script>

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