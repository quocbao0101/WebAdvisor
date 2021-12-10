<?php
include ('../database/data.php');
include('assets/includes/header.php'); 
include('assets/includes/navbar.php'); 

$sql = "SELECT * FROM users";
$result = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($result);

$sql_diadiem = "SELECT * FROM diadiemdulich";
$ketqua = mysqli_query($conn,$sql_diadiem);
$num_rows_diadiem = mysqli_num_rows($ketqua);


$sql_ks = "SELECT * FROM khachsan";
$ketqua_ks = mysqli_query($conn,$sql_ks);
$num_rows_ks = mysqli_num_rows($ketqua_ks);



$sql_dd = "SELECT * FROM diadiem";
$ketqua_dd = mysqli_query($conn,$sql_dd);
$num_rows_dd = mysqli_num_rows($ketqua_dd);


$sql_vung = "SELECT * FROM vung";
$ketqua_vung = mysqli_query($conn,$sql_vung);
$num_rows_vung = mysqli_num_rows($ketqua_vung);
?>



<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống Kê Chung</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Người dùng</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <a href="users/index.php"><h4>Tổng số người dùng: <?php echo $num_rows; ?></h4></a>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Địa điểm du lịch</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <a href="diadiemdulich/index.php"><h4>Tổng số địa điểm du lịch: <?php echo $num_rows_diadiem; ?></h4></a>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

     <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Khách sạn</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <a href="khachsan/index.php"><h4>Tổng số khách sạn: <?php echo $num_rows_ks; ?></h4></a>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

     <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Địa điểm / Quận , huyện</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <h4>Tổng số địa điểm: <?php echo $num_rows_dd; ?></h4>
               <h4>Tổng số quận , huyện: <?php echo $num_rows_vung; ?></h4>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


</div>




  <?php
include('assets/includes/scripts.php');
include('assets/includes/footer.php');
?>