<?php

    if(isset($_POST['btn']))
    {
        if(isset($_POST['district']))
        {
            $keyword = $_POST['keyword'];
            $province = $_POST['province'];
            $district = $_POST['district'];
            $rating = $_POST['rating'];
            if($keyword == NULL && $province == NULL && $district == NULL && $rating == NULL)
            {
                echo '<script>
                        window.location.href="location.php"
                </script>';
            }
            else
            {
                echo '<script>
                        window.location.href="location.php?keyword='.$keyword.'&province='.$province.'&district='.$district.'&rating='.$rating.'"
                </script>';
            }
        }

    }
    $sql = "SELECT * FROM diadiem";
    $result = mysqli_query($conn,$sql);


?>       
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <div class="input-group" id="adv-search">
                <form action="" method="POST" class="input-group">
                    <input type="text" class="btn-lg active col-md-10" name="keyword" placeholder="Tìm kiếm địa chỉ du lịch">
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <input type="submit" value="Tìm kiếm" name="btn" class="btn"> 
                        </div>
                    </div>
                    </div>
            </div>
            <div class="input-group" style="margin-left: 0%;">
                <div class="input-group-btn">
                        <div class="btn-group" role="group">
                                <select  name="province" id="province" class="btn-secondary btn-lg" >
                                    <option value="">----Tỉnh / Thành----</option>
                                    <?php 
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <option value="<?php echo $row['ID'];?>"><?php echo $row['TenDiaDiem'] ?></option>
                                        <?php } 
                                    ?>
                                </select>
                        </div>
                        <div class="btn-group" role="group">
                                <select class="btn-secondary btn-lg" name="district" id="district">
                                    <option value="">----Quận / Huyện----</option>
                                </select>
                        </div>
                        <div class="btn-group" role="group">
                                <select class="btn-secondary btn-lg" name="rating" id="rating">
                                    <option value="">----Mức độ đánh giá----</option>
                                    <option value="1">1 sao</option>
                                    <option value="2">2 sao</option>
                                    <option value="3">3 sao</option>
                                    <option value="4">4 sao</option>
                                    <option value="5">5 sao</option>
                                </select>
                        </div>
                    </form>
                </div>
            </div>
<script type="text/javascript">
    $(document).ready(function(){
    $("#province").on('change',function(){
        var provinceId = $(this).val();
        $.ajax({
            method:"POST",
            url: "action/ajax.php",
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