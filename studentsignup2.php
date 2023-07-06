<?php
session_start();
session_destroy();
$msg = "";

include 'includes/config.php';
	$nem = $_POST['nem'];
	$eadd = $_POST['eadd'];
	$unem = $_POST['unem'];
	$year=$_POST['year'];
	$pword = $_POST['pword'];
	$rpword = $_POST['rpword'];
	
	if(($eadd == "") OR ($unem == "") OR ($nem == "")){
		$msg = "Please supply each field.ttttt";
	}
	else if($pword != $rpword){
		$msg = "Password did not match.";
	}
	else{
		//$SQL = "SELECT * FROM student_profile";
		//$result = mysqli_query($db_found,$SQL);
	//	while ($db_field = mysqli_fetch_assoc($result)) {
		//	$a = $db_field['username'];
		//	$b = $db_field['email'];
		//	if($a == $unem){
		//		$msg = "Username is not available.";
		//	}
		//	else if($b == $eadd){
		//		$msg = "Email address is not available.";
		//	}
		//	else{
				$SQL = "INSERT INTO student_profile VALUES (null,'$nem','$eadd','$unem','$pword','$year')";
				mysqli_query($db_found,$SQL);
				header("Location: index.php");
	//		}
	//	}
	}
?>
