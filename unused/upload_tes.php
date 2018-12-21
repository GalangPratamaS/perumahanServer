<?php

$path = "profile_image";
umask(022);
if(!file_exists($path)){
	mkdir($path,0777,true);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = $_POST['id'];
	$idPlg = $_POST['id'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$id_marketing = $_POST['id_marketing'];
	$no_rumah = $_POST['no_rumah'];
	$bayar_lunas = $_POST['bayar_lunas'];
	$tanggal = $_POST['tanggal'];
	$ktp = $_POST['ktp'];
	$kk = $_POST['kk'];
	$npwp = $_POST['npwp'];
	$status = $_POST['status'];

	$path = "pembelian_rumah";
	
	if(!file_exists($path)){
		mkdir($path,0755,true);
	} 
	$path = "pembelian_rumah/cash";
	if(!file_exists($path)){
		mkdir($path,0755,true);
	}
	$path = "pembelian_rumah/cash/$idPlg";
	if(!file_exists($path)){
		mkdir($path,0755,true);
	} 

	$pathKTP = $path."/KTP_$idPlg.jpeg";
	$pathKK = $path."/KK_$idPlg.jpeg";
	$pathNPWP = $path."/NPWP_$idPlg.jpeg";

	$finalpathKTP = "http://192.168.43.207/perumahanServer/".$pathKTP;
	$finalpathKK = "http://192.168.43.207/perumahanServer/".$pathKK;
	$finalpathNPWP = "http://192.168.43.207/perumahanServer/".$pathNPWP;


	require_once 'conneksi.php';

	$sql = "INSERT INTO tbl_transaksi_rumah (no_marketing,no_pelanggan,nama_pelanggan,cash,tanggal,no_rumah,scanKTP,scanKK,scanNPWP,status) VALUES('$id_marketing','$idPlg','$nama_pelanggan','$bayar_lunas','$tanggal','$no_rumah','$finalpathKTP','$finalpathKK','$finalpathNPWP','$status')";
	$result = array();
	if(mysqli_query($conn, $sql)){
		if(file_put_contents($pathKTP, base64_decode($ktp))){
			file_put_contents($pathKK, base64_decode($kk));
			file_put_contents($pathNPWP, base64_decode($npwp));
			
					$result['success'] = "1";
					$result['message'] = "success";

					echo json_encode($result);
					mysqli_close($conn);
		}
	}
}

?>

