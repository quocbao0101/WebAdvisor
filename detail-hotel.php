<?php include "database/data.php" ?>
<?php
    if(isset($_GET['khachsan']))
    {
        $idkhachsan = $_GET['khachsan'];
    }
    else $idkhachsan = null;
    $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVung = vung.IDVung AND diadiem.ID = vung.IDDiaDiem AND IDKhachSan = $idkhachsan";
    $result = mysqli_query($conn,$sql) or die("Lỗi");
    $row = mysqli_fetch_array($result);
    $sql_image = "SELECT * FROM hinhanh WHERE IDKhachSan = $idkhachsan";
    $kq = mysqli_query($conn,$sql_image);
?>
   <body>
        <?php include "include/preloader.php" ?>
    <header>
        <?php include "include/header.php" ?>
        <link rel="stylesheet" href="assets/css/breadcrum.css">

    </header>

    <nav aria-label="breadcrumb" >
      <ol class="breadcrumb breadcrumb-custom" >
        <li class="breadcrumb-item"><a href="#"><?php echo $row['TenKhachSan'] ?></a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo $row['TenVung'] ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $row['TenKhachSan'] ?></li>
      </ol>
    </nav>



    <main>
        <div class="container">

          <div class="row">
            <div class="col-md-9">

              <article class="card mb-4">
                <header class="card-header">
                <a href="">
                    <h1 class="card-title"><?php echo $row['TenKhachSan']?></h1>
                </a>
                </header>
                <?php while($row_image = mysqli_fetch_array($kq)) { ?>
                <a href="">
                  <img class="card-img" src="assets/img/service/<?php echo $row_image['image'] ?>" alt="">
                </a>
                <?php } ?>
                <div class="card-body">
                  <h5 class="card-text">Địa chỉ :  <?php echo $row['DiaChi']; ?></h5>
                </div>
              </article><!-- /.card -->

              <?php include('action/commentks.php'); ?>


            </div>
            
            <div class="col-md-3 ms-auto">
                            <aside class="sidebar sidebar-sticky">
                <div class="card mb-4">
                  <div class="card-body">
                    <h4 class="card-title">Đánh giá</h4>
                                        <div class="stars">
                        <input class="star star-5" id="star-5" type="radio" name="star" 
                        <?php if($row['TongDanhGia'] == 5)
                        {
                          echo 'checked';
                        } 
                        ?>/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star"
                        <?php if($row['TongDanhGia'] == 4)
                        {
                          echo 'checked';
                        } 
                        ?>
                        />
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star"                        
                        <?php if($row['TongDanhGia'] == 3)
                        {
                          echo 'checked';
                        } 
                        ?>/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star"
                        <?php if($row['TongDanhGia'] == 2)
                        {
                          echo 'checked';
                        } 
                        ?>/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star"
                        <?php if($row['TongDanhGia'] == 1)
                        {
                          echo 'checked';
                        } 
                        ?>/>
                        <label class="star star-1" for="star-1"></label>
                    </div>
                    <div class="container">
                    </div>
        </div>
      </div>
    </aside>
    <aside class="sidebar">
                <div class="card mb-4">
                  <div class="card-body">
                  <div class="form-group ">
                  <h4 class="card-title">Mô tả</h4>
           
                   </div>
                    <p class="card-text"><?php echo $row['MoTa'] ?></p>
                  </div>
                </div><!-- /.card -->
              </aside>
    <aside class="sidebar">
                <div class="card mb-4">
                  <div class="card-header">
                    <h4 class="card-title">Tiện nghi khách sạn</h4>
                  </div>
                <div class="card-body">
                  <div class="form-group ">
                    <p class="card-text"><?php echo $row['diadiem'] ?>  <i style="color:#FF9900; margin-right:3%" class="fas fa-star"></i> Địa Điểm</p>
                    <p class="card-text"><?php echo $row['sachse'] ?>   <i style="color:#FF9900; margin-right:3%" class="fas fa-star"></i> Sự Sạch Sẻ</p>
                    <p class="card-text"><?php echo $row['dichvu'] ?>   <i style="color:#FF9900; margin-right:3%" class="fas fa-star"></i> Dịch Vụ</p>
                  </div>
                </div>
              </aside>


  </div>
</div>
</div>
    </main>


    <?php include "include/footer.php" ?>
        
    </body>
</html>