<div class="modal fade copyright my-auto"  id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width : 800px">
      <div class="modal-header card-header">
        <h5 class="font-weight-bold text-primary" id="exampleModalLabel">THÊM KHÁCH SẠN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="include/upload.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

                    <div class="form-group">
                        <label class="font-weight-bold" class="font-weight-bold">Tên khách sạn</label>
                        <input type="text" name="tenks" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" class="font-weight-bold">Mô tả</label>
                        <textarea style="resize : none" rows="2"  name="mota" class="form-control"></textarea> 
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" class="font-weight-bold">Địa Chỉ</label>
                        <textarea style="resize : none" rows="2"  name="diachi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" class="font-weight-bold">Hình ảnh</label>
                        <input type="file" name="files[]" multiple="multiple" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" class="font-weight-bold">Tổng đánh giá</label>
                        <input type="text" name="tongdanhgia" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" class="font-weight-bold">Giá cả</label>
                        <input type="text" name="giaca" class="form-control">
                    </div>
                    <div class="form-group ">
                        <label class="font-weight-bold" class="font-weight-bold">Tỉnh / Vùng</label>
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
                        <label class="font-weight-bold" class="font-weight-bold">Chọn địa chỉ quận / huyện</label>
                        <select name="district" class="form-control" id="district">
                            <option>--- Quận / Huyện ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" class="font-weight-bold">Tình Trạng Hoạt Động</label>
                        <select name="dangmocua" class="form-control">
                            <option value="0">Đóng cửa</option>
                            <option value="1">Mở cửa</option>
                        </select> 
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
            <input type="submit" name="btnadd" class="btn btn-primary" value="Thêm khách sạn">
        </div>
        </form>
    </div>
  </div>
</div>