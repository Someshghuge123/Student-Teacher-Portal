<?php
$id = $_GET['ID'];

include('../includes/config.php');

$sql = "DELETE FROM student_synopsis WHERE id=$id";
if(mysqli_query($db_found,$sql))
{
	header('location:synopsis.php');
}
else
{
	die('Could not delete record:' .mysqli_error());
}
?>