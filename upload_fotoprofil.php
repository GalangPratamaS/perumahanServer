<?php

$path = "profile_image";
	umask(022);
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['id'];
	$photo = $_POST['photo'];

	

	$path = $path."/$id.jpeg";
	$finalpath = "http://192.168.43.207/perumahanServer/".$path;

	require_once 'conneksi.php';

	$sql = "UPDATE tbl_karyawan SET photo='$finalpath' WHERE no_pegawai='$id'";
	$result = array();
	if(mysqli_query($conn, $sql)){
		if(file_put_contents($path, base64_decode($photo))){

			$result['success'] = "1";
			$result['message'] = "success";

			echo json_encode($result);
			mysqli_close($conn);
		}
	}
}

?>

