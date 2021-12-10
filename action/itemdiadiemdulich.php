                
<?php
    $sodongtrentrang = 9;
    if(isset($_GET['trang']))
    {
        $trang = $_GET['trang'];
    }
    else $trang = 0;
    $sql_1 = "SELECT * from diadiemdulich";
    $ketqualenhdem = mysqli_query($conn,$sql_1);
    $sodong = mysqli_num_rows($ketqualenhdem);
    $sotrangdl = $sodong / $sodongtrentrang;
    $vitribatdau = $trang * $sodongtrentrang;
    if(isset($_GET['keyword']) && isset($_GET['province']) && isset($_GET['district']) && isset($_GET['rating']))
    {

        $rating = $_GET['rating'];
        $keyword = $_GET['keyword'];
        $province = $_GET['province'];
        $district = $_GET['district'];

        if ($keyword != NULL && $province == NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }
        if ($keyword != NULL && $province != NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND diadiem.ID = '$province' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }
        if ($keyword != NULL && $province != NULL && $district != NULL && $rating == NULL) {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND diadiem.ID = '$province' AND diadiemdulich.IDVUNG = '$district' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }
        if ($keyword == NULL && $province != NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem  AND diadiem.ID = '$province' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }
        if ($keyword == NULL && $province != NULL && $district != NULL && $rating == NULL) {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem  AND diadiem.ID = '$province' AND diadiemdulich.IDVUNG = '$district' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            }
        }

        if(($keyword != NULL && $province == NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND TongDanhGia = '$rating' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword != NULL && $province != NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword != NULL && $province != NULL && $district != NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenDiaDiemDL LIKE '%$keyword%' AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND diadiemdulich.IDVUNG = '$district' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword == NULL && $province != NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword == NULL && $province != NULL && $district != NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND diadiemdulich.IDVUNG = '$district' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
        if(($keyword == NULL && $province == NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TongDanhGia = '$rating' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Không tìm thấy địa chỉ mà bạn tìm kiếm';
            } 
        }
    }
    if(empty($_GET['keyword']) && empty($_GET['province']) && empty($_GET['rating']))
    {
            $sql = "SELECT * FROM diadiemdulich,vung,diadiem,danhmuc WHERE danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $result = mysqli_query($conn,$sql) or die("Loi");
    }



?>

                <div class="row">
                    <?php  

                    while($row = mysqli_fetch_array($result)) { 
                                    $sql1 = "SELECT * FROM hinhanh WHERE IDDiaDiem = '".$row['IDDiaDiemDuLich']."' LIMIT 1";
                                    $result1 = mysqli_query($conn,$sql1);
                                    while($row1 = mysqli_fetch_array($result1))
                                        {;

                                    ?>



                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-place mb-30 card-header">
                            <div class="place-img">
                                <img style="height: 350px;width: 100%" src="assets/img/service/<?php echo $row1['image']; ?>" alt="">
                            </div>
                            <div class="place-cap">
                                <div class="place-cap-top">
                                    <span><i class="fas fa-star"></i><span><?php                                 
                                if($row['TongDanhGia'] == 0) 
                                { 
                                    echo 'Chưa đánh giá';
                                }
                                else
                                {
                                    echo $row['TongDanhGia']." "."sao";
                                } ?></span> </span>
                                    <h3><a href="detail-location.php?diadiem=<?php echo $row['IDDiaDiemDuLich']; ?>"><?php echo $row['TenDiaDiemDL']; ?></a></h3>
                                    <p class="dolor" rows="2"><?php echo $row['TenDanhMuc'] ?><span></span></p>

                                </div>
                                <div class="place-cap-bottom">
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i><?php echo $row['TenDiaDiem']; ?></li><br>
                                        <li><?php if($row['dangmocua'] == true){ echo 'Đang mở cửa';} else echo 'Đóng cửa'; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                } ?>
                </div>
            </div>
        </div>
        <!-- Favourite Places End -->

        <!-- Pagination-area Start -->
              <div class="pagination" style="margin-left:50%;margin-bottom: 2%;">
                    <ul class="pagination">
                        <?php
                        for ($i = 0; $i <= $sotrangdl; $i++){
                                $t = $i + 1;
                                echo "<li class='page-item'><a  class='page-link' href='location.php?trang=".$i."'>".$t."</a></li>";
                        }    ?>
                    </ul>
              </div>