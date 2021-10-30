                
<?php

$sodongtrentrang = 9;
if(isset($_GET['trang']))
{
    $trang = $_GET['trang'];
}
else $trang = 0;

    if(isset($_GET['keyword']) && isset($_GET['province']) && isset($_GET['district']) && isset($_GET['rating']))
    {
        $rating = $_GET['rating'];
        $keyword = $_GET['keyword'];
        $province = $_GET['province'];
        $district = $_GET['district'];

        if ($keyword != NULL && $province == NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }
        if ($keyword != NULL && $province != NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND diadiem.ID = '$province'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }
        if ($keyword != NULL && $province != NULL && $district != NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND diadiem.ID = '$province' AND khachsan.IDVUNG = '$district'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }
        if ($keyword == NULL && $province != NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem  AND diadiem.ID = '$province'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }
        if ($keyword == NULL && $province != NULL && $district != NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem  AND diadiem.ID = '$province' AND khachsan.IDVUNG = '$district'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }

        if(($keyword != NULL && $province == NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND TongDanhGia = '$rating'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword != NULL && $province != NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND TongDanhGia = '$rating' AND diadiem.ID = '$province'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword != NULL && $province != NULL && $district != NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND khachsan.IDVUNG = '$district'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword == NULL && $province != NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TongDanhGia = '$rating' AND diadiem.ID = '$province'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword == NULL && $province != NULL && $district != NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND khachsan.IDVUNG = '$district'";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
    }
    if(empty($_GET['keyword']) && empty($_GET['province']))
    {
            $sql = "SELECT * FROM khachsan,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = khachsan.IDDanhMuc AND khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem";
            $result = mysqli_query($conn,$sql) or die("Loi");
    }
    $sodong = mysqli_num_rows($result);
    $sotrangdl = $sodong / $sodongtrentrang;
?>

            <div class="row">
                <?php  

                while($row = mysqli_fetch_array($result)) { ?>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-place mb-30">
                        <div class="place-img">
                            <img src="assets/img/service/<?php echo $row['HinhAnh']; ?>" alt="">
                        </div>
                        <div class="place-cap">
                            <div class="place-cap-top">
                                <span><i class="fas fa-star"></i><span><?php echo $row['TongDanhGia'] ?> sao</span> </span>
                                <h3><a href="#"><?php echo $row['TenKhachSan']; ?></a></h3>
                                <p class="dolor">Khách Sạn<span></span></p>
                            </div>
                            <div class="place-cap-bottom">
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i><?php echo $row['TenVung']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Favourite Places End -->

    <!-- Pagination-area Start -->
    <div class="pagination-area pb-100 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <?php
                                for ($i = 0; $i <= $sotrangdl; $i++){
                                        $t = $i + 1;
                                        echo "<li class='page-item active'><a class='page-link' href='hotel.php?trang=".$i."'>".$t."</a></li>";
                                    }
                                ?>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>