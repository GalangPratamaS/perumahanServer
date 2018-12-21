<?php

	$conn = new mysqli("localhost","root","","perumahan_db");
	
	if($conn->connect_error){
		die("connection failed: ".$conn->connect_error);
	}
?>