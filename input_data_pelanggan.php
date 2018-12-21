<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$nama_lengkap = $_POST['name'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
	$status_kawin = $_POST['sts_perkawinan'];
	$jenkel = $_POST['jenkel'];
	$alamat = $_POST['alamat'];
	$pekerjaan = $_POST['pekerjaan'];

	require_once('conneksi.php');

	$sql = "INSERT INTO tbl_pelanggan(status_perkawinan,nama_pelanggan,jenis_kelamin,no_telephone,email,alamat_pelanggan,pekerjaan,pemesanan_rumah) VALUES ('$status_kawin','$nama_lengkap','$jenkel','$telepon','$email','$alamat','$pekerjaan','Kosong')";

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