<?php
$target_dir = "uploads/";
$target_file_name = $target_dir .basename($_FILES["uploaded_file"]["name"]);
$response = array();

// Check if image file is a actual image or fake image
if (isset($_FILES["uploaded_file"])) 
{
   if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file_name)) 
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