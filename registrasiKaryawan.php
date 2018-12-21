<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$nama_lengkap = $_POST['name'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
	$password = $_POST['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);
	$jenkel = $_POST['jenkel'];
	$alamat = $_POST['alamat'];
	$pekerjaan = $_POST['jenker'];

	require_once('conneksi.php');

	$sql = "INSERT INTO tbl_karyawan(password_pegawai,nama_pegawai,jenis_kelamin,no_telephone,email,alamat_karyawan,status) VALUES ('$password','$nama_lengkap','$jenkel','$telepon','$email','$alamat','$pekerjaan')";

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