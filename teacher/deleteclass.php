<?php
$id = $_GET['ID'];

include('../includes/config.php');

$sql = "DELETE FROM classes WHERE id=$id";
if(mysqli_query($db_found,$sql))
{
	$message = "Deleted Successful";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='classes.php';</script>";
//	header('location:synopsis.php');
}
else
{
	die('Could not delete record:' .mysqli_error());
}
?>