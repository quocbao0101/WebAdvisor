<?php
 include "../database/data.php";
 $id = $_SESSION['id'];  

 $lenh= "select * from users where ID = '".$id."'";
 $kq = mysqli_query($conn,$lenh) or die('Khong chay dc');
 $dong = mysqli_fetch_array($kq);
?>
<?php include "preloader.php"; ?>
<?php include "header.php"; ?>
      <form action="" method="POST" class="container justify-content-between text-center single-footer-caption mb-50">
      <div class="header-container">
          <h4>Đặt lại mật khẩu</h4> 
      <div class="form-group ">
         <input type="password" name="matkhaucu" placeholder="Mật khẩu cũ">
      </div>
      <div class="form-group ">
         <input type="password" name="matkhau" placeholder="Mật khẩu mới">
      </div>
      <div class="form-group ">
         <input type="password" name="nlmatkhau" placeholder="Nhập lại mật khẩu mới">
      </div>
           <h2 style="color: red;">          
                <?php 
                  if(isset($_POST['btn_capnhat']))
                  {
                      $matkhaucu = $_POST['matkhaucu'];
                      $matkhau = $_POST['matkhau'];
                      $nlmatkhau = $_POST['nlmatkhau'];
                      if($dong['matkhau'] != $matkhaucu)
                      {
                          echo "(*) Mật khẩu cũ bạn không đúng.";
                      }
                      else{
                        if($matkhau != $nlmatkhau)
                        {
                            echo "(*) Nhập khẩu bạn vừa nhập không khớp.";
                        }
                        else
                        {
                            $caulenh = "UPDATE users set matkhau = ".$matkhau." WHERE id = $id";
                            mysqli_query($conn,$caulenh);
                            echo "Đổi mật khẩu thành công.";
                        }
                      }
                  }
              ?> 
          </h2>
          </div> 
          <input type="submit" name="btn_capnhat" class="btn btn-success" value="Cập nhật" style="margin-left: 800px">      
        </div> 
      </form> 

<?php include "footer.php"; ?>