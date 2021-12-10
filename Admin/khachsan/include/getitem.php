<?php
        if(isset($_GET['key']) && isset($_GET['province']) && isset($_GET['district']) && isset($_GET['rating']))
    {
        $rating = $_GET['rating'];
        $key = $_GET['key'];
        $province = $_GET['province'];
        $district = $_GET['district'];

        if ($key != NULL && $province == NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenKhachSan LIKE '%$key%' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Lỗi");

        }
        if ($key != NULL && $province != NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenKhachSan LIKE '%$key%' AND diadiem.ID = '$province' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
        if ($key != NULL && $province != NULL && $district != NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenKhachSan LIKE '%$key%' AND diadiem.ID = '$province' AND khachsan.IDVUNG = '$district' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
        if ($key == NULL && $province != NULL && $district == NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND diadiem.ID = '$province' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
        if ($key == NULL && $province != NULL && $district != NULL && $rating == NULL) {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND diadiem.ID = '$province' AND khachsan.IDVUNG = '$district' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }

        if(($key != NULL && $province == NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenKhachSan LIKE '%$key%' AND TongDanhGia = '$rating' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
        if(($key != NULL && $province != NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenKhachSan LIKE '%$key%' AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
        if(($key != NULL && $province != NULL && $district != NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TenKhachSan LIKE '%$key%' AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND khachsan.IDVUNG = '$district' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
        if(($key == NULL && $province != NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
        if(($key == NULL && $province != NULL && $district != NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TongDanhGia = '$rating' AND diadiem.ID = '$province' AND khachsan.IDVUNG = '$district' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
        if(($key == NULL && $province == NULL && $district == NULL && $rating != NULL))
        {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND TongDanhGia = '$rating' AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");

        }
    }
    if(empty($_GET['key']) && empty($_GET['province']) && empty($_GET['rating']))
    {
            $sql = "SELECT * FROM khachsan,vung,diadiem WHERE khachsan.IDVUNG = vung.IDVUNG AND diadiem.ID = vung.IDDiaDiem AND pheduyet = '1' LIMIT {$vitribatdau},{$sodongtrentrang}";
            $ketquaphantrang = mysqli_query($conn,$sql) or die("Loi");
    }
?>