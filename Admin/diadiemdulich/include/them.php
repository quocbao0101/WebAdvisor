<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width : 800px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm địa điểm du lịch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="include/upload.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

                    <div class="form-group">
                        <label class="font-weight-bold">Tên địa điểm du lịch</label>
                        <input type="text" name="tendiadiem" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Mô tả</label>
                        <textarea style="resize : none" rows="2" name="mota" class="form-control"></textarea> 
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Địa Chỉ</label>
                        <textarea style="resize : none" rows="2" name="diachi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Hình ảnh</label>
                        <input type="file" name="files[]" multiple="multiple" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tổng đánh giá</label>
                        <input type="text" name="tongdanhgia" class="form-control" value="">
                    </div>
                    <div class="form-group ">
                        <label class="font-weight-bold">Tỉnh / Vùng</label>
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
                        <label class="font-weight-bold">Chọn địa chỉ quận / huyện</label>
                        <select name="district" class="form-control" id="district">
                            <option>--- Quận / Huyện ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tình Trạng Hoạt Động</label>
                        <select name="dangmocua" class="form-control">
                            <option value="0">Đóng cửa</option>
                            <option value="1">Mở cửa</option>
                        </select> 
                    </div>
                    <div class="form-group ">   
                       <label class="font-weight-bold">Danh mục</label>
                       <select name="danhmuc" class="form-control" id="IDDanhMuc">
                            <option>--- Danh mục---</option>
                                <?php 
                                    $danhmuc = "SELECT * FROM danhmuc";
                                    $result_danhmuc = mysqli_query($conn,$danhmuc);
                                    while($row = mysqli_fetch_array($result_danhmuc))
                                    {
                                        ?>
                                        <option value="<?php echo $row['IDDanhMuc'];?>"><?php echo $row['TenDanhMuc'] ?>
                                                            
                            </option>
                                        <?php } 
                                    ?>
                        </select>
                    </div>  
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
            <input type="submit" name="btnadd" class="btn btn-primary" value="Thêm địa điểm du lịch">
        </div>
        </form>
    </div>
  </div>
</div>