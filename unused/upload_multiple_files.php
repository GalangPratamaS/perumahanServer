<?php
 
$target_dir = "uploads/";
$target_file_name1 = $target_dir.basename($_FILES["file1"]["name"]);
$target_file_name2 = $target_dir.basename($_FILES["file2"]["name"]);
$response = array();

// Check if image file is a actual image or fake image
if (isset($_FILES["file1"])&&isset($_FILES["file2"])) 
{
 if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file_name1)
  && move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file_name2)) 
 {
  $success = true;
  $message = "Successfully Uploaded";
 }
 else 
 {
  $success = false;
  $message = "Error while uploading";
 }
}
else 
{
 $success = false;
 $message = "Required Field Missing";
}

$response["success"] = $success;
$response["message"] = $message;
echo json_encode($response);

?>