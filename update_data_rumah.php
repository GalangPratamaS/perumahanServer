<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['id'];
	$blok_rumah = $_POST['blok_rumah'];
	$tipe_rumah = $_POST['tipe_rumah'];
	$harga_rumah = $_POST['harga_rumah'];
	$status_rumah = $_POST['status_rumah'];

	require_once('conneksi.php');

	$sql = "UPDATE tbl_rumah SET blok_lokasi = '$blok_rumah', tipe_rumah = '$tipe_rumah', harga_rumah = '$harga_rumah', status_rumah = '$status_rumah' WHERE no_rumah = '$id'";

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