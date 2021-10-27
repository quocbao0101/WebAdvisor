<?php include "../../database/data.php" ?>
<?php
    if(isset($_POST["btn_delete"]))
    {
        $checkbox = $_POST['num'];
        for($i = 0;$i<count($checkbox);$i++)
        {
            $del_id = $checkbox[$i];
            $sql = "DELETE FROM users WHERE ID = $del_id";
            mysqli_query($conn,$sql);
        }
        echo "<script type='text/javascript' >
                    alert('Xóa tài khoản thành công');
                    window.location.href='index.php'
                  </script>
        ";
    } 
?>