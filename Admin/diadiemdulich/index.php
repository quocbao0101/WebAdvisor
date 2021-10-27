<?php include "../../database/data.php" ?>
<?php
    
    $sodongtrentrang = 5;
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
    $lenhphantrang = "SELECT * from diadiemdulich,vung,danhmuc where danhmuc.IDDanhMuc = diadiemdulich.IDDanhMuc AND diadiemdulich.IDVUNG = vung.IDVUNG";
    $ketquaphantrang = mysqli_query($conn,$lenhphantrang);


 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý địa điểm</title>
</head>
<body>
    <div class="header">
        <h1 class="header__title">QUẢN LÝ ĐỊA ĐIỂM</h1>
        <div class="header__btn">
            <a href='themmoi.php' style="margin-right: 1%;"><i class="fas fa-plus"></i> Thêm mới </a>
            <a href="../index.php" style="margin-right: 1%"; ><i class="fas fa-sign-out-alt"></i> Thoát </a>
        </div>
    </div>
    <br>
    <div class="container">
        <form action="" method="POST">
            <input type="submit" name="delete" value="Xóa">
        <table>
            <th> ID </th>
            <th> Tên địa điểm </th>
            <th> Mô tả </th>
            <th> Địa chỉ </th>
            <th> Hình ảnh </th>
            <th> Đánh giá </th>
            <th> Khu vực </th>
            <th> Danh mục</th>
            <th> Đang mở cửa</th>
            <th> Sửa </th>
            <?php
             while ($row = mysqli_fetch_array($ketquaphantrang)){
                    $sql = "SELECT * FROM hinhanh WHERE IDDiaDiem = '".$row['IDDiaDiemDuLich']."'";
                    $result = mysqli_query($conn,$sql);
                         ?>
                <tr>
                    
                    <td><?php echo $row['IDDiaDiemDuLich'];?></td>
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
                        <a href="edit.php?ID=<?php echo $row['IDDiaDiemDuLich']; ?>"><i class="fas fa-edit">Edit</i></a>
                    </td>
                    <td >
                        <input type="checkbox" name="num[]" value="<?php echo $row['IDDiaDiemDuLich'];  ?>">
                    </td>
                    
                </tr>
            <?php 
        } ?>
        </table>
        </form>
    </div>
    <div class="pagination__container">
                <ul class="pagination">
                    <?php
                    for ($i = 0; $i <= $sotrangdl; $i++){
                            $t = $i + 1;
                            echo "<li class='page'><a href='index.php?trang=".$i."'>".$t."</a></li>";
                    }    ?>
                </ul>
    </div> 
</body>
</html>
<?php
    if(isset($_POST["delete"]))
    {
        $checkbox = $_POST['num'];
        for($i = 0;$i<count($checkbox);$i++)
        {
            $del_id = $checkbox[$i];
            $sql = "DELETE FROM diadiemdulich WHERE IDDiaDiemDuLich = $del_id";
            mysqli_query($conn,$sql);
        }
        header("location : index.php");
    } 
?>