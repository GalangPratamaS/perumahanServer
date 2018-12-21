<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['id'];
	$progres_beli = $_POST['progres_beli'];

	require_once('conneksi.php');

	$sql = "UPDATE tbl_pelanggan SET progres_pembelian = '$progres_beli' WHERE no_pelanggan = '$id'";

	if($conn->query($sql) === TRUE){
		$result['success'] = "1";
		$result['message'] = "success";

		echo json_encode($result);
		mysqli_close($conn);
	} else {
		$result['success'] = "0";
		$result['message'] = "error";

		echo json_encode($result);
		mysqli_close($conn);
	}
}
?>