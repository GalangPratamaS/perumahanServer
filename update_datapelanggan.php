<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['id'];
	$nama_lengkap = $_POST['name'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
	$status_kawin = $_POST['sts_perkawinan'];
	$jenkel = $_POST['jenkel'];
	$alamat = $_POST['alamat'];
	$pekerjaan = $_POST['pekerjaan'];
	$pemesanan_rumah = $_POST['pemesanan_rumah'];

	require_once('conneksi.php');

	$sql = "UPDATE tbl_pelanggan SET status_perkawinan = '$status_kawin', nama_pelanggan = '$nama_lengkap', jenis_kelamin = '$jenkel', no_telephone = '$telepon', email = '$email', alamat_pelanggan = '$alamat', pekerjaan = '$pekerjaan', pemesanan_rumah = '$pemesanan_rumah' WHERE no_pelanggan = '$id'";

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