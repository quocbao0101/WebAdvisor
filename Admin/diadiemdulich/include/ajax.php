<option value = "">----Quận / Huyện----</option>;
<?php
	include "../../../database/data.php";
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	 	$sql = "SELECT * FROM VUNG WHERE IDDiaDiem = '".$id."'";
	 	$result = mysqli_query($conn,$sql);
	 	while($row = mysqli_fetch_array($result))
	 	{
	 		echo '<option value = '.$row['IDVung'].'>'.$row['TenVung'].'</option>';
	 	}
	} 

?>