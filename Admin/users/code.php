<?php
    include "../../database/data.php";

    if(isset($_POST['btn_them']))
    {
        $taikhoan = $_POST['txtTK'];
        $matkhau = $_POST['txtMK'];
        $email = $_POST['txtEmail'];
        $ho = $_POST['txtHo'];
        $ten = $_POST['txtTen'];
        $idphanquyen = $_POST['txtPhanQuyen'];
        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,6);                              
        $caulenh = "select * from users where taikhoan = '".$taikhoan."'";
        $ketqua = mysqli_query($conn,$caulenh);
        if(mysqli_num_rows($ketqua)>=1)
        {
            echo "<script type='text/javascript' >
                    alert('Tài khoản đã có người sử dụng!');
                    window.location.href='index.php';
                  </script>
            ";

        }
        else
        {
            $themmoi = "INSERT INTO users(taikhoan,matkhau,email,ho,ten,idphanquyen,lancuoidangnhap,code) values('".$taikhoan."','".$matkhau."','".$email."','".$ho."','".$ten."','".$idphanquyen."',CURRENT_TIMESTAMP,'".$code."')";
            $kq_themmoi = mysqli_query($conn,$themmoi);
            echo "<script type='text/javascript' >
                    alert('Thêm tài khoản thành công!');
                    window.location.href='index.php';
            </script>";
        }
    }
?>
