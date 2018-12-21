<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$id = $_POST['id'];
	$alamat = $_POST['alamat'];
	$noHp = $_POST['noHp'];
	$jenkel = $_POST['jenkel'];

	require_once 'conneksi.php';

	$sql = "UPDATE tbl_karyawan SET nama_pegawai='$name', email='$email',alamat_karyawan='$alamat',no_telephone = '$noHp', jenis_kelamin = '$jenkel' WHERE no_pegawai='$id'";

	if(mysqli_query($conn,$sql)){
		$result['success']="1";
		$result['message']="success";

		echo json_encode($result);
		mysqli_close($conn);
	}
	else {
		$result['success']="0";
		$result['message']="gagal!";

		echo json_encode($result);
		mysqli_close($conn);
	}
}
?>