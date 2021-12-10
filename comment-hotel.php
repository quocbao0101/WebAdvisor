<?php include "database/data.php" ?>
<?php
	if(isset($_GET['khachsan']))
	{
		$idhotel = $_GET['khachsan'];
	}
	else 
	{
		header("location:hotel.php");
	}
	$sql = "SELECT * FROM khachsan,hinhanh where hinhanh.IDKhachSan = khachsan.IDKhachSan AND khachsan.IDKhachSan = $idhotel";
	$result = mysqli_query($conn,$sql);
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
	  					<h2><?php echo $row['TenKhachSan']  ?></h2>
	  					<p><?php echo $row['DiaChi']?></p>
	  				</div>
	  		</div>
	  		<div  class="form-group">
	  			<h4>Kinh nghiệm của chính bạn thực sự có ích với khách du lịch khác.</h4>
	  			<h4>Xin cảm ơn!</h4>
	  		</div>
			  </div>
	  		<form class="card-body" action="action/comment_process.php?khachsan=<?php echo $idhotel ?>" method="POST">
	  			<div class="form-group">
	  				<h4>Đánh giá tổng thể về khách sạn này</h4>
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
	  				<input tyep="text" class="form-control rounded-start" rows="2" cols="50" style="resize : none " name="title" placeholder="Tóm tắt về khách sạn của bạn hoặc nêu một chi tiết thú vị">
	  			</div>
	  			<div class="form-group">
	  				<h4>Đánh giá của bạn</h4>
	  				<textarea class="form-control rounded-start" rows="2" cols="50" style="resize : none " name="comment" placeholder="Hãy Viết Nhận Xét Của Bạn.."></textarea>
	  			</div>
	  			<div class="form-group">
	  				<h4>Loại chuyến đi đó là gì</h4>
	  				<select class="form-control rounded-start" name="loai">
	  					<option value="Doanh nghiệp">Doanh nghiệp</option>
	  					<option value="Gia đình">Gia đình</option>
	  					<option value="Cặp đôi">Cặp đôi</option>
	  					<option value="Bạn bè">Bạn bè</option>
	  					<option value="Một mình">Một mình</option>
	  				</select>
	  			</div>
	  			<div class="form-group">
	  				<h4>Bạn đã đi du lịch khi nào ?</h4>
	  				<select class="form-control rounded-start" name="when">
	  						<option>Chọn một</option>
	  					<?php for($i = 1 ; $i <=12 ; $i++)
	  					{ ?>
	  						<option value="Tháng <?php echo $i ?>">Tháng <?php echo $i ?></option>
	  					<?php }?>
	  				</select>
	  			</div>
	  			<div class="form-group">
	  				<h4>Xếp hạng khách sạn</h4>
	  				<div class="form-group row" style="margin-left:5%">
	  					<h5>Dịch vụ
	  							<input class="xh_dichvu xh_dichvu-5" id="xh_dichvu-5" type="radio" name="xh_dichvu" value="5" 
	                            />
	                            <label class="xh_dichvu xh_dichvu-5" for="xh_dichvu-5"></label>
	                            <input class="xh_dichvu xh_dichvu-4" id="xh_dichvu-4" type="radio" name="xh_dichvu" value="4" 
	                            />
	                            <label class="xh_dichvu xh_dichvu-4" for="xh_dichvu-4"></label>
	                            <input class="xh_dichvu xh_dichvu-3" id="xh_dichvu-3" type="radio" name="xh_dichvu" value="3"                        
	                            />
	                            <label class="xh_dichvu xh_dichvu-3" for="xh_dichvu-3"></label>
	                            <input class="xh_dichvu xh_dichvu-2" id="xh_dichvu-2" type="radio" name="xh_dichvu" value="2" 
	                            />
	                            <label class="xh_dichvu xh_dichvu-2" for="xh_dichvu-2"></label>
	                            <input class="xh_dichvu xh_dichvu-1" id="xh_dichvu-1" type="radio" name="xh_dichvu" value="1" 
	                            />
	                            <label class="xh_dichvu xh_dichvu-1" for="xh_dichvu-1"></label>
	  					</h5>
	  					<h5>Địa điểm
	  							<input class="xh_diadiem xh_diadiem-5" id="xh_diadiem-5" type="radio" name="xh_diadiem" value="5" 
	                            />
	                            <label class="xh_diadiem xh_diadiem-5" for="xh_diadiem-5"></label>
	                            <input class="xh_diadiem xh_diadiem-4" id="xh_diadiem-4" type="radio" name="xh_diadiem" value="4" 
	                            />
	                            <label class="xh_diadiem xh_diadiem-4" for="xh_diadiem-4"></label>
	                            <input class="xh_diadiem xh_diadiem-3" id="xh_diadiem-3" type="radio" name="xh_diadiem" value="3"                        
	                            />
	                            <label class="xh_diadiem xh_diadiem-3" for="xh_diadiem-3"></label>
	                            <input class="xh_diadiem xh_diadiem-2" id="xh_diadiem-2" type="radio" name="xh_diadiem" value="2" 
	                            />
	                            <label class="xh_diadiem xh_diadiem-2" for="xh_diadiem-2"></label>
	                            <input class="xh_diadiem xh_diadiem-1" id="xh_diadiem-1" type="radio" name="xh_diadiem" value="1" 
	                            />
	                            <label class="xh_diadiem xh_diadiem-1" for="xh_diadiem-1"></label>
	  					</h5>
	  					<h5>Sự sạch sẽ
	  							<input class="xh_sachse xh_sachse-5" id="xh_sachse-5" type="radio" name="xh_sachse" value="5" 
	                            />
	                            <label class="xh_sachse xh_sachse-5" for="xh_sachse-5"></label>
	                            <input class="xh_sachse xh_sachse-4" id="xh_sachse-4" type="radio" name="xh_sachse" value="4" 
	                            />
	                            <label class="xh_sachse xh_sachse-4" for="xh_sachse-4"></label>
	                            <input class="xh_sachse xh_sachse-3" id="xh_sachse-3" type="radio" name="xh_sachse" value="3"                        
	                            />
	                            <label class="xh_sachse xh_sachse-3" for="xh_sachse-3"></label>
	                            <input class="xh_sachse xh_sachse-2" id="xh_sachse-2" type="radio" name="xh_sachse" value="2" 
	                            />
	                            <label class="xh_sachse xh_sachse-2" for="xh_sachse-2"></label>
	                            <input class="xh_sachse xh_sachse-1" id="xh_sachse-1" type="radio" name="xh_sachse" value="1" 
	                            />
	                            <label class="xh_sachse xh_sachse-1" for="xh_sachse-1"></label>
	  					</h5>
	  				</div>
	  			</div>
	  			<div class="form-group">
	  				<h4>Mức giá của khách sạn này như thế nào ?</h4>
	  				<select class="form-control rounded-start" name="mucgia">
	  					<option value="Bình dân">Bình dân</option>
	  					<option value="Hạng trung">Hạng trung</option>
	  					<option value="Sang trọng">Sang trọng</option>
	  				</select>
	  			</div>

	  			<div class="form-group" style="margin-bottom:3%">
	            	<input type="submit" name="btn_nhanxet_ks" class="btn" value="Đánh giá" />
	           	</div>

	             </form>
	  </div>
  <div class="col-md-5 col-md-offset-2 card-header" style="margin-top: 3%;margin-left: 1%; margin-bottom: 3%;">
  	<h1>Đánh giá gần đây về khách sạn này</h1>
  	              <?php 
  	          $sql_comments = "SELECT * FROM danhgia_khachsan,users WHERE danhgia_khachsan.IDUser = users.ID AND IDKhachSan = $idhotel ORDER BY modified DESC LIMIT 2";
			  $ketqua_comments = mysqli_query($conn,$sql_comments) or die("Lỗi  ");
			  $count = mysqli_num_rows($ketqua_comments);
			  $sum = 0; 
  	          while ($row_comments = mysqli_fetch_array($ketqua_comments)) 
              { 
                $sum += $row_comments['ratingNumber'];

                ?>
            <div class="card-body">
			    <div class="" >
			        <div class="col-md-12" >
			            <div class="d-flex flex-column comment-section" style="box-shadow:1px 1px #AAA;">
			                <div class="bg-white p-2" style="padding:20px ;">
			                    <div class="d-flex flex-row user-info">
			                    	<img class="rounded-circle" src="<?php echo 'http://localhost:8080/Travel/assets/img/avatar/'.$row_comments['avatar'].''; ?>" width="45">
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