<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['no_pelanggan'];
	$status_beli = $_POST['status_beli'];

	$sql = "SELECT * FROM `tbl_pelanggan` INNER JOIN tbl_transaksi_rumah WHERE tbl_pelanggan.no_pelanggan = tbl_transaksi_rumah.no_pelanggan AND tbl_transaksi_rumah.status ='$status_beli' AND tbl_pelanggan.no_pelanggan = '$id'";

	require_once 'conneksi.php';

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['read']= array();

	if($response->num_rows > 0){
		while($row = $response->fetch_assoc()){
			$h= array(); 
			$h['id'] = $row['no_pelanggan'];
			$h['name'] = $row['nama_pelanggan'];
			$h['pemesanan_rumah'] = $row['pemesanan_rumah'];
			$h['progres_pembelian'] = $row['progres_pembelian'];
			$h['no_transaksi'] = $row['no_transaksi'];
			$h['pekerjaan'] = $row['pekerjaan'];
			$h['no_telephone'] = $row['no_telephone'];
			$h['status_rumah'] = $row['status'];
			$h['uang'] = $row['cash'];
			$h['tanggal'] = $row['tanggal'];
			$h['scanKTP'] = $row['scanKTP'];
			$h['scanKK'] = $row['scanKK'];
			$h['scanNPWP'] = $row['scanNPWP'];
			$h['scanDOMISILI'] = $row['scanDOMISILI'];
			$h['scanREKOR'] = $row['scanREKOR'];
			$h['scanSlipGaji'] = $row['scanSlipGaji'];
			$h['scanSKKerja'] = $row['scanSKKerja'];
			$h['scanSPT'] = $row['scanSPT'];
			$h['scanPasFoto'] = $row['scanPasFoto'];
			
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