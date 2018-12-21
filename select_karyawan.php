<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['id'];

	require_once 'conneksi.php';

	$sql = "SELECT * FROM tbl_karyawan";

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['read']= array();

	if($response->num_rows > 0){
		while($row = $response->fetch_assoc()){
			$h= array(); 
			$h['id'] = $row['no_pegawai'];
			$h['name'] = $row['nama_pegawai'];
			$h['email'] = $row['email'];
			$h['status'] = $row['status'];
			$h['alamat'] = $row['alamat_karyawan'];
			$h['nohp'] = $row['no_telephone'];
			$h['jenkel'] = $row['jenis_kelamin'];			

			array_push($result["read"],$h);
		}
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