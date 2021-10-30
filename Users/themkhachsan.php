<?php 
include "../database/data.php";
 ?>
 <?php include "preloader.php"; ?>
<?php include "header.php"; ?>

<head>
  <meta charset="utf-8">
  <title>ĐĂNG KÝ</title>
  <link rel="stylesheet"  href="css/style.css">
  <link rel="shortcut icon" href="index.php" type="image/x-icon"/>

</head>
  <body>
  <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js"></script>  
    <div class="login-form">
    <h1>Thêm Khách Sạn</h1>
     <form method="POST" action="themkhachsan.php">
     <h1>Làm thế nào để chúng tôi thấy địa điểm này?</h1>
     <div class="form-group ">
     <h4>Tên địa điểm chính thức</h4>
       <input type="text" class="form-control" placeholder="Tên Khách Sạn " name="adress"  >
     </div>
     <div class="form-group ">
     <h4>Mô tả cơ sở kinh doanh du lịch của quí vị</h4>
       <input type="text" class="form-control" placeholder="Không HTMl, không địa chỉ web hay địa chỉ Email, không viết hoa toàn bộ" name="infor"  >
     </div>
     <div class="form-group ">
     <h4>Địa chỉ</h4>
       <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="region"  >
     </div>
    
     <div class="form-group ">
     <h4>Hình Ảnh</h4>
     <input type="file" class="form-control" placeholder=" " name="image"  >
     </div>

     <div class="form-group ">
     <h4>Giá</h4>
       <input type="text" class="form-control" placeholder=" " name="price"  >
     </div>
     <div class="form-group ">
     <h4>Khách Sạn chọn Tỉnh/Vùng</h4>
     <select name="province" class="form-control" id="province">
         <option value="">Chọn Tinh Thành</option>
         <?php
     
      $query=mysqli_query($conn," select * from diadiem ");
     while($row=mysqli_fetch_array($query)){ 
       ?>
        <option value="<?php echo $row['ID']; ?> "><?php echo $row ['TenDiaDiem']; ?> </option>
       <?php } ?>
       </select>
     </div>
     <div class="btn-group" role="group">
                                <select class="btn-secondary btn-lg" name="district" id="district">
                                    <option value="">----Quận / Huyện----</option>
                            
                                </select>
                        </div>
     </div>
     <input type="submit" name="btn_tieptuc" class="log-btn" value="Tiếp tục">
      <p><a href="index.php" class="btn btn-secondary btn-lg active" style="margin-top: 20px"><i class="fas fa-sign-out-alt"></i> Thoát</a></p>
     <p style="color: red">
      <?php
            if(isset($_POST['btn_tieptuc']))
            {
              $TenKhachSan = $_POST['adress'];
              $MoTa = $_POST['infor'];
              $diachi = $_POST['region'];
              $hinhanh = $_POST['image'];
              $giaca = $_POST['price'];
              $province = $_POST['province'];
              $district = $_POST['district'];
              $conn = mysqli_connect("localhost","root","","tripadvisor") or die("Không thể kết nối tới CSDL");
                   // kết nối tới máy chủ SQL của Xampp
              $caulenh_kiemtra = "select * from khachsan where TenKhachSan='".$TenKhachSan."'"; // Câu lệnh
              $ketqua_kiemtra = mysqli_query($conn,$caulenh_kiemtra); // Thực thi câu lệnh 
              if($TenKhachSan == $TenKhachSan)
              {
                  if(mysqli_num_rows($ketqua_kiemtra)>=1)
                  {
                      echo "(*) Tên này đã tồn tại.";
                  }
                  else
                  {                                     
                    $caulenh = "INSERT INTO khachsan(TenKhachSan,MoTa,diachi,hinhanh,giaca,idvung) values('".$TenKhachSan."','".$MoTa."','".$diachi."','".$hinhanh."','".$giaca."','".$district."')";
                    $ketqua =  mysqli_query($conn,$caulenh);  
                    echo "(*) Thêm khách sạn thành công";
                  }
              }
              else echo "(*) Vui lòng kiểm tra lại tài khoản hoặc mật khẩu.";
           }
      ?></p>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </form>
  </body>
</html>
<?php include "footer.php"; ?>
<script type="text/javascript">
    $(document).ready(function(){
    $("#province").on('change',function(){
        var provinceId = $(this).val();
        $.ajax({
            method:"POST",
            url: "ajax.php",
            data:{id:provinceId},
            dataType:"html",
            success:function(data)
            {
                $("#district").html(data);
            }
        });
    });
});
</script>