<?php
include "../database/data.php";
  
  if(isset($_SESSION['id']))
  {
    $id = $_SESSION['id'];                    
   
    $caulenh = "select * from users where id = '".$id."' ";
    $ketqua = mysqli_query($conn,$caulenh);
    $row = mysqli_fetch_array($ketqua);
    $sinhnhat = $row['birthday'];
    $sinhnhat = date('d-m-Y', strtotime($sinhnhat));
  }
  else header('location:../index.php');
?>
<?php include "preloader.php"; ?>
<?php include "header.php"; ?>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">  
</head>
<body>
    <main class="container col-xl-4 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
          <div class="container">
              <div class="row">
                  <form action="" method="POST" class="col-md-12" enctype="multipart/form-data">
                      <div class="p-3 py-5 col-md-12">
                          <div class="d-flex justify-content-between align-items-center mb-3 col-md-12">
                              <div class="d-flex flex-row align-items-center back">
                              <a type="submit" class="align-items-center text-center" href="../index.php" name="btn_trangchu"><h1><img src="../assets/img/Untitled.png"; alt=""></h1></a>
                              </div>
                             
                          </div>
                          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div class="form-group">
                              <img src="../assets/img/avatar/<?php 
                                if($thumuc = $row['avatar'])
                                {
                                  echo $thumuc;
                                }
                                else echo $thumuc;?>" style="width:250px;display: block;height: 250px;border-radius: 50%;" id="profileDisplay" onclick="triggerClick()"> 
                              <input type="file" class="form-control" id="tenfile" name="tenfile" style="display: none;" onchange="displayImage(this)" >
                            </div>
                            <h4>
                            <?php
                                  echo $row['ho']." ".$row['ten']; 
                            ?>                    
                            </h4>
                          </div>
                          <div class="form-group">                                  
                                        <h5 for="user_phone_attributes_number" style="float:left">Tài Khoản</h5>
                                        <input class="form-control" disabled placeholder="Tài Khoản" type="text" name="user" value="<?php echo $row['taikhoan'] ?>">
                          </div>
                          <div class="form-group row">
                                 
                                  <div class="form-group col-md-6">
                                        <h5 for="user_name" style="float:left">Họ </h5>
                                        <input class="form-control" placeholder="Họ" type="text" name="ho" value="<?php echo $row['ho']?>" >
                                       
                                 </div>
                                 <div class="form-group col-md-6">
                                        <h5 for="user_name" style="float:left">Tên </h5>
                                        <input class="form-control" placeholder="Tên" type="text" name="ten" value="<?php echo $row['ten']?>" >
                                       
                                 </div>
                                 <div class="form-group col-md-6">
                                        <h5 for="user_email" style="float:left">Email</h5>
                                        <input class="form-control" disabled placeholder="Email" type="email"  name="email" value="<?php echo $row['email'] ?>" >
                                 </div>
                                 <div class="form-group col-md-6">
                                        <h5 for="user_birthday" style="float:left">Sinh nhật</h5>
                                        <input class="form-control" id="date" placeholder="Sinh nhật" type="text"  name="birthday" value="<?php echo $sinhnhat; ?>" >
                                 </div>
                          </div>
                      </div>
                      <div class="form-group">
                      <input type="submit"  class="btn btn-success" value="Cập nhật thông tin" name="btn">
                      <i><a href="../index.php" class="btn btn-secondary"> Thoát</a></i>
                      </div>
                  <?php
                  if(isset($_POST['btn']))
                          {
                              $ho = $_POST['ho'];
                              $ten = $_POST['ten'];
                              $date = $_POST['birthday'];
                              $date = str_replace('/', '-', $date);
                              $date = date('Y-m-d', strtotime($date));
                              //avatar
                              $thumucdich = "../assets/img/avatar";
                              $thumucdich = $thumucdich."/".$_FILES['tenfile']['name'];
                              $thumuc = $_FILES['tenfile']['name']; //
                              if(move_uploaded_file($_FILES['tenfile']['tmp_name'],$thumucdich))
                              {
                                // ----------------------------------------------------- //
                                $update = "Update users set avatar = '".$thumuc."' where ID = '".$id."'";
                                $kq= mysqli_query($conn,$update) or die("Loi");
                              }                              
                              // ----------------------------------------------------- //
                              $them = "Update users set ho='".$ho."' ,ten ='".$ten."',birthday = '".$date."' where ID = '".$id."'";
                              $ketqua_them = mysqli_query($conn,$them) or die("Loi");
                              echo '<script language="javascript">';
                              echo 'alert("Xác Nhận Thay Đổi Thông Tin")';
                              echo '</script>';
                              echo '<script>
                                window.location.href="thongtin.php"
                              </script>';
                            }
                ?>
                </form>
                </div>
          </div>
    </main>

</body>
    <script type="text/javascript">
      
    function triggerClick()
    {
      document.querySelector('#tenfile').click();
    }
    function displayImage(e)
    {
      if(e.files[0])
      {
        var reader = new FileReader();
        reader.onload = function(e)
        {
          document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/style.js"></script>  
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</html>
<?php include "footer.php"; ?>
<script type="text/javascript">
  $(function () {
  $("#date").datepicker();
});
</script>
<script type="text/javascript">
      window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>