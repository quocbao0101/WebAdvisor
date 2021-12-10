<?php
	include("../database/data.php");
	if(isset($_SESSION['id']))
	{			
		if(isset($_GET['diadiem']))
		{
			$id = $_SESSION['id'];
			$iddiadiem = $_GET['diadiem'];
			if(isset($_POST['btn_nhanxet']))
			{	
				if(!empty($_POST['stars']))
				{
					$title = $_POST['title'];
					$rating = $_POST['stars'];
					$comment = $_POST['comment'];
					$who = $_POST['who'];
					$khinao = $_POST['khinao'];
					$sdt = $_POST['sdt'];
					$website = $_POST['website'];
					$time = $_POST['time'];
					$sql_cmt = "INSERT INTO danhgia_diadiem(title,ratingNumber,comments,who,khinao,sdt,website,time,created,modified,status,IDUser,IDDiaDiemDuLich) values('".$comment."',$rating,'".$comment."','".$who."','".$khinao."','".$sdt."','".$website."','".$time."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,1,$id,$iddiadiem)";
					mysqli_query($conn,$sql_cmt);
			        
			        echo "
			            <script> 
			                alert('Cảm ơn đánh giá của bạn');
			                window.location.href = '../detail-location.php?diadiem=".$iddiadiem."';
			            </script>";
			    }
			    else
			    {
			   		echo "
			            <script> 
			                alert('Bạn hãy viết đủ các mục nhận xét của mình kèm theo số sao đánh giá');
			                window.location.href = '../comment-location.php?diadiem=".$iddiadiem."';
			            </script>";
			        }
			} 
		}
		
		elseif (isset($_GET['khachsan'])) {
			$id = $_SESSION['id'];
			$idkhachsan = $_GET['khachsan'];
			if(isset($_POST['btn_nhanxet_ks']))
			{	
				if(!empty($_POST['stars']))
				{
					$title = $_POST['title'];					
					$rating = $_POST['stars'];
					$comment = $_POST['comment'];
					$loai = $_POST['loai'];
					$when = $_POST['when'];
					$xhdichvu = $_POST['xh_dichvu'];
					$xhdiadiem = $_POST['xh_diadiem'];
					$xhsachse = $_POST['xh_sachse'];
					$mucgia = $_POST['mucgia'];
					$sql_cmt = "INSERT INTO danhgia_khachsan(ratingNumber,title,comments,created,modified,status,xh_dichvu,xh_diadiem,xh_sachse,IDUser,IDKhachSan,type,khinao,mucgia) values($rating,'".$title."','".$comment."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,1,'".$xhdichvu."','".$xhdiadiem."','".$xhsachse."',$id,$idkhachsan,'".$loai."','".$when."','".$mucgia."')";
					mysqli_query($conn,$sql_cmt);


			        echo "
			            <script> 
			                alert('Cảm ơn đánh giá của bạn');
			                window.location.href = '../detail-hotel.php?khachsan=".$idkhachsan."';
			            </script>";
			            
			    }
			    else
			    {
			   		echo "
			            <script> 
			                alert('Bạn hãy viết đủ các mục nhận xét của mình kèm theo số sao đánh giá');
			                window.location.href = '../comment-hotel.php?khachsan=".$idkhachsan."';
			            </script>";
						return;
			        }
			} 
		}
	}

	else 
	{
			        echo "
	            <script> 
	                alert('Bạn phải đăng nhập mới có thể đánh giá');
	                window.location.href = '../Users/dangnhap.php';
	            </script>";
	        }
?>