<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$keyword = $_POST['keyword'];

	require_once 'conneksi.php';

	$sql = "SELECT * FROM tbl_rumah WHERE blok_lokasi LIKE '%$keyword%' OR status_rumah LIKE '%$keyword%' OR tipe_rumah LIKE '%$keyword%'";

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['read']= array();

	if($response->num_rows > 0){
		while($row = $response->fetch_assoc()){
			$datafield= array(); 
			$datafield["id"] = $row["no_rumah"];    
			$datafield["blok_rumah"] = $row["blok_lokasi"];    
			$datafield["tipe_rumah"] = $row["tipe_rumah"];    
			$datafield["harga_rumah"] = $row["harga_rumah"];    
			$datafield["status_rumah"] = $row["status_rumah"];

			array_push($result["read"], $datafield); 
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