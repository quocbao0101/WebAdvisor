<link rel="stylesheet" type="text/css" href="assets/css/comment.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
  $sql_comments = "SELECT * FROM danhgia_diadiem,users WHERE danhgia_diadiem.IDUser = users.ID AND IDDiaDiemDuLich = $iddiadiem ORDER BY modified DESC";
  $ketqua_comments = mysqli_query($conn,$sql_comments) or die("Lỗi");
  $count = mysqli_num_rows($ketqua_comments);
  $sum = 0;

?>

<article class="card mb-4">

                <header class="card-header">

                      <h3 class="card-title">Đánh giá , nhận xét của người dùng</h3>

                </header>
                <form action="action/comment_process.php?diadiem=<?php echo $iddiadiem ?>" method="POST">
                  <div class="card-header input-group">
                      <textarea class="form-control rounded-start" rows="2" cols="50" style="resize : none " name="comment" placeholder="Hãy Viết Nhận Xét Của Bạn.."></textarea>

                      <input type="submit" name="btn_nhanxet" class="btn" value="Nhận xét" />
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
                  </form>

              <?php while ($row_comments = mysqli_fetch_array($ketqua_comments)) 
              { 
                $sum += $row_comments['ratingNumber'];
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
                                    <?php echo $row_comments['ratingNumber'] ?> <span style="color:	#FF9900" class="fa fa-star"></span>
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
                    $update = "UPDATE diadiemdulich SET TongDanhGia = $rating WHERE IDDiaDiemDuLich = $iddiadiem";
                    mysqli_query($conn,$update);

                  }
                  else
                  {

                  }
              ?>
                
</article>