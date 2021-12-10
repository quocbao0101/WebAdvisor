<?php include "../../database/data.php" ?>
<?php
    
    $sodongtrentrang = 6;
    if(isset($_GET['trang']))
    {
        $trang = $_GET['trang'];
    }
    else $trang = 0;
    
    $lenhdem = "SELECT * from khachsan";
    $ketqualenhdem = mysqli_query($conn,$lenhdem);
    $sodong = mysqli_num_rows($ketqualenhdem);
    $sotrangdl = $sodong / $sodongtrentrang;
    $vitribatdau = $trang * $sodongtrentrang;
    include('include/getitem.php');


 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    <title>Quản Lý Danh Mục Khách Sạn</title>
</head>
<?php
include('../assets/includes/header.php'); 
include('../assets/includes/navbar.php'); 
include('include/them.php');
?>






<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
            <h1 class="font-weight-bold text-primary">Danh Mục Khách Sạn</h1>
            <form action="include/search.php" method="POST">
                <input type="text" name="txtSearch" style="width: 20%;float: left;" class="form-control" placeholder="Tìm kiếm theo tên khách sạn">
                <select  name="provinces" id="provinces"  class="form-control search">
                        <option value="">Tỉnh / Thành</option>
                                    <?php 
                                        $result = mysqli_query($conn,"SELECT * FROM diadiem");
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <option value="<?php echo $row['ID'];?>"><?php echo $row['TenDiaDiem'] ?></option>
                                        <?php } 
                                    ?>
                </select> 
                <select  name="districts" id="districts"  class="form-control search">
                    <option value="">Quận / Huyện</option>
                </select>   
                <select  name="ratings"  class="form-control search">
                    <option value="">Mức độ đánh giá</option>
                    <?php 
                        for ($i=1; $i <=5 ; $i++) { 
                            echo '<option value="'.$i.'">'.$i.' sao</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="btn_search" style="float:left;"  class="btn btn-info" value="Tìm kiếm">  
            </form>
            <div class="header__btn" >
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" style="float: right;">
                          Thêm mới khách sạn
                        </button>

                <form action="include/delete.php" method="POST">
                <input type="submit" style="float:right ;margin-right: 1%;"  class="btn btn-danger" name="delete" value="Xóa khách sạn">
        </div>

                    </div>
        <div class="card-body">
            <div>
                <a class="btn btn-info" href="chuakiemduyet.php" ><i class="fas fa-sign-out-alt"></i>Chưa kiểm duyệt</a>
            </div>
            <br>
            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <th class="font-weight-bold text-primary text-center"> ID </th>
                <th class="font-weight-bold text-primary text-center" width="15%"> Tên khách sạn </th>
                <th class="font-weight-bold text-primary text-center"> Mô tả </th>
                <th class="font-weight-bold text-primary text-center"> Địa chỉ </th>
                <th class="font-weight-bold text-primary text-center"> Hình ảnh </th>
                <th class="font-weight-bold text-primary text-center"> Đánh giá </th>
                <th class="font-weight-bold text-primary text-center"> Khu vực </th>
                <th class="font-weight-bold text-primary text-center"> Đang mở cửa</th>
                <th class="font-weight-bold text-primary text-center">  </th>
                <?php
                 while ($row = mysqli_fetch_array($ketquaphantrang)){
                        $sql = "SELECT * FROM hinhanh WHERE IDKhachSan = '".$row['IDKhachSan']."'";
                        $result = mysqli_query($conn,$sql);
                             ?>
                    <tr>
                        
                        <td><?php echo $row['IDKhachSan'];?></td>
                        <td><?php echo $row['TenKhachSan'];?></td>
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
                            <a class="btn btn-info" href="include/edit.php?ID=<?php echo $row['IDKhachSan']; ?>"><i class="fas fa-edit">Sửa</i></a>
                        </td>
                        <td >
                            <input type="checkbox" name="num[]" value="<?php echo $row['IDKhachSan'];  ?>">
                        </td>
                        
                    </tr>
                <?php 
            } ?>
            </table>
            </form>
        </div>
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
    </form>
</div>
</div>


                    
</body>


</html>
<?php
include('../assets/includes/footer.php');
?>






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

    <script type="text/javascript" src="../../assets/js/jquery-3.6.0.min.js"></script>  

    <script type="text/javascript">
        $(document).ready(function(){
        $("#province").on('change',function(){
            var provinceId = $(this).val();
            $.ajax({
                method:"POST",
                url: "include/ajax.php",
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
    <script type="text/javascript">
        $(document).ready(function(){
        $("#provinces").on('change',function(){
            var provinceId = $(this).val();
            $.ajax({
                method:"POST",
                url: "include/ajax.php",
                data:{id:provinceId},
                dataType:"html",
                success:function(data)
                {
                    $("#districts").html(data);
                }
            });
        });
    });
    </script>