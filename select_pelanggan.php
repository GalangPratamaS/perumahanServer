<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['tabel'];

	require_once 'conneksi.php';

	$sql = "SELECT * FROM tbl_pelanggan";

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['read']= array();

	if($response->num_rows > 0){
		while($row = $response->fetch_assoc()){
			$h= array(); 
			$h['id'] = $row['no_pelanggan'];
			$h['name'] = $row['nama_pelanggan'];
			$h['jenkel'] = $row['jenis_kelamin'];	
			$h['alamat'] = $row['alamat_pelanggan'];
			$h['nohp'] = $row['no_telephone'];
			$h['email'] = $row['email'];
			$h['status'] = $row['status_perkawinan'];
			$h['pekerjaan'] = $row['pekerjaan'];
			$h['pemesanan_rumah'] = $row['pemesanan_rumah'];

			array_push($result["read"],$h);
		}
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