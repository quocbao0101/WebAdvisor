<?php include "database/data.php" ?>
<?php
	if(isset($_GET['diadiem']))
	{
		$idlocation = $_GET['diadiem'];
	}
	else 
	{
		header("location:location.php");
	}
	$sql = "SELECT * FROM diadiemdulich,hinhanh WHERE diadiemdulich.IDDiaDiemDuLich = hinhanh.IDDiaDiem AND diadiemdulich.IDDiaDiemDuLich=$idlocation ";
	$result = mysqli_query($conn,$sql) or die("Lỗi");
	$row = mysqli_fetch_array($result);
?>
<?php include "include/preloader.php" ?>
<?php include "include/header.php" ?>
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<div class="row">
	<div class="col-md-5 card-header" style="margin-left: 5%;margin-top: 3%;margin-bottom: 3%;">
	<div class="card-header" style="border-bottom:1px solid #AAA">

	  		<div class="form-row">
	  				<div class="form-group">
	  					<img height="150px" width="150px" src="assets/img/service/<?php echo $row['image'] ?>">
	  				</div>
	  				<div class="form-group" style="margin-left:2%;">
	  					<h2><?php echo $row['TenDiaDiemDL']  ?></h2>
	  					<p><?php echo $row['DiaChi']?></p>
	  				</div>
	  		</div>
	  		<div class="form-group">
	  			<h4>Kinh nghiệm của chính bạn thực sự có ích với khách du lịch khác.</h4>
	  			<h4>Xin cảm ơn!</h4>
	  		</div>
</div>
	  		<form action="action/comment_process.php?diadiem=<?php echo $idlocation ?>" method="POST">
	  			<div class="form-group">
	  				<h2>Xếp hạng trải nghiệm của bạn</h2>
	  				<div class="input-group">
	                        <div class="stars">

	                            <input class="star star-5" id="star-5" type="radio" name="stars" value="5" 
	                            />
	                            <label class="star star-5" for="star-5"></label>
	                            <input class="star star-4" id="star-4" type="radio" name="stars" value="4" 
	                            />
	                            <label class="star star-4" for="star-4"></label>
	                            <input class="star star-3" id="star-3" type="radio" name="stars" value="3"                        
	                            />
	                            <label class="star star-3" for="star-3"></label>
	                            <input class="star star-2" id="star-2" type="radio" name="stars" value="2" 
	                            />
	                            <label class="star star-2" for="star-2"></label>
	                            <input class="star star-1" id="star-1" type="radio" name="stars" value="1" 
	                            />
	                            <label class="star star-1" for="star-1"></label>

	                        </div>
	                </div>
	  			</div>
	  			<div class="form-group">
	  				<h4>Tiêu đề đánh giá của bạn</h4>
	  				<input tyep="text" class="form-control rounded-start" rows="2" cols="50" style="resize : none " name="title" placeholder="Tóm tắt về địa điểm du lịch của bạn hoặc nêu một chi tiết thú vị">
	  			</div>
	  			<div class="form-group">
	  				<h4>Để lại đánh giá của bạn</h4>
<textarea class="form-control rounded-start" rows="2" cols="50" style="resize : none " name="comment" placeholder="Hãy Viết Nhận Xét Của Bạn.."></textarea>
	  			</div>
	  			<div class="form-group">
	  				<h4>Bạn đi với ai</h4>
	  				<select class="form-control rounded-start" name="who">
	  					<option value="Doanh nghiệp">Doanh nghiệp</option>
	  					<option value="Gia đình">Gia đình</option>
	  					<option value="Cặp đôi">Cặp đôi</option>
	  					<option value="Bạn bè">Bạn bè</option>
	  					<option value="Một mình">Một mình</option>
	  				</select>
	  			</div>
	  			<div class="form-group">
	  				<h4>Bạn đã đi khi nào ?</h4>
	  				<select class="form-control rounded-start" name="khinao">
	  						<option>Chọn một</option>
	  					<?php for($i = 1 ; $i <=12 ; $i++)
	  					{ ?>
	  						<option value="Tháng <?php echo $i ?>">Tháng <?php echo $i ?></option>
	  					<?php }?>
	  				</select>
	  			</div>
                  <div class="OptionHeader">
	  				<span class="optionHeaderLabel confirmedBooker">Bạn có thể kể chút nữa về chuyến đi đó được không ? </span>
                      <span class="optionalNote">(tùy chọn)</span>
               
	  			</div>
	  			<div class="form-group">
	  				<h4>Để lại số điện thoại</h4>
<textarea class="form-control rounded-start" rows="2" cols="50" style="resize : none"  name="sdt" placeholder="Hãy Viết Nhận Xét Của Bạn.."></textarea>
	  			</div>
                  <div class="form-group">
	  				<h4>Trang Web của địa điểm du lịch</h4>
	  				<input tyep="text" class="form-control rounded-start" rows="2" cols="50" style="resize : none " name="website" >
	  			</div>
				  <div class="form-group">
	  				<h4>Thời lượng chuyến đi được giới thiệu</h4>
	  			
					  <input type="radio" id="it" name="time" value="Hơn 1 giờ">
						<label for="it">Hơn 1 giờ</label><br>
						<input type="radio" id="bt" name="time" value="1-2 giờ">
						<label for="bt">1-2 giờ</label><br>
						<input type="radio" id="nhieu" name="time" value="2-3 giờ">
						<label for="nhieu">2-3 giờ</label>
	  			</div>
	  			

	  			<div class="form-group" style="margin-bottom:3%">
	            	<input type="submit" name="btn_nhanxet" class="btn" value="Đánh giá" />
	           	</div>

	             </form>
	  </div>
	  <div class="col-md-5 col-md-offset-2 card-header" style="margin-top: 3%;margin-left: 1%; margin-bottom: 3%;">
  	<h1>Đánh giá gần đây về khách sạn này</h1>
  	              <?php
$sql_comments = "SELECT * FROM danhgia_diadiem,users WHERE danhgia_diadiem.IDUser = users.ID AND IDDiaDiemDuLich = $idlocation ORDER BY modified DESC LIMIT 2";
			  $ketqua_comments = mysqli_query($conn,$sql_comments) or die("Lỗi  ");
			  $count = mysqli_num_rows($ketqua_comments);
			  $sum = 0; 
  	          while ($row_comments = mysqli_fetch_array($ketqua_comments)) 
              { 
                $sum += $row_comments['ratingNumber'];

                ?>
            <div class="container">
			    <div class="">
			        <div class="col-md-12">
			            <div class="d-flex flex-column comment-section" style="box-shadow:1px 1px #AAA; margin-top:3%">
			                <div class="bg-white p-2" >
			                    <div class="d-flex flex-row user-info">
			                    	<img class="rounded-circle" src="<?php echo 'http://localhost:8888/Travel/assets/img/avatar/'.$row_comments['avatar'].''; ?>" width="45">
			                        <div class="d-flex flex-column justify-content-start ml-2">	
			                        	<span class="d-block font-weight-bold name"><?php echo $row_comments['ho']." ".$row_comments['ten']; ?></span>
			                        	<span class="date text-black-50">Đăng vào: <?php  echo date('d/m/Y',strtotime($row_comments['created'])); ?></span>
			                        </div>
			                    </div>
			                    <div class="mt-2">
			                    	<h4 style="font-style: italic;font-size: 18px;">
			                    		<?php echo $row_comments['ratingNumber'] ?> 
			                    		<span style="color:	#FF9900"  class="fa fa-star"></span>	"<?php echo $row_comments['title'] ?>"</h4>
			                        <p class="comment-text" style="font-size:14px"><?php echo $row_comments['comments'] ?></p>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
          <?php } ?>
  </div>
</div>


<?php include "include/footer.php" ?>