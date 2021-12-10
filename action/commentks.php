<link rel="stylesheet" type="text/css" href="assets/css/comment.css">
<?php
  $sql_comments = "SELECT * FROM danhgia_khachsan,users WHERE danhgia_khachsan.IDUser = users.ID AND IDKhachSan = $idkhachsan ORDER BY modified DESC";
  $ketqua_comments = mysqli_query($conn,$sql_comments) or die("Lỗi  ");
  $count = mysqli_num_rows($ketqua_comments);
  $sum = 0; 
  $xhdichvu = 0;
  $xhsachse = 0;
  $xhdiadiem = 0;
?>


<article class="card mb-4">

                <header class="card-header">
                      <h3 class="card-title" style="float:left">Đánh giá , nhận xét của người dùng</h3>
                      <a style="float:right;" href="comment-hotel.php?khachsan=<?php echo $idkhachsan ?>" class="btn">Viết đánh giá</a>
                </header>


              <?php while ($row_comments = mysqli_fetch_array($ketqua_comments)) 
              { 
                $sum += $row_comments['ratingNumber'];
                $xhdichvu += $row_comments['xh_dichvu'];
                $xhsachse += $row_comments['xh_sachse'];
                $xhdiadiem += $row_comments['xh_diadiem'];
                ?>

              <section style="background-color: #ffff;">
                <div class="container my-2 py-2 text-dark">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-11">
                      <div class="d-flex flex-start mb-4">
                        <img style="margin-right:1% ; margin-top:1.5%"
                          class="rounded-circle shadow-1-strong me-3"
                          src="<?php echo 'http://localhost:8080/Travel/assets/img/avatar/'.$row_comments['avatar'].''; ?>"
                          alt="avatar"
                          width="65"
                          height="65"
                        />
                        <div class="card w-100">
                          <div class="card-header p-4">
                            <div class="" >
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                              <h3><?php echo $row_comments['ho']." ".$row_comments['ten']; ?></h3>
                              </div>
                              <h5 href="#!"
                                  >
                                  
                                  <div class="stars">
                                    <?php echo $row_comments['ratingNumber'] ?> <span style="color:	#FF9900"  class="fa fa-star"></span>
                                  </div>
                              </h5>
                              </div>
                              <p class="small"><?php echo date('d-m-Y',strtotime($row_comments['created'])); ?></p>
                              <h5>
                                <?php echo $row_comments['comments'] ?>
                              </h5>

                              <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                </div>
                                <h5 href="#!"
                                  ><i class="fas fa-reply me-1"></i></h5
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <?php }
                  if($count >0)
                  {
                    $rating = $sum / $count; 
                    $sum_xhdichvu = $xhdichvu / $count;
                    $sum_xhsachse = $xhsachse/ $count;
                    $sum_xhdiadiem = $xhdiadiem / $count;
                    $update = "UPDATE khachsan SET TongDanhGia = $rating , sachse = $sum_xhsachse , diadiem = $sum_xhdiadiem , dichvu = $sum_xhdichvu WHERE IDKhachSan = $idkhachsan";
                    mysqli_query($conn,$update) or die("Lỗi");

                  }
                  else
                  {

                  }
              ?>
                
</article>