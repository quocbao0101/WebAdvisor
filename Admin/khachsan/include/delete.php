<?php include "../../../database/data.php" ?>
  <?php
    if(isset($_POST["delete"]))
    {
        $checkbox = $_POST['num'];
        for($i = 0;$i<count($checkbox);$i++)
        {
            $del_id = $checkbox[$i];
            $sql = "DELETE FROM khachsan WHERE IDKhachSan = $del_id";
            mysqli_query($conn,$sql);
        }
        echo "
            <script> 
                alert('Xóa khách sạn thành công');
                window.location.href = '../index.php';
            </script>";
    } 
    else if ($_POST['update'] )  
    {
        $checkbox = $_POST['num'];
        for($i = 0;$i<count($checkbox);$i++)
        {
            $del_id = $checkbox[$i];
            $sql = "UPDATE khachsan set pheduyet = '1' WHERE IDKhachSan = $del_id";
            mysqli_query($conn,$sql);
        }
        $dem = count($checkbox);
        echo "
            <script> 
                alert('Bạn đã phê duyệt ".$dem." khách sạn');
                window.location.href = '../chuakiemduyet.php';
            </script>";   
         
    } 
       
?>