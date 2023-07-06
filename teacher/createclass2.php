<?php
session_start();
include ('../includes/config.php');

	$teacher=$_SESSION['username'];
	
	$name=$_POST['class'];
	$year=$_POST['year'];
		
			$sql2 = "INSERT INTO classes(class,year,teacher) VALUES ('$name','$year','$teacher')";
			mysqli_query($db_found,$sql2);
		header('location:classes.php');

?>