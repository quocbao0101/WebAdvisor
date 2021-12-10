<?php include "../../../database/data.php" ?>
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
        echo "
            <script> 
                alert('Xóa địa điểm du lịch thành công');
                window.location.href = '../index.php';
            </script>";
    } 
    
        
     else if ($_POST['update'] )  
     {
        $checkbox = $_POST['num'];
        for($i = 0;$i<count($checkbox);$i++)
        {
            $del_id = $checkbox[$i];
            $sql = "UPDATE diadiemdulich set pheduyet = '1' WHERE IDDiaDiemDuLich = $del_id";
            mysqli_query($conn,$sql);
        }
        $dem = count($checkbox);
        echo "
            <script> 
                alert('Bạn đã phê duyệt ".$dem." địa điểm du lịch');
                window.location.href = '../chuakiemduyet.php';
            </script>";   
         
     } 
       
    
      
    
?>