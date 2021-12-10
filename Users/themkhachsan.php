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
  <div class="container col-xl-8 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
    
     <form method="POST" action="themkhachsan.php">
     <img src="../assets/img/logo/Untitled.png">
     <h2>Cùng Chia Sẽ Những Khách Sạn Tin Cậy</h2>
     <br>
     <div class="form-group ">
     <h4 style="float : left">Tên địa điểm chính thức</h4>
       <input type="text" class="form-control" placeholder="Tên Khách Sạn " name="adress"  >
     </div>
     <div class="form-group ">
     <h4 style="float : left">Mô tả khách sạn của bạn</h4>
       <textarea type="text" style="resize: none;" rows="4" class="form-control" placeholder="Không HTMl, không địa chỉ web hay địa chỉ Email, không viết hoa toàn bộ" name="infor"  > </textarea>
     </div>
     <div class="form-group ">
     <h4 style="float : left">Địa chỉ</h4>
       <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="region"  >
     </div>
    
     <div class="form-group ">
     <h4 style="float : left">Hình ảnh</h4>
     <input style="float : left"  type="file" name="files[]" multiple="multiple">
     </div>
     <br>
     <br>
     <div class="form-group ">
     <h4 style="float : left">Giá</h4>
       <input type="text" class="form-control" placeholder=" " name="price"  >
     </div>
     <div class="form-group ">
     <h4 style="float : left">Địa chỉ du lịch chọn Tỉnh / Vùng</h4>
       <select name="province" class="form-control" id="province">
         <option value="">Chọn tỉnh thành</option>
         <?php
      $query=mysqli_query($conn," select * from diadiem ");
     while($row=mysqli_fetch_array($query)){ 
       ?>
        <option value="<?php echo $row['ID']; ?> "><?php echo $row ['TenDiaDiem']; ?> </option>
        <?php } ?>
      </select> 
     </div>
     <div class="form-group">
      <h4 style="float : left">Chọn địa chỉ quận / huyện</h4>
       <select class="form-control" name="district" id="district">
         <option value="">----Quận / Huyện----</option>
      </select> 

     
     <h4 style="float : left">Trạng Thái Hoạt Động</h4>
		<select name="dangmocua" class="form-control">
         <option value="0">Đóng cửa</option>
         <option value="1">Mở cửa</option>
      	</select> 
        <br>
        <br>
        <div class="form-group ">
     <input type="submit" name="btn_tieptuc" class="btn btn-lg" value="Tiếp tục">
      <i><a href="index.php" class="btn btn-secondary active" style="margin-left : 5px"> Thoát</a></i> 
    </div>
     <p style="color: red">
     </div>
      <?php
            if(isset($_POST['btn_tieptuc']))
            {
              $TenKhachSan = $_POST['adress'];
              $MoTa = $_POST['infor'];
              $diachi = $_POST['region'];
              //$hinhanh = $_POST['image'];
              $giaca = $_POST['price'];
              $province = $_POST['province'];
              $district = $_POST['district'];
              $open = $_POST['dangmocua'];
                   // kết nối tới máy chủ SQL của Xampp
              $caulenh_kiemtra = "select * from khachsan where TenKhachSan='".$TenKhachSan."'"; // Câu lệnh
              $ketqua_kiemtra = mysqli_query($conn,$caulenh_kiemtra); // Thực thi câu lệnh 

                  if(mysqli_num_rows($ketqua_kiemtra)>=1)
                  {
                      echo "(*) Tên này đã tồn tại.";
                  }
                  else
                  {                                     
                    $sql = "INSERT INTO khachsan(TenKhachSan,MoTa,DiaChi,TongDanhGia,GiaCa,IDVung,dangmocua,pheduyet) VALUES('".$TenKhachSan."','".$MoTa."','".$diachi."',0,'".$giaca."','".$district."','".$open."',0)";
                    $ketqua =  mysqli_query($conn,$sql);  
					          $sql1 = "SELECT * FROM khachsan WHERE TenKhachSan = '".$TenKhachSan."' AND IDVung = '".$district."'";
		                $result1 = mysqli_query($conn,$sql1);


		while($row = mysqli_fetch_array($result1))
		{
			    $targetDir = "../assets/img/service/"; 
			    $allowTypes = array('jpg','png','jpeg','gif'); 
			     
			    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
			    $fileNames = array_filter($_FILES['files']['name']); 
			    if(!empty($fileNames)){ 
			        foreach($_FILES['files']['name'] as $key=>$val){ 
			            // File upload path 
			            $fileName = basename($_FILES['files']['name'][$key]); 
			            $targetFilePath = $targetDir . $fileName; 
			             
			            // Check whether file type is valid 
			            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
			            if(in_array($fileType, $allowTypes)){ 
			                // Upload file to server 
			                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
			                    // Image db insert sql 
			                    $insertValuesSQL .= "('".$fileName."','".$row['IDKhachSan']."'),"; 

			                }else{ 
			                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
			                } 
			            }else{ 
			                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
			            } 
			        } 
			         
			        // Error message 
			        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
			        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
			        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
			         
			        if(!empty($insertValuesSQL)){ 
			            $insertValuesSQL = trim($insertValuesSQL, ','); 
			            // Insert image file name into database 
			         	$sql = "INSERT INTO hinhanh(image,IDKhachSan) VALUES $insertValuesSQL";
			            $insert = mysqli_query($conn,$sql);
			            echo $insertValuesSQL;	

			            if($insert){ 
			                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
			            }else{ 
			                $statusMsg = "Sorry, there was an error uploading your file."; 
			            } 
			        }else{ 
			            $statusMsg = "Upload failed! ".$errorMsg; 
			        } 
			    }else{ 
			        $statusMsg = 'Please select a file to upload.'; 
			    } 
			} 	
                  }
              }
              else echo "(*) Vui lòng kiểm tra lại tài khoản hoặc mật khẩu.";
           
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