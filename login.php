<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$email = $_POST['email'];
	$password = $_POST['password'];

	require_once'conneksi.php';

	$sql = "SELECT * FROM tbl_karyawan where email = '$email'";

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['login'] = array();

	if(mysqli_num_rows($response) === 1){

		$row = mysqli_fetch_assoc($response);

		if(password_verify($password,$row['password_pegawai'])){
			$index['id'] = $row['no_pegawai'];
			$index['name'] = $row['nama_pegawai'];
			$index['email'] = $row['email'];
			$index['status'] = $row['status'];
		/*	$index['password'] = $row['password_pegawai'];
			$index['telepon'] = $row['no_telephone'];
			$index['alamat'] = $row['alamat_karyawan'];
			$index['status'] = $row['status'];
			*/

			array_push($result['login'],$index);

			$result['success'] = "1";
			$result['message'] = "success";
			echo json_encode($result);

			mysqli_close($conn);
		} else {
				$result['success'] = "2";
				$result['message'] = "password salah!";
				echo json_encode($result);
				mysqli_close($conn);
		}
	} else {
		$result['success'] = "0";
				$result['message'] = "email tidak ditemukan";
				echo json_encode($result);
				mysqli_close($conn);
	}
}
?>