   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost:8080/Travel/Admin/index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i ></i>
  </div>
  <div class="sidebar-brand-text mx-3">TRAVEL <sup>Admin</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="http://localhost:8080/Travel/Admin/index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Trang Chủ</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Quản Lý
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Danh Mục</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="http://localhost:8080/Travel/Admin/diadiemdulich/index.php">Địa Điểm Du Lịch</a>
      <a class="collapse-item" href="http://localhost:8080/Travel/Admin/khachsan/index.php">Quản Lý Khách Sạn</a>
      <a class="collapse-item" href="http://localhost:8080/Travel/Admin/hinhanh/index.php">Quản Lý Hình Ảnh</a>
    </div>
  </div>
</li>









<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Người Dùng
</div>

<!-- Nav Item - Pages Collapse Menu -->


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="http://localhost:8080/Travel/Admin/users/index.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span >Quản Lý Tài Khoản</span></a>
</li>

<!-- Nav Item - Tables -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php 

                if(($_SESSION['idphanquyen']) == "2")
                {
                    if(isset($_SESSION['id']))
                    {

                        $hoten = $_SESSION['ho'] ." ". $_SESSION['ten'];
                        $avatar = $_SESSION['avatar'];
                        echo $_SESSION['idphanquyen'];
                        echo $hoten;
                    }
                    else  echo "
                        <script> 
                          window.location.href = '../';
                        </script>";
                }
                else  echo "
                        <script> 
                          window.location.href = '../';
                        </script>";
                ?>
                </span>
                <img class="img-profile rounded-circle" src="<?php
                    if($_SESSION['avatar'] == NULL) 
                    {
                        echo 'https://www.hoteljob.vn/cong-dong/frontend/images/default_avatar.png';
                    }
                    else 
                    {                                                   
                      echo 'http://localhost:8080/Travel/assets/img/avatar/'.$avatar.'';
                    } 
                ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn đã sẵn sàng khỏi đây?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Bạn muốn kết thúc phiên, vui lòng bấm vào nút  "Đăng xuất" bên dưới </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>

          <form action="http://localhost:8080/Travel/Users/logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Đăng xuất</button>

          </form>


        </div>
      </div>
    </div>
  </div>