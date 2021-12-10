<?php
	if (isset($_POST['btn_search'])) 
	{
        $key = $_POST['txtSearch'];
        if($key == NULL)
        {
        	echo '<script>
                        window.location.href="index.php"
                </script>';
        }
        else
            {
                echo '<script>
                        window.location.href="index.php?key='.$key.'"
                </script>';
            }
    }
?>