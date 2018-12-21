<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	umask(022);
	$idPlg = $_POST['id'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$bayar_dp = $_POST['bayarDP'];
	$id_marketing = $_POST['id_marketing'];
	$no_rumah = $_POST['no_rumah'];
	$blok_rumah = $_POST['blok_rumah'];
	$tanggal = $_POST['tanggal'];
	$ktp = $_POST['ktp'];
	$kk = $_POST['kk'];
	$npwp = $_POST['npwp'];
	$slip_gaji = $_POST['slip_gaji'];
	$surket_kerja = $_POST['surket_kerja'];
	$surket_domisili = $_POST['surket_domisili'];
	$spt_terakhir = $_POST['spt_terakhir'];
	$rek_koran = $_POST['rek_koran'];
	$pas_foto = $_POST['pas_foto'];
	$status = $_POST['status'];

	$path = "pembelian_rumah";
	
	if(!file_exists($path)){
		mkdir($path,0755,true);
	} 
	$path = "pembelian_rumah/kredit";
	if(!file_exists($path)){
		mkdir($path,0755,true);
	}
	$path = "pembelian_rumah/kredit/$idPlg";
	if(!file_exists($path)){
		mkdir($path,0755,true);
	} 

	//penamaan file 
	$pathKTP = $path."/KTP_$idPlg.jpeg";
	$pathKK = $path."/KK_$idPlg.jpeg";
	$pathNPWP = $path."/NPWP_$idPlg.jpeg";
	$pathREKOR = $path."/REKKOR_$idPlg.jpeg";
	$pathSK_KERJA = $path."/SK_KERJA_$idPlg.jpeg";
	$pathSLIP_GAJI = $path."/SLIP_GAJI_$idPlg.jpeg";
	$pathSPT = $path."/SPT_$idPlg.jpeg";
	$pathSK_DOMISILI = $path."/SK_DOMISILI_$idPlg.jpeg";
	$pathPAS_FOTO = $path."/PAS_FOTO_$idPlg.jpeg";
	//penamaan lokasi file dalam server
	$finalpathKTP = "http://192.168.43.207/perumahanServer/".$pathKTP;
	$finalpathKK = "http://192.168.43.207/perumahanServer/".$pathKK;
	$finalpathNPWP = "http://192.168.43.207/perumahanServer/".$pathNPWP;
	$finalpathREKOR = "http://192.168.43.207/perumahanServer/".$pathREKOR;
	$finalpathSKKerja = "http://192.168.43.207/perumahanServer/".$pathSK_KERJA;
	$finalpathSlipGaji = "http://192.168.43.207/perumahanServer/".$pathSLIP_GAJI;
	$finalpathSpt = "http://192.168.43.207/perumahanServer/".$pathSPT;
	$finalpathDomisili = "http://192.168.43.207/perumahanServer/".$pathSK_DOMISILI;
	$finalpathPasFoto = "http://192.168.43.207/perumahanServer/".$pathPAS_FOTO;


	require_once 'conneksi.php';

	$sql = "INSERT INTO tbl_transaksi_rumah (no_marketing,no_pelanggan,nama_pelanggan,cash,tanggal,no_rumah,scanKTP,scanKK,scanNPWP,scanDOMISILI,scanREKOR,scanSlipGaji,scanSKKerja,scanSPT,scanPasFoto,status) VALUES('$id_marketing','$idPlg','$nama_pelanggan','$bayar_dp','$tanggal','$no_rumah','$finalpathKTP','$finalpathKK','$finalpathNPWP','$finalpathDomisili','$finalpathREKOR','$finalpathSlipGaji','$finalpathSKKerja','$finalpathSpt','$finalpathPasFoto','$status')";
	$result = array();
	if(mysqli_query($conn, $sql)){
		if(file_put_contents($pathKTP, base64_decode($ktp))){
			file_put_contents($pathKK, base64_decode($kk));
			file_put_contents($pathNPWP, base64_decode($npwp));
			file_put_contents($pathREKOR, base64_decode($rek_koran));
			file_put_contents($pathSK_KERJA, base64_decode($surket_kerja));
			file_put_contents($pathSLIP_GAJI, base64_decode($slip_gaji));
			file_put_contents($pathSPT, base64_decode($spt_terakhir));
			file_put_contents($pathSK_DOMISILI, base64_decode($rek_koran));
			file_put_contents($pathPAS_FOTO, base64_decode($pas_foto));

			$sql = "INSERT INTO tbl_pembayaran_downpayment(no_pelanggan,tanggal,nama_penyetor,jumlah,penerima) VALUES('$idPlg','$tanggal','$nama_pelanggan','$bayar_dp','$id_marketing')";
			if(mysqli_query($conn, $sql)){

			$sql = "UPDATE tbl_rumah SET status_rumah = 'Terjual' WHERE no_rumah = '$no_rumah'";
			if($conn->query($sql) === TRUE){
				$sql1 = "UPDATE tbl_pelanggan SET pemesanan_rumah = '$blok_rumah' WHERE no_pelanggan = '$id'";
				if($conn->query($sql1) === TRUE){
					$result['success'] = "1";
					$result['message'] = "success";

			echo json_encode($result);
			mysqli_close($conn);
				}
			}
		}
	} else {
			$result['success'] = "0";
			$result['message'] = "gagal";
			echo json_encode($result);
			mysqli_close($conn);
	}
}
}

?>

