<?php
$target_dir = "../../dn/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
  //echo "Sorry, file already exists.<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0 or file_exists($target_file)) {
  //echo "Sorry, file already exists. your file was not uploaded.";
  echo '<script>alert(\'Sorry, file already exists. your file was not uploaded.\');</script>';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo '<script>alert(\'The file has been uploaded.\');</script>';
  } else {
    //echo "Sorry, there was an error uploading your file.";
    echo '<script>alert(\'Sorry, there was an error uploading your file.\');</script>';
  }
}
header("Refresh:0; url=index.php");
?>
