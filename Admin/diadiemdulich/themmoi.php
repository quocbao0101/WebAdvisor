<?php
	include "../../database/data.php";
	$sql = "SELECT * FROM diadiem";
    $result = mysqli_query($conn,$sql); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<script type="text/javascript" src="../../assets/js/jquery-3.6.0.min.js"></script>  
	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<label>Tên địa điểm du lịch</label>
		<input type="text" name="tendiadiem">
		<br>
		<br>
		<label>Mô tả</label>
		<textarea name="mota"></textarea>
		<br>
		<br>
		<label>Địa Chỉ</label>
		<textarea name="diachi"></textarea>
		<br>
		<br>
		<label>Hình ảnh</label>
		<input type="file" name="files[]" multiple="multiple" />
		<br>
		<br>
		<label>Tổng đánh giá</label>
		<input type="text" name="tongdanhgia">
		<br>
		<br>
		<label>Danh mục</label>
		<select name="danhmuc">
			<option>--- Danh mục---</option>
			                        <?php 
			                        	$danhmuc = "SELECT * FROM danhmuc";
			                        	$result_danhmuc = mysqli_query($conn,$danhmuc);
                                        while($row = mysqli_fetch_array($result_danhmuc))
                                        {
                                            ?>
                                            <option value="<?php echo $row['IDDanhMuc'];?>"><?php echo $row['TenDanhMuc'] ?></option>
                                        <?php } 
                                    ?>
		</select>
		<br>
		<br>
		<label>Tỉnh / Thành</label>
		<select name="province" id="province">
			<option>--- Tỉnh / Thành ---</option>
                                    <?php 
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <option value="<?php echo $row['ID'];?>"><?php echo $row['TenDiaDiem'] ?></option>
                                        <?php } 
                                    ?>
		</select>
		<br>
		<br>
		<label>Quận / Huyện </label>
		<select name="district" id="district">
			<option>--- Quận / Huyện ---</option>
		</select>
		<input type="submit" name="btnadd" value="Thêm">
	</form>
</body>
</html>

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