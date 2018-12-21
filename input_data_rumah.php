<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$blok_rumah = $_POST['block_rumah'];
	$tipe_rumah = $_POST['tipe_rumah'];
	$harga_rumah = $_POST['harga_rumah'];
	$status_rumah = $_POST['status_rumah'];

	require_once('conneksi.php');

	$sql = "INSERT INTO tbl_rumah(blok_lokasi,tipe_rumah,harga_rumah,status_rumah) VALUES ('$blok_rumah','$tipe_rumah','$harga_rumah','$status_rumah')";

	if(mysqli_query($conn, $sql)){
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