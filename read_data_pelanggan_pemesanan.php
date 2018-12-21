<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['tabel'];

	require_once 'conneksi.php';

	$sql = "SELECT * FROM tbl_pelanggan WHERE pemesanan_rumah ='kosong'";

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['read']= array();

	if($response->num_rows > 0){
		while($row = $response->fetch_assoc()){
			$h= array(); 
			$h['id'] = $row['no_pelanggan'];
			$h['name'] = $row['nama_pelanggan'];
			

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