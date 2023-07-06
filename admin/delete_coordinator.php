<?php
$id = $_GET['delID'];

include('../includes/config.php');

$sql = "DELETE FROM teacher_profile WHERE id=$id";
if(mysqli_query($db_found,$sql))
{
	header('location:coordinatorlist.php');
}
else
{
	die('Could not delete record:' .mysqli_error());
}
?>