<?php
	include "../../../database/data.php";
	if(isset($_POST['btnadd']))
	{
		$name = $_POST['tendiadiem'];
		$mota = $_POST['mota'];
		$diachi = $_POST['diachi'];
		$tongdanhgia = $_POST['tongdanhgia'];
		$vung = $_POST['district'];
		$danhmuc = $_POST['danhmuc'];
		$sql = "INSERT INTO diadiemdulich(TenDiaDiemDL,MoTa,DiaChi,TongDanhGia,IDVung,dangmocua,pheduyet,IDDanhMuc) VALUES('".$name."','".$mota."','".$diachi."','".$tongdanhgia."','".$vung."',1,1,'".$danhmuc."')";
		$result = mysqli_query($conn,$sql);

		// GET id diadiem 
		$sql1 = "SELECT * FROM diadiemdulich WHERE TenDiaDiemDL = '".$name."' AND IDVung = '".$vung."'";
		$result1 = mysqli_query($conn,$sql1);


		while($row = mysqli_fetch_array($result1))
		{
			    $targetDir = "../../../assets/img/service/"; 
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
                        echo "<script>
                                    alert('Thêm thành công.');
                                    window.location.href='../index.php'
                                </script>"; 
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
?>