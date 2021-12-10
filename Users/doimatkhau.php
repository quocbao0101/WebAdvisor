<?php
 include "../database/data.php";
 $id = $_SESSION['id'];  

 $lenh= "SELECT * FROM users WHERE ID = '".$id."'";
 $kq = mysqli_query($conn,$lenh) or die('Khong chay dc');
 $dong = mysqli_fetch_array($kq);
?>
<?php include "preloader.php"; ?>
<?php include "header.php"; ?>
<body>
    <div class="container col-xl-4 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
      <form action="" method="POST" class="container justify-content-between text-center single-footer-caption mb-50">
          <h1 style="margin-bottom: 5%;">Đặt lại mật khẩu</h1> 
            <div class="form-group single-footer-caption mb-50">
                    <input type="password" placeholder="Mật khẩu cũ"  name="matkhaucu"  class="col-lg-8 btn-lg" required>
            </div>
            <div class="form-group single-footer-caption mb-50">
                    <input type="password" placeholder="Mật khẩu" name="matkhau"  class="col-lg-8 btn-lg" required>
            </div>
            <div class="form-group single-footer-caption mb-50">
                    <input type="password" placeholder="Nhập lại mật khẩu"  name="nlmatkhau"  class="col-lg-8 btn-lg" required>
            </div>        
            <input type="submit" name="btn_capnhat" class="btn btn-primary" value="Cập nhật">   
            <i><a href="../index.php" class="btn btn-secondary btn-lg active" > Thoát</a></i>   
      </form>
                <?php 
                if(isset($_POST['btn_capnhat']))
                {
                    $matkhaucu = $_POST['matkhaucu'];
                    $matkhau = $_POST['matkhau'];
                    $nlmatkhau = $_POST['nlmatkhau'];
                    $uppercase = preg_match('@[A-Z]@', $matkhau);
                    $lowercase = preg_match('@[a-z]@', $matkhau);
                    $number    = preg_match('@[0-9]@', $matkhau);
                    if (!$matkhaucu || !$matkhau || !$nlmatkhau)
                    {
                          echo '<div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Đổi mật khẩu thất bại!</strong> Vui lòng nhập đầy đủ thông tin!
                          </div>
                          ';                    
                    }                 
                    else if(!$uppercase || !$lowercase || !$number || strlen($matkhau) < 6) {
                          echo '<div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Đổi mật khẩu thất bại!</strong> Mật khẩu của bạn không hợp lệ (Bao gồm hơn 6 ký tự lẫn chữ hoa và thường)!
                          </div>
                          ';    
                            
                    }
                    else
                    {
                        if($dong['matkhau'] != $matkhaucu)
                        {
                          echo '<div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Đổi mật khẩu thất bại!</strong> Mật khẩu của bạn vừa không trùng với mật khẩu cũ
                          </div>
                          ';    
                        }
                        else{
                            if($matkhau != $nlmatkhau)
                            {
                                                          echo '<div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Đổi mật khẩu thất bại!</strong> Nhập khẩu bạn vừa nhập không khớp.
                          </div>
                          ';
                            }
                            else
                            {
                                $caulenh = "UPDATE users set matkhau = '".$matkhau."' WHERE id = ".$id."";
                                mysqli_query($conn,$caulenh);
                                                          echo '<div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Đổi mật khẩu thành công!</strong> Đổi mật khẩu thành công!
                          </div>
                          ';
                            }
                          }
                      }
                  }
              ?>  
  </div>
</body>
<?php include "footer.php"; ?>
