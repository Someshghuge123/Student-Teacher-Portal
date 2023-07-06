<?php
session_start();
session_destroy();
$user = "";
$pass = "";
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	include 'includes/config.php';
	$user = $_POST['uname'];
	$pass = $_POST['pword'];
		
	//unwanted HTML (scripting attacks)
	$user = htmlspecialchars($user);
	$pass = htmlspecialchars($pass);
	
	$SQL = "SELECT * FROM student_profile";
	$result = mysqli_query($db_found,$SQL);
	while ($db_field = mysqli_fetch_assoc($result)) {
		$a = $db_field['username'];
		$b = $db_field['password'];
		
		if(($user == $a) AND ($pass == $b)){
			
				session_start();
				$_SESSION['username'] = $user;
				mysqli_close($db_handle);
				header("Location: student/stream.php");
				break;
			
		}
		else
		{
			echo "Check username and/or password.";
		}
	}
	$msg = "Check username and/or password.";

}
?>
