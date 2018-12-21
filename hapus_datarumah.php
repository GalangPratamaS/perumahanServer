<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['id'];

	require_once 'conneksi.php';

	$sql = "DELETE FROM tbl_rumah WHERE no_rumah = '$id'";

	$result = array();

	if($conn->query($sql) === TRUE){
			$result['success'] = "1";
			echo json_encode($result);
			mysqli_close($conn);
	}
	else {
		$result['success'] = "0";
		$result['message'] = "gagal";
		echo json_encode($result);

		mysqli_close($conn);
	}
}
?>