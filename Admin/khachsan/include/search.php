<?php
    if(isset($_POST['btn_search']))
    {
            $key = $_POST['txtSearch'];
            $province = $_POST['provinces'];
            $district = $_POST['districts'];
            $rating = $_POST['ratings'];
            if($key == NULL && $province == NULL && $district == NULL && $rating == NULL)
            {
                echo '<script>
                        window.location.href="../index.php"
                </script>';
            }
            else
            {
                echo '<script>
                        window.location.href="../index.php?key='.$key.'&province='.$province.'&district='.$district.'&rating='.$rating.'"
                </script>';
            }
    }
?>