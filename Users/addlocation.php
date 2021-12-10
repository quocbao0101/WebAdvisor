<?php include("../database/data.php") ?>
<!doctype html>
<html class="no-js" lang="zxx">
<body>
    <!-- Preloader Start -->
      
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <?php include "header.php" ?>
        <!-- Header End -->
    </header>
    <head>
  <meta charset="utf-8">
  <title>ĐĂNG KÝ</title>
  <link rel="shortcut icon" href="index.php" type="image/x-icon"/>

</head>
<body>
  <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js"></script>  
  <div class="container col-xl-8 justify-content-between text-center single-footer-caption mb-50 border border-5 rounded-3" style=" border-radius : 20px; margin-bottom: 20%; padding : 40px; box-shadow: 3px 3px 3px #AAA;">
    
     <form method="POST" action="">
     <img src="../assets/img/logo/Untitled.png">
     <h2>Hãy Chia Sẽ Địa Điểm Của Bạn</h2>
     <br>
     <form method="POST" action=""  enctype="multipart/form-data">
     <div class="form-group ">
     <h4 style="float : left">Tên địa điểm du lịch chính thức</h4>
       <input type="text" class="form-control" placeholder="Tên Địa Điểm Du Lịch " name="adress"  >
     </div>
     <div class="form-group ">
     <h4 style="float : left">Mô tả địa điểm du lịch</h4>
       <textarea style="resize: none;" rows="4" type="text" class="form-control" placeholder="Không HTMl, không địa chỉ web hay địa chỉ Email, không viết hoa toàn bộ" name="infor"  ></textarea>
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
     </div>
     <div class="form-group ">
     <h4 style="float : left">Tình Trạng Hoạt Động</h4>
       <select name="dangmocua" class="form-control">
         <option value="0">Đóng cửa</option>
         <option value="1">Mở cửa</option>
      </select> 
     </div>
      <div class="form-group ">
     <h4 style="float : left">Danh Mục</h4>
       <select name="IDDanhMuc" class="form-control" >
         <option value="">Chọn Danh Mục</option>
         <?php
      $query=mysqli_query($conn," select * from danhmuc ");
     while($row=mysqli_fetch_array($query)){ 
       ?>

        <option value="<?php echo $row['IDDanhMuc']; ?> "><?php echo $row ['TenDanhMuc']; ?> </option>
        <?php } ?>
      </select> 
     </div>
     <div class="form-group ">
     <h4 style="float : left">Hình Ảnh</h4>
      <input  style="float : left" type="file" name="files[]" multiple="multiple" />
     </div>
     <br>
     <br>
     <div class="form-group ">
     <input type="submit" name="btn_tieptuc" class="btn btn-lg" value="Tiếp tục">
      <i><a href="index.php" class="btn btn-secondary active" style="margin-left : 5px"> Thoát</a></i> 
    </div>     </div>
     </div>
    <p></p>
      <?php
            if(isset($_POST['btn_tieptuc']))
            {
              $TenDiaDiemDL = $_POST['adress'];
              $MoTa = $_POST['infor'];
              $DiaChi = $_POST['province'];
              
              $district= $_POST['district'];
              $dangmocua=$_POST['dangmocua'];
             
              $IDDanhMuc=$_POST['IDDanhMuc'];
              $query=mysqli_query ($conn,"select * from diadiem ");
              $caulenh_kiemtra = "select * from diadiemdulich where TenDiaDiemDL='".$TenDiaDiemDL."'"; // Câu lệnh
              $ketqua_kiemtra = mysqli_query($conn,$caulenh_kiemtra); // Thực thi câu lệnh 
              if (!$TenDiaDiemDL || !$MoTa || !$DiaChi || !$district || !$dangmocua || !$IDDanhMuc  )
              {
                    
                echo '<script language="javascript">';
                echo 'alert("Vui lòng nhập đủ thông tin")';
                echo '</script>';
                return;
                    
                      
              }   
              if(mysqli_num_rows($ketqua_kiemtra)>=1)
              {
                  echo "(*) Tên này đã tồn tại.";
              }
              else
              {                                     
                  $caulenh = "INSERT INTO diadiemdulich(TenDiaDiemDL,MoTa,DiaChi,TongDanhGia,IDVung,dangmocua,pheduyet,IDDanhMuc) values('".$TenDiaDiemDL."','".$MoTa."','".$DiaChi."',0,'".$district."','".$dangmocua."',0,'".$IDDanhMuc."')";
                  $ketqua =  mysqli_query($conn,$caulenh);  


                  // GET id diadiem 
                  $sql1 = "SELECT * FROM diadiemdulich WHERE TenDiaDiemDL = '".$TenDiaDiemDL."' AND IDVung = '".$district."'";
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
                                        $insertValuesSQL .= "('".$fileName."','".$row['IDDiaDiemDuLich']."'),"; 

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
                              $sql = "INSERT INTO hinhanh(image,IDDiaDiem) VALUES $insertValuesSQL";
                                $insert = mysqli_query($conn,$sql);

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
                  echo "(*) Thêm địa điểm du lịch thành công , Vui lòng đợi admin xác nhận !";
              }
           }
      ?></p>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="../js/index.js"></script>
    </form>
  </body>
</html>
<script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js"></script>
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

    <?php include "footer.php" ?>