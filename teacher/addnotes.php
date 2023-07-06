<?php
session_start();
include ('../includes/config.php');
$class_id=$_POST['class_id'];
$description=$_POST['description'];
$file=$_FILES['file'];
$name = $file['name'];
$path = "upload/" . basename($name);
if (move_uploaded_file($file['tmp_name'], $path)) {
	$sql2 = "INSERT INTO notes (class_id,path,description) VALUES ('$class_id','$path','$description')";
	mysqli_query($db_found,$sql2);
	header("Location: classes.php");
    // Move succeed.
} else {
	echo "Error in uploading photo";
    // Move failed. Possible duplicate?
}
?>