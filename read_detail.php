<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['id'];

	require_once 'conneksi.php';

	$sql = "SELECT * FROM tbl_karyawan WHERE no_pegawai = '$id'";

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['read']= array();

	if(mysqli_num_rows($response)===1){
		if($row = mysqli_fetch_assoc($response)){
			$h['id'] = $row['no_pegawai'];
			$h['name'] = $row['nama_pegawai'];
			$h['email'] = $row['email'];
			$h['status'] = $row['status'];
			$h['alamat'] = $row['alamat_karyawan'];
			$h['nohp'] = $row['no_telephone'];
			$h['jenkel'] = $row['jenis_kelamin'];
			$h['image']   = $row['photo']; 
			
			array_push($result["read"],$h);

			$result['success'] = "1";
			echo json_encode($result);

			mysqli_close($conn);
		}
	}
	else {
		$result['success'] = "0";
		$result['message'] = "gagal";
		echo json_encode($result);

		mysqli_close($conn);
	}
}
?>